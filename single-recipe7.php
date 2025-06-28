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
              <img src="Assets/butter.webp" class="img recipe-hero-img" alt="Butter Chicken" />
              <article class="recipe-info">
                <h2>Butter Chicken</h2>
                <p>
                  Butter Chicken is a creamy and flavorful Indian curry made with marinated chicken cooked in a tomato-based gravy, perfect with naan or rice.
                </p>
                <div class="recipe-icons">
                  <article>
                    <i class="fas fa-clock"></i>
                    <h5>prep time</h5>
                    <p>20 min.</p>
                  </article>
                  <article>
                    <i class="far fa-clock"></i>
                    <h5>cook time</h5>
                    <p>40 min.</p>
                  </article>
                  <article>
                    <i class="fas fa-user-friends"></i>
                    <h5>serving</h5>
                    <p>4 servings</p>
                  </article>
                </div>
                <p class="recipe-tags">
                  Tags: <a href="tag-template.php">non-vegetarian</a>
                  <a href="tag-template.php">Indian</a>
                  <a href="tag-template.php">creamy</a>
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
                  <p>Marinate chicken in yogurt, spices, and lemon juice for at least 30 minutes.</p>
                </div>
                <div class="single-instruction">
                  <header>
                    <p>step 2</p>
                    <div></div>
                  </header>
                  <p>Grill or pan-fry the marinated chicken pieces until lightly cooked.</p>
                </div>
                <div class="single-instruction">
                  <header>
                    <p>step 3</p>
                    <div></div>
                  </header>
                  <p>Sauté onions, garlic, and ginger in butter. Add tomato puree and spices.</p>
                </div>
                <div class="single-instruction">
                  <header>
                    <p>step 4</p>
                    <div></div>
                  </header>
                  <p>Stir in cream, cooked chicken, and simmer for 15 minutes.</p>
                </div>
              </article>
              <article class="second-column">
                <div>
                  <h4>ingredients</h4>
                  <p class="single-ingredient">500g chicken</p>
                  <p class="single-ingredient">1 cup yogurt</p>
                  <p class="single-ingredient">2 cups tomato puree</p>
                  <p class="single-ingredient">1/2 cup cream</p>
                  <p class="single-ingredient">2 tablespoons butter</p>
                  <p class="single-ingredient">Spices: garam masala, paprika, cumin</p>
                  <p class="single-ingredient">Salt to taste</p>
                </div>
                <div>
                  <h4>tools</h4>
                  <p class="single-tool">Grill or frying pan</p>
                  <p class="single-tool">Saucepan</p>
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