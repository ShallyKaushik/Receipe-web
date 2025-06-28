#include <iostream>
#include <vector>
#include <string>
#include <map>
#include <unordered_map>
#include <queue>
#include <ctime>
#include <fstream>
#include <set>
#include <algorithm>
#include <limits>

using namespace std;

// Date class to handle item posting dates
class Date {
private:
    int day, month, year;
public:
    Date() {
        // Use ctime to get current date
        time_t now = time(0);
        tm* ltm = localtime(&now);
        day = ltm->tm_mday;
        month = 1 + ltm->tm_mon;
        year = 1900 + ltm->tm_year;
    }
    
    Date(int d, int m, int y) : day(d), month(m), year(y) {}
    
    string toString() const {
        return to_string(day) + "/" + to_string(month) + "/" + to_string(year);
    }
    
    bool isRecent() const {
        // Check if date is within last 7 days (simplified)
        Date current;
        
        // Same year and month
        if (current.year == year && current.month == month) {
            return current.day - day <= 7;
        }
        
        // Previous month (simplified, not accounting for different month lengths)
        if (current.year == year && current.month == month + 1 && current.day <= 7) {
            int daysInLastMonth = 30; // Approximation
            return (daysInLastMonth - day + current.day) <= 7;
        }
        
        return false;
    }
    
    // Compare dates
    bool operator<(const Date& other) const {
        if (year != other.year) return year < other.year;
        if (month != other.month) return month < other.month;
        return day < other.day;
    }
    
    // Calculate days between two dates (simplified)
    int daysSince(const Date& other) const {
        // Very simplified calculation - not accounting for month lengths
        int days = (year - other.year) * 365;
        days += (month - other.month) * 30;
        days += (day - other.day);
        return days;
    }
};

// Item class to store details of lost/found items
class Item {
private:
    static int nextId;
    int id;
    string name;
    string category;
    string color;
    string location;
    string description;
    string contactInfo;
    bool isLost; // true for lost, false for found
    Date datePosted;

public:
    Item(string n, string cat, string col, string loc, string desc, string contact, bool lost)
        : name(n), category(cat), color(col), location(loc), description(desc), contactInfo(contact), isLost(lost) {
        id = nextId++;
        datePosted = Date(); // Initialize with current date
    }
    
    int getId() const { return id; }
    string getName() const { return name; }
    string getCategory() const { return category; }
    string getColor() const { return color; }
    string getLocation() const { return location; }
    string getDescription() const { return description; }
    string getContactInfo() const { return contactInfo; }
    bool getIsLost() const { return isLost; }
    Date getDatePosted() const { return datePosted; }
    
    bool isRecent() const {
        return datePosted.isRecent();
    }
    
    void display() const {
        cout << "ID: " << id << endl;
        cout << "Name: " << name << endl;
        cout << "Category: " << category << endl;
        cout << "Color: " << color << endl;
        cout << "Location: " << location << endl;
        cout << "Description: " << description << endl;
        cout << "Contact: " << contactInfo << endl;
        cout << "Status: " << (isLost ? "Lost" : "Found") << endl;
        cout << "Date Posted: " << datePosted.toString() << endl;
        cout << "----------------------------" << endl;
    }
    
    // Method to check if this item potentially matches with another
    bool potentialMatch(const Item& other) const {
        if (isLost == other.isLost) return false; // Both lost or both found
        
        // Check for matches based on item properties
        bool nameMatch = (name == other.name);
        bool categoryMatch = (category == other.category);
        bool colorMatch = (color == other.color);
        bool locationMatch = (location == other.location);
        
        // Check if description contains the other item's name
        bool descContainsOtherName = (description.find(other.name) != string::npos);
        bool otherDescContainsName = (other.description.find(name) != string::npos);
        
        return (nameMatch || (categoryMatch && colorMatch) || 
                locationMatch || descContainsOtherName || otherDescContainsName);
    }
};

int Item::nextId = 1000;

// Custom priority queue comparator
struct CompareDistance {
    bool operator()(const pair<int, string>& a, const pair<int, string>& b) {
        return a.first > b.first;
    }
};

