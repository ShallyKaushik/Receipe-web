#include <iostream>
#include <vector>
#include <queue>
#include <unordered_map>
#include <algorithm>
#include <list>
#include <stack>
#include <iomanip>
#define cost 9 // cost per station
#define N 9    // for Sudoku

using namespace std;
const string correctAdminUsername = "admin";
const string correctAdminPassword = "admin123";

class Train {
public:
    int trainNumber;
    string destination;
    string departureTime;
    float fare;
    Train* next;

    Train(int number, string dest, string time, float c) {
        trainNumber = number;
        destination = dest;
        departureTime = time;
        fare = c;
        next = nullptr;
    }
};


// Graph class for railway connections
template <class T>

class graph
{
    vector<T> ans;
    unordered_map<T, bool> visited;
    unordered_map<T, T> parent;

public:
    unordered_map<T, list<T>> adj;

    void addEdge(T u, T v, bool direction)
    {
        adj[u].push_back(v);
        if (!direction)
        {
            adj[v].push_back(u);
        }
    }

    void print_adj()
    {
        for (auto i : adj)
        {
            cout << i.first << " -> ";
            for (auto j : i.second)
            {
                cout << j << " ";
            }
            cout << endl;
        }
    }

    vector<T> shortest_path(T src, T dest)
    {
        visited.clear();
        parent.clear();
        ans.clear();

        if (adj.find(src) == adj.end() || adj.find(dest) == adj.end())
        {
            cout << "One or both stations do not exist in the network." << endl;
            return {};
        }

        queue<T> q;
        q.push(src);
        parent[src] = src;
        visited[src] = true;

        while (!q.empty())
        {
            T front = q.front();
            q.pop();
            if (front == dest)
                break;

            for (auto i : adj[front])
            {
                if (!visited[i])
                {
                    visited[i] = true;
                    parent[i] = front;
                    q.push(i);
                }
            }
        }

        T current = dest;
        if (!visited[dest])
        {
            cout << "No valid path found from " << src << " to " << dest << endl;
            return {};
        }

        ans.push_back(current);
        while (current != src)
        {
            current = parent[current];
            ans.push_back(current);
        }

        reverse(ans.begin(), ans.end());
        return ans;
    }

    unordered_map<string, Train*> stationSchedules; 

      void addTrain(string station, int trainNumber, string destination, string departureTime, float fare) {
    Train* newTrain = new Train(trainNumber, destination, departureTime, fare);
    if (stationSchedules[station] == nullptr) {
        stationSchedules[station] = newTrain;
    } else {
        Train* temp = stationSchedules[station];
        while (temp->next != nullptr) {
            temp = temp->next;
        }
        temp->next = newTrain;
    }
    cout << "Train " << trainNumber << " added to station " << station << ".\n";
}

void displayTrains(string station) {
    if (stationSchedules[station] == nullptr) {
        cout << "No trains scheduled for station " << station << ".\n";
        return;
    }
    cout << "Trains scheduled for " << station << ":\n";
    Train* temp = stationSchedules[station];
    while (temp != nullptr) {
        cout << "Train Number: " << temp->trainNumber
             << ", Destination: " << temp->destination
             << ", Departure Time: " << temp->departureTime
             << ", Fare: " << temp->fare << " INR\n";
        temp = temp->next;
    }
}

void removeTrain(string station, int trainNumber) {
    Train* temp = stationSchedules[station];
    Train* prev = nullptr;

    while (temp != nullptr && temp->trainNumber != trainNumber) {
        prev = temp;
        temp = temp->next;
    }

    if (temp == nullptr) {
        cout << "Train " << trainNumber << " not found at station " << station << ".\n";
        return;
    }

    if (prev == nullptr) {
        stationSchedules[station] = temp->next;
    } else {
        prev->next = temp->next;
    }

    delete temp;
    cout << "Train " << trainNumber << " removed from station " << station << ".\n";
}

};

graph<string> g;

// User class for managing bookings
class user
{
public:
    string username;
    string password;
    vector<string> currentPath;
    vector<vector<string>> history;

    queue<vector<string>> recentRoutes;
    unordered_map<string, bool> bookedStations;
    stack<vector<string>> lastBooking;

