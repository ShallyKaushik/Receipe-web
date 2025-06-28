<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kitchen Diary || Final</title>
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
            <a href="http://localhost/Lab/contact.php" class="btn"> contact </a>
            <a href="http://localhost/Lab/logsign.php" class="btn">Register</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- end of nav -->
    <!-- main -->
    <main class="page">
      <!-- header -->
      <header class="hero" style=" background: url('Assets/kd1.jpg') center/cover no-repeat;" >
        <div class="hero-container">
          <div class="hero-text">
            <h1>Prince Ka Dhaba</h1>
            <h4>no fluff, just recipes</h4>
          </div>
        </div>
      </header>
      <!-- end of header -->
      <section class="recipes-container">
        <!-- tag container -->
        <div class="tags-container">
          <h4>recipes</h4>
          <a href="tags.php"><img src="Assets/Menu.png" width="178px" height="auto"> </a>
          <div class="tags-list">
          
          </div>
        </div>
        <!-- end of tag container -->
        <!-- recipes list -->
        <div class="recipes-list">
          <!-- single recipe -->
          <a href="single-recipe1.php" class="recipe">
            <img
              src="Assets/dosa.webp"
              class="img recipe-img"
              alt=""
            />
            <h5>Masala Dosa</h5>
            <p>Prep : 20min | Cook : 30min</p>
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
            <p>Prep : 30min | Cook : 45min</p>
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
            <p>Prep : 15min | Cook : 25min</p>
          </a>
          <!-- end of single recipe -->
          <!-- single recipe -->
          <a href="single-recipe4.php" class="recipe">
            <img
              src="Assets/pao.jpg"
              class="img recipe-img"
              alt=""
            />
            <h5>Pav Bhaji</h5>
            <p>Prep : 20min | Cook : 30min</p>
          </a>
          <!-- end of single recipe -->
           <!-- single recipe -->
          <a href="single-recipe5.php" class="recipe">
            <img
              src="Assets/gulab.webp"
              class="img recipe-img"
              alt=""
            />
            <h5>Gulab Jamun</h5>
            <p>Prep : 20min | Cook : 30min</p>
          </a>
          <!-- end of single recipe -->
           <!-- single recipe -->
          <a href="single-recipe6.php" class="recipe">
            <img
              src="Assets/pasta.webp"
              class="img recipe-img"
              alt=""
            />
            <h5>Red Sauce Pasta</h5>
            <p>Prep : 20min | Cook : 30min</p>
          </a>
          <!-- end of single recipe -->
        </div>
        <!-- end of recipes list -->
      </section>
    </main>
    <!-- end of main -->
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