// City Network class with visualization capabilities
class CityNetwork {
private:
    unordered_map<string, vector<pair<string, int>>> graph; // District -> [(neighbor, distance)]
    
public:
    void addDistrict(const string& district) {
        if (graph.find(district) == graph.end()) {
            graph[district] = vector<pair<string, int>>();
        }
    }
    
    void addConnection(const string& from, const string& to, int distance) {
        addDistrict(from);
        addDistrict(to);
        
        // Check if connection already exists
        bool connectionExists = false;
        for (const auto& edge : graph[from]) {
            if (edge.first == to) {
                connectionExists = true;
                break;
            }
        }
        
        if (!connectionExists) {
            graph[from].push_back({to, distance});
            graph[to].push_back({from, distance}); // Bidirectional
            cout << "Connection added: " << from << " -- " << to << " (" << distance << " mins)" << endl;
        } else {
            cout << "Connection already exists between " << from << " and " << to << endl;
        }
    }
    
    void removeDistrict(const string& district) {
        if (graph.find(district) == graph.end()) {
            cout << "District does not exist!" << endl;
            return;
        }
        
        // Remove the district
        graph.erase(district);
        
        // Remove all connections to the district
        for (auto& entry : graph) {
            entry.second.erase(
                remove_if(entry.second.begin(), entry.second.end(), 
                    [&](const pair<string, int>& p) { return p.first == district; }), 
                entry.second.end()
            );
        }
        
        cout << "District removed successfully!" << endl;
    }
    
    // Dijkstra's algorithm for shortest path
    pair<vector<string>, int> findShortestPath(const string& start, const string& end) {
        unordered_map<string, int> distances;
        unordered_map<string, string> previous;
        priority_queue<pair<int, string>, vector<pair<int, string>>, CompareDistance> pq;
        
        // Initialize distances with a very large number
        const int INF = numeric_limits<int>::max();
        
        for (const auto& district : graph) {
            distances[district.first] = INF;
        }
        
        distances[start] = 0;
        pq.push({0, start});
        
        while (!pq.empty()) {
            string current = pq.top().second;
            int currentDist = pq.top().first;
            pq.pop();
            
            if (current == end) break;
            
            if (currentDist > distances[current]) continue;
            
            for (const auto& edge : graph[current]) {
                string neighbor = edge.first;
                int weight = edge.second;
                
                if (distances[current] + weight < distances[neighbor]) {
                    distances[neighbor] = distances[current] + weight;
                    previous[neighbor] = current;
                    pq.push({distances[neighbor], neighbor});
                }
            }
        }
        
        // Reconstruct path
        vector<string> path;
        string current = end;
        
        if (previous.find(end) == previous.end()) {
            return {{}, -1}; // No path exists
        }
        
        while (current != start) {
            path.push_back(current);
            current = previous[current];
        }
        path.push_back(start);
        
        // Reverse path
        reverse(path.begin(), path.end());
        
        return {path, distances[end]};
    }
    
    bool hasDistrict(const string& district) const {
        return graph.find(district) != graph.end();
    }
    
    void generateGraphViz(const string& filename) {
        cout << "Generating City Map..." << endl;
        ofstream file(filename);
        if (!file) {
            cerr << "Error opening file for writing. City map generation failed." << endl;
            return;
        }

        file << "graph CityNetwork {\n";
        set<pair<string, string>> edges;
        
        for (const auto& district : graph) {
            for (const auto& neighbor : district.second) {
                string s1 = district.first;
                string s2 = neighbor.first;
                
                // Ensure each edge is only added once
                if (s1 > s2) swap(s1, s2);
                
                if (edges.find({s1, s2}) == edges.end()) {
                    file << "    \"" << s1 << "\" -- \"" << s2 
                         << "\" [label=\"" << neighbor.second << " mins\"];\n";
                    edges.insert({s1, s2});
                }
            }
        }
        
        file << "}\n";
        file.close();

        if (file) {
            cout << "City map successfully saved to " << filename << "!" << endl;
            cout << "Use 'dot -Tpng " << filename << " -o city_map.png' to convert to image" << endl;
        } else {
            cerr << "Error: Writing to file failed. Ensure disk space and permissions are sufficient." << endl;
        }
    }
    