   void bookTicket() {
    cout << "Enter boarding station: ";
    string start;
    cin >> start;
    cout << "Enter destination station: ";
    string dest;
    cin >> dest;

    currentPath = g.shortest_path(start, dest);
    if (currentPath.empty()) return;

    cout << "Enter booking hour (0-23): ";
    int hour;
    cin >> hour;

    int distance = currentPath.size() - 1;
    float dynamicFare = calculateDynamicFare(distance, hour);

    history.push_back(currentPath);
    recentRoutes.push(currentPath);
    lastBooking.push(currentPath);

    for (auto station : currentPath) {
        bookedStations[station] = true;
    }

    if (recentRoutes.size() > 5) recentRoutes.pop();

    cout << "Route booked successfully! Dynamic Fare: " << dynamicFare << " INR." << endl;

    // Proceed with seat selection and payment
    cout << "Enter number of seats to book: ";
    int numSeats;
    cin >> numSeats;
    selectSeat(numSeats);
    choosePaymentMethod();
}


    // Dynamic pricing function
    float calculateDynamicFare(int distance, int hour)
    {
        float baseFare = distance * cost;

        float demandFactor = 1 + (rand() % 50) / 100.0; // Range: 1.0 to 1.5

        // Time Factor
        float timeFactor = 1.0;
        if (hour >= 7 && hour <= 10 || hour >= 17 && hour <= 20)
        {
            // Peak hours
            timeFactor = 8;
        }

        else if (hour >= 0 && hour <= 6)
        {
            // Late night
            timeFactor = 3;
        }

         // Final Dynamic Fare
         return baseFare * demandFactor * timeFactor;
    }


    void cancelTicket()
    {
        if (history.empty())
        {
            cout << "No bookings to cancel." << endl;
            return;
        }

        vector<string> lastRoute = history.back();
        history.pop_back();

        for (auto station : lastRoute)
        {
            bookedStations.erase(station);
        }

        cout << "Last booking cancelled successfully." << endl;
    }

    void showRecentRoutes()
    {
        if (recentRoutes.empty())
        {
            cout << "No recent routes to display." << endl;
            return;
        }

        cout << "Recent Routes:" << endl;
        queue<vector<string>> temp = recentRoutes;
        while (!temp.empty())
        {
            for (auto station : temp.front())
            {
                cout << station << " ";
            }
            cout << endl;
            temp.pop();
        }
    }

    void showLastBooking()
    {
        if (lastBooking.empty())
        {
            cout << "No bookings found." << endl;
            return;
        }

        cout << "Last Booking:" << endl;
        for (auto station : lastBooking.top())
        {
            cout << station << " ";
        }
        cout << endl;
    }

    // Shortest distance:
    int shortestDistance(const string &start, const string &end)
    {
        vector<string> path = g.shortest_path(start, end);
        if (path.empty())
            return -1;
        return path.size() - 1;
    }
    //..................................
    void findShortestDistance()
    {
        cout << "Enter start station: ";
        string start;
        cin >> start;
        cout << "Enter destination station: ";
        string end;
        cin >> end;

        int distance = shortestDistance(start, end);
        if (distance == -1)
            cout << "No valid path found between " << start << " and " << end << ".\n";
        else
            cout << "Shortest distance: " << distance << " station(s).\n";
    }
    // Validate Station Before Booking :
    bool validateStations(const string &start, const string &end)
    {
        if (g.adj.find(start) == g.adj.end())
        {
            cout << "Error: Boarding station '" << start << "' does not exist.\n";
            return false;
        }
        if (g.adj.find(end) == g.adj.end())
        {
            cout << "Error: Destination station '" << end << "' does not exist.\n";
            return false;
        }
        return true;
    }
    ////////////Update profile
    void updateProfile()
    {
        int choice;
        cout << "1. Change Username\n2. Change Password\nEnter choice: ";
        cin >> choice;
        if (choice == 1)
        {
            cout << "Enter new username: ";
            string newUsername;
            cin >> newUsername;
            username = newUsername;
            cout << "Username updated successfully.\n";
        }
        else if (choice == 2)
        {
            cout << "Enter new password: ";
            string newPassword;
            cin >> newPassword;
            password = newPassword;
            cout << "Password updated successfully.\n";
        }
        else
        {
            cout << "Invalid choice.\n";
        }
    }
    // Payment Methods
    void choosePaymentMethod()
    {
        cout << "Select Payment Method:\n1. Credit Card\n2. Debit Card\n3. UPI\n4. Net Banking\n5. Wallet\n";
        int paymentChoice;
        cin >> paymentChoice;
        switch (paymentChoice)
        {
        case 1:
                cout<<"Enter valid card no. \n";
            break;
        case 2:
            cout << "Payment made via Debit Card.\n";
            break;
        case 3:
            cout << "Payment made via UPI.\n";
            break;
        case 4:
            cout << "Payment made via Net Banking.\n";
            break;
        case 5:
            cout << "Payment made via Wallet.\n";
            break;
        default:
            cout << "Invalid payment method.\n";
        }
    }
    // Seat Selection ..............
    void selectSeat(int numSeats)
    {
        vector<int> selectedSeats(numSeats);
        cout << "Available seats (1-100):\n";
        for (int i = 1; i <= 100; i++)
        {
            if (bookedStations[to_string(i)] == false)
                cout << i << " ";
        }
        cout << "\nSelect " << numSeats << " seat(s):\n";
        for (int i = 0; i < numSeats; i++)
        {
            int seat;
            cin >> seat;
            if (seat < 1 || seat > 100 || bookedStations[to_string(seat)])
            {
                cout << "Invalid or already booked seat. Try again.\n";
                i--;
            }
            else
            {
                selectedSeats[i] = seat;
                bookedStations[to_string(seat)] = true;
            }
        }
        cout << "Seats selected successfully.\n";
    }

// Sudoku Functions :

// Sudoku
   void printSudoku(const vector<vector<int>>& board) {
        for (int r = 0; r < N; r++) {
            for (int d = 0; d < N; d++) {
                cout << board[r][d] << " ";
            }
            cout << endl;
        }
    }

