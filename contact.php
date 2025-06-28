<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "kitchen_diary"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $subject = $conn->real_escape_string($_POST["subject"]);
    $message = $conn->real_escape_string($_POST["message"]);

    // Insert data into the table
    $sql = "INSERT INTO inquiries (name, email, subject, message) 
            VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<h3>Your message has been submitted successfully!</h3>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact || Final</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon" />
    <!-- main css -->
    <link rel="stylesheet" href="main.css" />
  </head>
  <body>
    <!-- nav  -->
    <nav class="navbar">
      <div class="nav-center">
        <div class="nav-header">
          <a href="index.html" class="nav-logo"><div class="logo">
            <img src="Assets/flogo.png" alt="simply recipes" /></div>
          </a>
          <button class="nav-btn btn">
            <i class="fas fa-align-justify"></i>
          </button>
        </div>
        <div class="nav-links">
          <a href="index.html" class="nav-link"> home </a>
          <a href="about.html" class="nav-link"> about </a>
          <a href="tags.html" class="nav-link"> tags </a>
          <a href="recipes.html" class="nav-link"> recipes </a>

          <div class="nav-link contact-link">
            <a href="contact.html" class="btn"> contact </a>
            <a href="http://localhost/Lab/logsign.php" class="btn">Register</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- end of nav -->
    <main class="page">
     <section class="contact-container">
          <article class="contact-info">
            <h2>Want To Get In Touch?</h2>
            <p>
              Got a question, feedback, or a recipe request? We’d love to hear from you! Whether you’re looking for cooking tips, have a business inquiry, or simply want to say hello, feel free to reach out. Just fill out the form below, and we’ll get back to you as soon as possible. Happy cooking, and thanks for being part of our community!
            </p>
            <br>
            <br>
            <div id="contact-details">
              <p>Email: <a href="mailto:kitchen.dairy@example.com">kitchen.dairy@example.com</a></p>
              <p>Phone: +91 98971*****</p>
            </div>
            
           
          </article>
          <article>
            <form class="form contact-form" method="post" action="http://localhost/Lab/contact.php">
              <div class="form-row">
                <label html="name" class="form-label">your name</label>
                <input type="text" name="name" id="name" class="form-input" />
              </div>
              <div class="form-row">
                <label html="email" class="form-label">your email</label>
                <input type="text" name="email" id="email" class="form-input" />
              </div>
              
              <div class="form-row">
                <label for="subject">Subject</label>
    <select id="subject" name="subject">
      <option value="General Inquiry">General Inquiry</option>
      <option value="Recipe Feedback">Recipe Feedback</option>
      <option value="Collaboration">Collaboration</option>
    </select>
              </div>
              <div class="form-row">
                <label html="message" class="form-label">message</label>
                <textarea name="message" id="message" class="form-textarea"></textarea>
              </div>
              <button type="submit" class="btn btn-block">
                submit
              </button>
            </form>
          </article>
        </section>
     <!-- featured recipes -->
       <section class="featured-recipes">
        <h5 class="featured-title">Look At This Awesomesouce!</h5>
        <div class="recipes-list">
          <!-- single recipe -->
          <a href="single-recipe.html" class="recipe">
            <img
              src="Assets/dosa.webp"
              class="img recipe-img"
              alt=""
            />
            <h5>Masala Dosa</h5>
            <p>Prep : 15min | Cook : 5min</p>
          </a>
          <!-- end of single recipe -->
          <!-- single recipe -->
          <a href="single-recipe.html" class="recipe">
            <img
              src="Assets/chole.jpg"
              class="img recipe-img"
              alt=""
            />
            <h5>Chole Bhature</h5>
            <p>Prep : 15min | Cook : 5min</p>
          </a>
          <!-- end of single recipe -->
          <!-- single recipe -->
          <a href="single-recipe.html" class="recipe">
            <img
              src="Assets/vgsoup.jpg"
              class="img recipe-img"
              alt=""
            />
            <h5>Vegetable Soup</h5>
            <p>Prep : 15min | Cook : 5min</p>
          </a>
          <!-- end of single recipe -->
        </div>
      </section>
    </main>
    <!-- footer -->
    <footer class="page-footer">
      <p>
        &copy; <span id="date"></span>
        <span class="footer-logo">Kitchen Diary</span> 
      </p>
    </footer>
    <script src="C:\PROJECT\app.js"></script>
  </body>
</html>