    void displayAllDistricts() const {
        cout << "\n==== All City Districts ====" << endl;
        
        if (graph.empty()) {
            cout << "No districts in the network." << endl;
            return;
        }
        
        for (const auto& district : graph) {
            cout << "District: " << district.first << endl;
            cout << "Connected to:" << endl;
            
            for (const auto& connection : district.second) {
                cout << "  -> " << connection.first << " (" << connection.second << " mins)" << endl;
            }
            cout << "----------------------------" << endl;
        }
    }
};

// Lost and Found System class
class LostAndFoundSystem {
private:
    vector<Item> items;
    CityNetwork cityMap;
    map<string, int> locationStats; // For smart prediction
    
    // Generate reward based on item value
    int generateReward(const string& category) {
        // Use current time for some variability
        time_t now = time(0);
        int seed = now % 100;
        
        // Base rewards with some variability
        if (category == "Electronics") {
            return 250 + seed;
        } else if (category == "Jewelry") {
            return 150 + seed;
        } else if (category == "Documents") {
            return 75 + (seed / 2);
        } else {
            return 30 + (seed / 3);
        }
    }
    
    // Find item by ID
    int findItemIndexById(int id) {
        for (size_t i = 0; i < items.size(); i++) {
            if (items[i].getId() == id) {
                return i;
            }
        }
        return -1; // Not found
    }
    
public:
    LostAndFoundSystem() {
        // Initialize city map with some districts and connections
        initializeCityMap();
    }
    
    void initializeCityMap() {
        // Add some sample city districts and connections
        vector<string> districts = {"Downtown", "Uptown", "Eastside", "Westside", "Northend", 
                                    "University District", "Airport Area", "Sports Complex", "Shopping District"};
        
        // Add connections with distances (in minutes)
        cityMap.addConnection("Downtown", "Uptown", 10);
        cityMap.addConnection("Downtown", "Eastside", 15);
        cityMap.addConnection("Downtown", "Westside", 12);
        cityMap.addConnection("Downtown", "Shopping District", 7);
        cityMap.addConnection("Uptown", "University District", 8);
        cityMap.addConnection("Eastside", "Airport Area", 20);
        cityMap.addConnection("Westside", "Sports Complex", 9);
        cityMap.addConnection("Northend", "Downtown", 15);
        cityMap.addConnection("Northend", "University District", 10);
        cityMap.addConnection("University District", "Sports Complex", 18);
        cityMap.addConnection("Airport Area", "Shopping District", 25);
        cityMap.addConnection("Shopping District", "Sports Complex", 14);
    }
    
    // Add custom district to the city network
    void addCityDistrict(const string& from, const string& to, int time) {
        cityMap.addConnection(from, to, time);
    }
    
    // Remove a district from the city network
    void removeCityDistrict(const string& district) {
        cityMap.removeDistrict(district);
    }
    
    // Add lost item
    void addLostRequest(const string& name, const string& category, const string& color,
                        const string& location, const string& description, const string& contactInfo) {
        items.push_back(Item(name, category, color, location, description, contactInfo, true));
        
        // Update location stats for smart prediction
        locationStats[location]++;
        
        // Check for potential matches
        checkMatches(items.back());
        
        cout << "Lost item added successfully with ID: " << items.back().getId() << endl;
    }
    
    // Add found item
    void addFoundRequest(const string& name, const string& category, const string& color,
                         const string& location, const string& description, const string& contactInfo) {
        items.push_back(Item(name, category, color, location, description, contactInfo, false));
        
        // Check for potential matches
        checkMatches(items.back());
        
        cout << "Found item added successfully with ID: " << items.back().getId() << endl;
    }
    
    // Remove a request by ID
    bool removeRequest(int id) {
        int index = findItemIndexById(id);
        
        if (index != -1) {
            // Reduce location stat count
            string location = items[index].getLocation();
            if (locationStats[location] > 0) {
                locationStats[location]--;
            }
            
            // Remove item
            items.erase(items.begin() + index);
            
            cout << "Item with ID " << id << " removed successfully." << endl;
            return true;
        }
        
        cout << "Item with ID " << id << " not found." << endl;
        return false;
    }
    