    bool isSafe(const vector<vector<int>>& board, int row, int col, int num) {
        for (int x = 0; x < N; x++) {
            if (board[row][x] == num || board[x][col] == num) {
                return false;
            }
        }

        int startRow = row - row % 3, startCol = col - col % 3;
        for (int i = 0; i < 3; i++) {
            for (int j = 0; j < 3; j++) {
                if (board[i + startRow][j + startCol] == num) {
                    return false;
                }
            }
        }
        return true;
    }

    void generateSudoku(vector<vector<int>>& board) {
        // Fill the diagonal boxes
        for (int i = 0; i < N; i += 3) {
            int num = 1;
            vector<bool> used(10, false);
            while (num <= 9) {
                int row = rand() % 3 + i;
                int col = rand() % 3 + i;
                if (board[row][col] == 0 && !used[num]) {
                    board[row][col] = num;
                    used[num] = true;
                    num++;
                }
            }
        }

        // Remove some elements to create a puzzle
        int count = 20; // Adjust the number of empty cells
        while (count != 0) {
            int i = rand() % N;
            int j = rand() % N;
            if (board[i][j] != 0) {
                board[i][j] = 0;
                count--;
            }
        }
    }

    void playSudoku() {
        vector<vector<int>> board(N, vector<int>(N, 0));
        generateSudoku(board);
        cout << "Sudoku Puzzle:" << endl;
        printSudoku(board);

        int row, col, num;
        while (true) {
            cout << "Enter row (0-8), column (0-8), and number (1-9) to place (or -1 to exit): ";
            cin >> row;
            if (row == -1) break;  // Exit condition
            cin >> col >> num;

            if (num < 1 || num > 9 || row < 0 || row >= N || col < 0 || col >= N) {
                cout << "Invalid input. Please try again." << endl;
                continue;
            }

            if (isSafe(board, row, col, num)) {
                board[row][col] = num;
                cout << "Number placed successfully." << endl;
            } else {
                cout << "This move is not safe; please try a different number." << endl;
            }

            cout << "Current Board:" << endl;
            printSudoku(board);
        }

        cout << "Thanks for playing Sudoku!" << endl;
    }
    // End of sudoku
};

user users[6900];
int cnt = 0;

void signup(string username, string password)
{
    users[cnt].username = username;
    users[cnt].password = password;
    cnt++;
    cout << "Successfully signed up!" << endl;
}

user login(string username, string password)
{
    for (int i = 0; i < cnt; i++)
    {
        if (users[i].username == username && users[i].password == password)
        {
            return users[i];
        }
    }
    cout << "Invalid credentials!" << endl;
    return user();
}


// end of sudoku fun
// Main Menu
void displayMainMenu()
{
    cout << "\n";
    cout << setfill('=') << setw(50) << "" << endl; // Top border
    cout << setfill(' ') << setw(33) << "Indian Railway System Menu" << endl;
    cout << setfill(' ') << setw(50) << "" << endl; // Bottom border


    cout << "\n"
         << setw(32) << "1. Signup\n"
         << setw(32) << "2. Login\n"
         << setw(30) << "3. Admins Only\n"
         << setw(35) << "4. Book Ticket\n"
         << setw(35) << "5. Cancel Ticket\n"
         << setw(38) << "6. Show Recent Routes\n"
         << setw(39) << "7. Show Last Booking\n"
         << setw(37) << "8. Solve Sudoku\n"
         << setw(45) << "9. Find Shortest Distance\n"
         << setw(38) << "10. Update Profile\n"
         << setw(45) << "11. View Train Schedules\n"
         << setw(35) << "12. Exit\n";

    cout << setfill('-') << setw(50) << "" << endl; // Decorative footer
    cout << "Enter your choice: ";
}

