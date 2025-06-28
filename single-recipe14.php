<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pasta Recipe || Final</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon" />
    <!-- normalize -->
    <link rel="stylesheet" href="normalize.css" />
    <!-- font-awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />
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
   
        <div class="recipe-page">
            <section class="recipe-hero">
              <img src="Assets/aloo.webp" class="img recipe-hero-img" alt="Aloo Paratha" />
              <article class="recipe-info">
                <h2>Aloo Paratha</h2>
                <p>
                  A traditional Indian flatbread stuffed with spiced mashed potatoes, best enjoyed with butter or yogurt.
                </p>
                <div class="recipe-icons">
                  <article>
                    <i class="fas fa-clock"></i>
                    <h5>prep time</h5>
                    <p>15 min.</p>
                  </article>
                  <article>
                    <i class="far fa-clock"></i>
                    <h5>cook time</h5>
                    <p>25 min.</p>
                  </article>
                  <article>
                    <i class="fas fa-user-friends"></i>
                    <h5>serving</h5>
                    <p>4 servings</p>
                  </article>
                </div>
                <p class="recipe-tags">
                  Tags: <a href="tag-template.php">vegetarian</a>
                  <a href="tag-template.php">breakfast</a>
                  <a href="tag-template.php">Indian</a>
                </p>
              </article>
            </section>
            <section class="recipe-content">
              <article>
                <h4>instructions</h4>
                <div class="single-instruction">
                  <header>
                    <p>step 1</p>
                    <div></div>
                  </header>
                  <p>Boil, peel, and mash the potatoes. Mix with spices, onions, and coriander.</p>
                </div>
                <div class="single-instruction">
                  <header>
                    <p>step 2</p>
                    <div></div>
                  </header>
                  <p>Prepare dough by kneading flour, water, and salt.</p>
                </div>
                <div class="single-instruction">
                  <header>
                    <p>step 3</p>
                    <div></div>
                  </header>
                  <p>Roll out the dough, stuff with potato mixture, and seal.</p>
                </div>
                <div class="single-instruction">
                  <header>
                    <p>step 4</p>
                    <div></div>
                  </header>
                  <p>Cook on a hot griddle until golden brown on both sides.</p>
                </div>
              </article>
              <article class="second-column">
                <div>
                  <h4>ingredients</h4>
                  <p class="single-ingredient">2 cups whole wheat flour</p>
                  <p class="single-ingredient">3 medium potatoes</p>
                  <p class="single-ingredient">1 small onion, chopped</p>
                  <p class="single-ingredient">Spices: chili powder, cumin, salt</p>
                  <p class="single-ingredient">Fresh coriander leaves</p>
                </div>
                <div>
                  <h4>tools</h4>
                  <p class="single-tool">Griddle</p>
                  <p class="single-tool">Rolling pin</p>
                  <p class="single-tool">Mixing bowl</p>
                </div>
              </article>
            </section>
          </div>
          
    </main>
    <!-- footer -->
    <footer class="page-footer">
      <p>
        &copy; <span id="date"></span>
        <span class="footer-logo">Kitchn Diary</span> 
      </p>
    </footer>
    <script src="./js/app.js"></script>
  </body>
</html>