    // Remove a request by name
    bool removeRequestByName(const string& name) {
        auto it = remove_if(items.begin(), items.end(),
            [&](const Item& obj) { return obj.getName() == name; });
            
        if (it != items.end()) {
            items.erase(it, items.end());
            cout << "Request for item '" << name << "' removed successfully." << endl;
            return true;
        }
        
        cout << "No request found for item '" << name << "'." << endl;
        return false;
    }
    
    // Search items by location with city map guidance
    void searchByLocation(const string& location) {
        bool found = false;
        
        // Check if location is a valid city district
        if (!cityMap.hasDistrict(location)) {
            cout << "Location not found in city map." << endl;
            return;
        }
        
        cout << "\nItems at/near " << location << ":" << endl;
        for (const auto& item : items) {
            if (item.getLocation() == location) {
                item.display();
                found = true;
            }
        }
        
        if (!found) {
            cout << "No items found at this location." << endl;
        }
        
        // Suggest nearby locations where items might be found
        for (const auto& item : items) {
            if (item.getLocation() != location) {
                auto pathResult = cityMap.findShortestPath(location, item.getLocation());
                vector<string> path = pathResult.first;
                int distance = pathResult.second;
                
                if (!path.empty() && distance <= 20) { // Within reasonable distance
                    cout << "\nFound a " << (item.getIsLost() ? "lost" : "found") << " item at " << item.getLocation() 
                         << " (" << distance << " minutes away)" << endl;
                    cout << "Path from " << location << " to " << item.getLocation() << ": ";
                    for (size_t i = 0; i < path.size(); i++) {
                        cout << path[i];
                        if (i < path.size() - 1) cout << " -> ";
                    }
                    cout << endl;
                    item.display();
                }
            }
        }
    }
    
    // Sort and display items by category
    void sortByCategory() {
        if (items.empty()) {
            cout << "No items available." << endl;
            return;
        }
        
        map<string, vector<Item>> categories;
        
        // Group items by category
        for (const auto& item : items) {
            categories[item.getCategory()].push_back(item);
        }
        
        // Display items by category
        for (const auto& category : categories) {
            cout << "\n==== Category: " << category.first << " ====" << endl;
            cout << "Total items: " << category.second.size() << endl;
            
            for (const auto& item : category.second) {
                item.display();
            }
        }
    }
    
    // Display recently added items
    void showRecentItems() {
        cout << "\n==== Recently Added Items ====" << endl;
        bool found = false;
        
        for (const auto& item : items) {
            if (item.isRecent()) {
                item.display();
                found = true;
            }
        }
        
        if (!found) {
            cout << "No recent items found." << endl;
        }
    }
    
    // Show items by status (lost or found)
    void showItemsByStatus(bool isLost) {
        string status = isLost ? "Lost" : "Found";
        cout << "\n==== " << status << " Items ====" << endl;
        bool found = false;
        
        for (const auto& item : items) {
            if (item.getIsLost() == isLost) {
                item.display();
                found = true;
            }
        }
        
        if (!found) {
            cout << "No " << status << " items found." << endl;
        }
    }
    
    // Smart prediction - show where items are most commonly lost
    void showSmartPrediction() {
        cout << "\n==== Smart Prediction - Hot Spots ====" << endl;
        
        if (locationStats.empty()) {
            cout << "Not enough data for predictions yet." << endl;
            return;
        }
        
        // Find locations with highest lost item counts
        vector<pair<string, int>> sortedLocations;
        for (const auto& stat : locationStats) {
            sortedLocations.push_back(stat);
        }
        
        // Sort locations by frequency
        sort(sortedLocations.begin(), sortedLocations.end(), 
             [](const pair<string, int>& a, const pair<string, int>& b) {
                 return a.second > b.second;
             });
        
        // Get current time for the prediction report
        time_t now = time(0);
        char* dt = ctime(&now);
        cout << "Prediction report generated on: " << dt;
        
        cout << "Top locations where items are reported lost:" << endl;
        int count = 0;
        for (const auto& loc : sortedLocations) {
            if (loc.second > 0) {
                cout << loc.first << ": " << loc.second << " items" << endl;
                
                // Calculate potential reward for returning items from this location
                int baseReward = 50;
                int locationFactor = loc.second * 10;
                cout << "  - Potential reward for returning items: $" << baseReward + locationFactor << endl;
                
                count++;
            }
            if (count >= 5) break; // Show top 5 only
        }
        
        if (count == 0) {
            cout << "No data available for predictions." << endl;
        }
    }
    
