<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chole Bhature Recipe || Final</title>
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
          <img
            src="Assets/chole.jpg"
            class="img recipe-hero-img"
            alt="Chole Bhature"
          />
          <article class="recipe-info">
            <h2>Chole Bhature</h2>
            <p>
              Chole Bhature is a popular North Indian dish consisting of spicy chickpeas (chole) served with deep-fried bread (bhature). It's a delicious and satisfying meal, perfect for any time of the day.
            </p>
            <div class="recipe-icons">
              <article>
                <i class="fas fa-clock"></i>
                <h5>prep time</h5>
                <p>30 min.</p>
              </article>
              <article>
                <i class="far fa-clock"></i>
                <h5>cook time</h5>
                <p>45 min.</p>
              </article>
              <article>
                <i class="fas fa-user-friends"></i>
                <h5>serving</h5>
                <p>4 servings</p>
              </article>
            </div>
            <p class="recipe-tags">
              Tags : <a href="tag-template.php">vegetarian</a>
              <a href="tag-template.php">Indian</a>
              <a href="tag-template.php">spicy</a>
              <a href="tag-template.php">comfort food</a>
            </p>
          </article>
        </section>
        <!-- content -->
        <section class="recipe-content">
          <article>
            <h4>instructions</h4>
            <!-- single instruction -->
            <div class="single-instruction">
              <header>
                <p>step 1</p>
                <div></div>
              </header>
              <p>
                Soak the chickpeas overnight in water. Drain and boil them until soft.
              </p>
            </div>
            <!-- end of single instruction -->
            <!-- single instruction -->
            <div class="single-instruction">
              <header>
                <p>step 2</p>
                <div></div>
              </header>
              <p>
                In a pan, heat oil and add cumin seeds, chopped onions, ginger-garlic paste, and sauté until golden brown.
              </p>
            </div>
            <!-- end of single instruction -->
            <!-- single instruction -->
            <div class="single-instruction">
              <header>
                <p>step 3</p>
                <div></div>
              </header>
              <p>
                Add chopped tomatoes, green chilies, and spices (coriander powder, cumin powder, gar am masala). Cook until the tomatoes are soft and the oil separates.
              </p>
            </div>
            <!-- end of single instruction -->
            <!-- single instruction -->
            <div class="single-instruction">
              <header>
                <p>step 4</p>
                <div></div>
              </header>
              <p>
                Add the boiled chickpeas and some water. Simmer for 15-20 minutes, adjusting the seasoning as needed.
              </p>
            </div>
            <!-- end of single instruction -->
            <!-- single instruction -->
            <div class="single-instruction">
              <header>
                <p>step 5</p>
                <div></div>
              </header>
              <p>
                For the bhature, mix flour, yogurt, and a pinch of salt. Knead into a soft dough and let it rest for 30 minutes.
              </p>
            </div>
            <!-- end of single instruction -->
            <!-- single instruction -->
            <div class="single-instruction">
              <header>
                <p>step 6</p>
                <div></div>
              </header>
              <p>
                Roll out the dough into circles and deep fry until golden brown. Serve hot with chole, garnished with onions and coriander.
              </p>
            </div>
            <!-- end of single instruction -->
          </article>
          <article class="second-column">
            <div>
              <h4>ingredients</h4>
              <p class="single-ingredient">1 cup chickpeas</p>
              <p class="single-ingredient">1 large onion, chopped</p>
              <p class="single-ingredient">2 tomatoes, chopped</p>
              <p class="single-ingredient">1 tablespoon ginger-garlic paste</p>
              <p class="single-ingredient">2 green chilies, chopped</p>
              <p class="single-ingredient">2 tablespoons oil</p>
              <p class="single-ingredient">1 teaspoon cumin seeds</p>
              <p class="single-ingredient">Spices: coriander powder, cumin powder, garam masala</p>
              <p class="single-ingredient">Salt to taste</p>
              <p class="single-ingredient">For bhature: 2 cups all-purpose flour, 1/2 cup yogurt</p>
            </div>
            <div>
              <h4>tools</h4>
              <p class="single-tool">Large pot for boiling</p>
              <p class="single-tool">Pan for cooking</p>
              <p class="single-tool">Rolling pin</p>
              <p class="single-tool">Deep frying pan</p>
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