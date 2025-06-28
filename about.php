<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About || Final</title>
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
          <a href="index.php" class="nav-link"> home </a>
          <a href="about.php" class="nav-link"> about </a>
          <a href="tags.php" class="nav-link"> tags </a>
          <a href="recipes.php" class="nav-link"> recipes </a>

          <div class="nav-link contact-link">
            <a href="contact.php" class="btn"> contact </a>
          </div>
        </div>
      </div>
    </nav>
    <BR>
    <!-- end of nav -->
    <main class="page">
      <section class="about-page">
        <article>
          <BR>
          <h2>Kitchen Diary </h2>
          <p>
          <b><H4>About Us</H4></b>
            
            Welcome to <B>Kitchen Dairy</B>, your one-stop guide to creating flavorful, easy-to-make recipes from around the world. Our mission is to bring you dishes that are both delicious and accessible, perfect for everyone from beginners to seasoned home chefs.
            
            At Kitchen Dairy, we believe cooking should be enjoyable and stress-free. That’s why we provide detailed, step-by-step recipes, practical tips, and time-saving hacks. Whether you're looking for a quick weeknight dinner, a healthy snack, or an indulgent dessert, our curated collection has something for every craving and occasion.
            
            Each recipe has been tested and refined to ensure you get the best results every time. Join us on this culinary adventure, discover new flavors, and turn your kitchen into a place of creativity and joy. 
            
            Happy Cooking!</p>
          
          <a href="contact.php" class="btn"> contact </a>
          <a href="http://localhost/Lab/logsign.php" class="btn">Register</a>
        </article>
        <!-- needs fixes -->
        <img
          src="Assets/salt.jpg"
          alt="Person Pouring Salt in Bowl"
          class="img about-img"
        />
      </section>
      <section class="featured-recipes">
        <h5 class="featured-title">Look At This Awesomesouce!</h5>
        <div class="recipes-list">
          <!-- single recipe -->
          <a href="single-recipe1.php" class="recipe">
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
          <a href="single-recipe2.php" class="recipe">
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
          <a href="single-recipe3.php" class="recipe">
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
      <audio autoplay loop>
        <source src="aud.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    </footer>
    <script src="./js/app.js"></script>
  </body>
</html>