    // Check for potential matches between a new item and existing items
    // Enhanced checkMatches function that provides routing information
    void checkMatches(const Item& newItem) {
        cout << "\n==== Potential Matches ====" << endl;
        bool foundMatch = false;

        for (const auto& item : items) {
            // Skip comparing the item with itself
            if (item.getId() == newItem.getId()) continue;

            // Check if this is a match by category and color
            bool categoryMatch = (item.getCategory() == newItem.getCategory());
            bool colorMatch = (item.getColor() == newItem.getColor());
            
            // Basic match checking (existing functionality plus specific category/color check)
            if ((newItem.potentialMatch(item) || (categoryMatch && colorMatch)) 
                && (item.getIsLost() != newItem.getIsLost())) {
                
                cout << "\nPotential match found!" << endl;
                cout << "Item 1:" << endl;
                newItem.display();
                cout << "Item 2:" << endl;
                item.display();
                
                // Determine which item is lost and which is found
                const Item& lostItem = newItem.getIsLost() ? newItem : item;
                const Item& foundItem = newItem.getIsLost() ? item : newItem;
                
                // Get locations
                string lostLocation = lostItem.getLocation();
                string foundLocation = foundItem.getLocation();
                
                // Calculate potential reward
                int reward = generateReward(newItem.getCategory());
                cout << "Potential reward for return: $" << reward << endl;
                
                // Find shortest path between locations if they exist in the city network
                if (cityMap.hasDistrict(lostLocation) && cityMap.hasDistrict(foundLocation)) {
                    auto pathResult = cityMap.findShortestPath(lostLocation, foundLocation);
                    vector<string> path = pathResult.first;
                    int timeTaken = pathResult.second;
                    
                    if (!path.empty()) {
                        cout << "\nRoute Information:" << endl;
                        cout << "From (lost location): " << lostLocation << endl;
                        cout << "To (found location): " << foundLocation << endl;
                        cout << "Time required: " << timeTaken << " minutes" << endl;
                        cout << "Path: ";
                        for (size_t i = 0; i < path.size(); i++) {
                            cout << path[i];
                            if (i < path.size() - 1) cout << " -> ";
                        }
                        cout << endl;
                    } else {
                        cout << "\nNo direct route exists between " << lostLocation 
                             << " and " << foundLocation << "." << endl;
                    }
                } else {
                    if (!cityMap.hasDistrict(lostLocation)) {
                        cout << "\nLost location '" << lostLocation << "' is not in the city map." << endl;
                    }
                    if (!cityMap.hasDistrict(foundLocation)) {
                        cout << "\nFound location '" << foundLocation << "' is not in the city map." << endl;
                    }
                }
                
                foundMatch = true;
            }
        }

        if (!foundMatch) {
            cout << "No potential matches found for this item." << endl;
        }
    }
    
    // Display all items
    void displayAllItems() {
        if (items.empty()) {
            cout << "No items available." << endl;
            return;
        }
        
        cout << "\n==== All Items ====" << endl;
        for (const auto& item : items) {
            item.display();
        }
    }
    
    // Generate city map visualization
    void generateCityMap() {
        cityMap.generateGraphViz("city.dot");
    }
    
    // Display all districts in the city network
    void displayCityDistricts() {
        cityMap.displayAllDistricts();
    }
    
