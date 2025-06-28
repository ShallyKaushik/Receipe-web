<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tags || Final</title>
    <!-- main css -->
    <link rel="stylesheet" href="main.css" />
    
  </head>
  <body>
    <!-- nav  -->
    <nav class="navbar">
      <div class="nav-center">
        <div class="nav-header">
          <a href="index.php" class="nav-logo"><div class="logo">
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
            <a href="http://localhost/Lab/logsign.php" class="btn">Register</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- end of nav -->
    <main class="page">
      <div class="category-button"  >
         <section class="tags-wrapper">
          <!-- single tag -->
              <a href="break.php" class="tag">
                <h5>Breakfast</h5>
                <p>3 recipe</p>
              </a>
            <!-- end of single tag -->
        </section>
        <section class="tags-wrapper">
          <!-- single tag -->
              <a href="lunch.php" class="tag">
                <h5>Lunch</h5>
                <p>4 recipe</p>
              </a>
            <!-- end of single tag -->
        </section>
        <section class="tags-wrapper">
          <!-- single tag -->
              <a href="dinner.php" class="tag">
                <h5>Dinner</h5>
                <p>3 recipe</p>
              </a>
            <!-- end of single tag -->
        </section>
        <section class="tags-wrapper">
          <!-- single tag -->
              <a href="snack.php" class="tag">
                <h5>Snacks</h5>
                <p>2 recipe</p>
              </a>
            <!-- end of single tag -->
        </section>
        <section class="tags-wrapper">
          <!-- single tag -->
              <a href="dessert.php" class="tag">
                <h5>dessert</h5>
                <p>3 recipe</p>
              </a>
            <!-- end of single tag -->
        </section>
</div>
    </main>
    <!-- footer -->
    <footer class="page-footer">
      <p>
        &copy; <span id="date"></span>
        <span class="footer-logo">Kitchen Diary</span>
      </p>
      <audio autoplay loop>
        <source src="aud1.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    </footer>
    <script src="./js/app.js"></script>
  </body>
</html>