//
int main()
{
    cout << "Welcome to Indian Railway Management System!" << endl;

    // Initialize the railway network once
    cout << "Setting up Indian Railway Network..." << endl;
    cout << "Enter number of connections: ";
    int n;
    cin >> n;

    cout << "Enter connections (e.g., delhi mumbai):" << endl;
    for (int i = 0; i < n; i++)
    {
        string u, v;
        cin >> u >> v;
        g.addEdge(u, v, 0);
    }

    cout << "Railway Network Established:" << endl;
    g.print_adj();

    user *currentUser = nullptr;

    while (true)
    {
        displayMainMenu();
        int choice;
        cin >> choice;

        if (choice == 1)
        {
            string username, password;
            cout << "Enter username: ";
            cin >> username;
            cout << "Enter password: ";
            cin >> password;
            signup(username, password);
        }
        else if (choice == 2)
        {
            string username, password;
            cout << "Enter username: ";
            cin >> username;
            cout << "Enter password: ";
            cin >> password;
            for (int i = 0; i < cnt; i++)
            {
                if (users[i].username == username && users[i].password == password)
                {
                    currentUser = &users[i];
                    cout << "Login successful!\n";
                    break;
                }
            }
            if (!currentUser)
                cout << "Invalid credentials!\n";
        }
        else if (choice >= 3 && choice <= 12)
        {
            if (!currentUser)
            {
                cout << "Please login first!\n";
                continue;
            }
            switch (choice)
            {
            case 4:
                currentUser->bookTicket();
                break;
            case 5:
                currentUser->cancelTicket();
                break;
            case 6:
                currentUser->showRecentRoutes();
                break;
            case 7:
                currentUser->showLastBooking();
                break;
            case 8:
            { 
                currentUser->playSudoku();
            }
            break;
            case 9:
                currentUser->findShortestDistance();
                break;
            case 10:
                currentUser->updateProfile();
                break;
                   case 11: // New case for viewing train schedules
    {
        string station;
        cout << "Enter station: ";
        cin >> station;
        g.displayTrains(station);  // Display the trains scheduled at the station
        break;
    }
     case 12:
        {
            cout << "Exiting...\n";
            break;
        }
                case 3: {
    string adminUsername, adminPassword;
    cout << "Enter admin username: ";
    cin >> adminUsername;
    cout << "Enter admin password: ";
    cin >> adminPassword;

    // Define admin credentials
    const string correctAdminUsername = "admin";
    const string correctAdminPassword = "admin123";

    if (adminUsername == correctAdminUsername && adminPassword == correctAdminPassword)
    {
        while (true)
        {
            cout << "\nTrain Schedule Management\n";
            cout << "1. Add Train\n";
            cout << "2. Display Trains at a Station\n";
            cout << "3. Remove Train\n";
            cout << "4. Exit to Main Menu\n";
            cout << "Enter your choice: ";
            int trainChoice;
            cin >> trainChoice;

            if (trainChoice == 1)
            {
                string station, destination, departureTime;
                int trainNumber;
                float fare;

                cout << "Enter station: ";
                cin >> station;
                cout << "Enter train number: ";
                cin >> trainNumber;
                cout << "Enter destination: ";
                cin >> destination;
                cout << "Enter departure time: ";
                cin >> departureTime;
                cout << "Enter fare: ";
                cin >> fare;

                g.addTrain(station, trainNumber, destination, departureTime, fare);
            }
            else if (trainChoice == 2)
            {
                string station;
                cout << "Enter station: ";
                cin >> station;
                g.displayTrains(station);
            }
            else if (trainChoice == 3)
            {
                string station;
                int trainNumber;
                cout << "Enter station: ";
                cin >> station;
                cout << "Enter train number: ";
                cin >> trainNumber;
                g.removeTrain(station, trainNumber);
            }
            else if (trainChoice == 4)
            {
                break; // Exit back to the main menu
            }
            else
            {
                cout << "Invalid choice! Try again.\n";
            }
        }
    }
    else
    {
        cout << "Invalid admin credentials! Access denied.\n";
    }
}

            }
        }
       
    }
    return 0;
}