    // Run the Lost and Found System
    void run() {
        // Get current time for welcome message
        time_t now = time(0);
        tm *ltm = localtime(&now);
        
        cout << "Welcome to Enhanced City Lost and Found System!" << endl;
        cout << "Current date: " 
             << ltm->tm_mday << "/"
             << 1 + ltm->tm_mon << "/"
             << 1900 + ltm->tm_year << endl;
        
        // Add some sample data
        addLostRequest("Laptop", "Electronics", "Silver", "University District", "MacBook Pro with stickers", "john@email.com");
        addLostRequest("Wallet", "Personal", "Brown", "Downtown", "Leather wallet with ID", "sarah@email.com");
        addFoundRequest("Phone", "Electronics", "Black", "Shopping District", "iPhone 13 with blue case", "mike@email.com");
        addFoundRequest("Keys", "Personal", "Silver", "Downtown", "Set of keys with red keychain", "lisa@email.com");
        
        while (true) {
            cout << "\n===== Enhanced City Lost and Found System =====" << endl;
            cout << "1. Add City District" << endl;
            cout << "2. Remove City District" << endl;
            cout << "3. View City Districts" << endl;
            cout << "4. Generate City Map" << endl;
            cout << "5. Add Lost Request" << endl;
            cout << "6. Add Found Request" << endl;
            cout << "7. Remove Request by ID" << endl;
            cout << "8. Remove Request by Name" << endl;
            cout << "9. View Lost Requests" << endl;
            cout << "10. View Found Requests" << endl;
            cout << "11. View All Requests" << endl;
            cout << "12. Search by Location" << endl;
            cout << "13. Sort by Category" << endl;
            cout << "14. Show Recent Items" << endl;
            cout << "15. Smart Prediction" << endl;
            cout << "0. Exit" << endl;
            cout << "Choose an option: ";
            
            int choice;
            if (!(cin >> choice)) {
                cin.clear();
                cin.ignore(numeric_limits<streamsize>::max(), '\n');
                cout << "Invalid input. Please enter a valid option." << endl;
                continue;
            }
            cin.ignore(numeric_limits<streamsize>::max(), '\n');

            string name, category, color, location, description, contactInfo;
            string district1, district2;
            int travelTime, id;

            switch(choice) {
                case 0:
                    cout << "Exiting the system. Thank you!" << endl;
                    return;
                    
                case 1:
                    cout << "Enter first district name: ";
                    getline(cin, district1);
                    cout << "Enter second district name: ";
                    getline(cin, district2);
                    cout << "Enter travel time (minutes): ";
                    cin >> travelTime;
                    cin.ignore(numeric_limits<streamsize>::max(), '\n');
                    addCityDistrict(district1, district2, travelTime);
                    break;
                    
                case 2:
                    cout << "Enter district name to remove: ";
                    getline(cin, district1);
                    removeCityDistrict(district1);
                    break;
                    
                case 3:
                    displayCityDistricts();
                    break;
                    
                case 4:
                    generateCityMap();
                    break;
                    
                case 5:
                    cout << "Enter object name: ";
                    getline(cin, name);
                    cout << "Enter category: ";
                    getline(cin, category);
                    cout << "Enter color: ";
                    getline(cin, color);
                    cout << "Enter lost location: ";
                    getline(cin, location);
                    cout << "Enter description: ";
                    getline(cin, description);
                    cout << "Enter contact info: ";
                    getline(cin, contactInfo);
                    addLostRequest(name, category, color, location, description, contactInfo);
                    break;
                    
                case 6:
                    cout << "Enter object name: ";
                    getline(cin, name);
                    cout << "Enter category: ";
                    getline(cin, category);
                    cout << "Enter color: ";
                    getline(cin, color);
                    cout << "Enter found location: ";
                    getline(cin, location);
                    cout << "Enter description: ";
                    getline(cin, description);
                    cout << "Enter contact info: ";
                    getline(cin, contactInfo);
                    addFoundRequest(name, category, color, location, description, contactInfo);
                    break;
                    
                case 7:
                    cout << "Enter request ID to remove: ";
                    cin >> id;
                    cin.ignore(numeric_limits<streamsize>::max(), '\n');
                    removeRequest(id);
                    break;
                    
                case 8:
                    cout << "Enter item name to remove: ";
                    getline(cin, name);
                    removeRequestByName(name);
                    break;
                    
                case 9:
                    showItemsByStatus(true); // Show lost items
                    break;
                    
                case 10:
                    showItemsByStatus(false); // Show found items
                    break;
                    
                case 11:
                    displayAllItems();
                    break;
                    
                    case 12:
                    cout << "Enter location to search: ";
                    getline(cin, location);
                    searchByLocation(location);
                    break;
                    
                case 13:
                    sortByCategory();
                    break;
                    
                case 14:
                    showRecentItems();
                    break;
                    
                case 15:
                    showSmartPrediction();
                    break;
                    
                default:
                    cout << "Invalid option. Please try again." << endl;
            }
        }
    }
};

int main() {
    LostAndFoundSystem system;
    system.run();
    return 0;
}