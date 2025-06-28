<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Masala Dosa Recipe || Final</title>
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
            src="Assets/dosa.webp"
            class="img recipe-hero-img"
            alt="Masala Dosa"
          />
          <article class="recipe-info">
            <h2>Masala Dosa</h2>
            <p>
              Masala Dosa is a popular South Indian dish made from fermented rice and lentil batter, filled with a spiced potato mixture. It's crispy, delicious, and often served with chutneys and sambar.
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
                <p>30 min.</p>
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
              <a href="tag-template.php">breakfast</a>
              <a href="tag-template.php">crispy</a>
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
                Soak rice and urad dal in water for 6-8 hours. Drain and blend to a smooth batter. Ferment overnight.
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
                For the filling, boil the potatoes and mash them. In a pan, heat oil, add mustard seeds, and let them splutter. Add chopped onions, green chilies, and curry leaves. Sauté until onions are translucent.
              </p>
            </div>
            <!-- end of single instruction -->
            <!-- single instruction -->
            <div class="single-instruction">
              <header>
                <p>step 3</p>
                <div></div>
              </header> <p>
                Add the mashed potatoes, turmeric powder, and salt. Mix well and cook for a few minutes. Set aside.
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
                Heat a non-stick pan and pour a ladleful of batter, spreading it into a thin circle. Drizzle oil around the edges and cook until the bottom is golden brown.
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
                Place a portion of the potato filling in the center of the dosa and fold it over. Cook for another minute and serve hot with chutney and sambar.
              </p>
            </div>
            <!-- end of single instruction -->
          </article>
          <article class="second-column">
            <div>
              <h4>ingredients</h4>
              <p class="single-ingredient">1 cup rice</p>
              <p class="single-ingredient">1/4 cup urad dal (split black gram)</p>
              <p class="single-ingredient">2-3 medium potatoes, boiled and mashed</p>
              <p class="single-ingredient">1 onion, chopped</p>
              <p class="single-ingredient">2 green chilies, chopped</p>
              <p class="single-ingredient">1 teaspoon mustard seeds</p>
              <p class="single-ingredient">Curry leaves</p>
              <p class="single-ingredient">Turmeric powder, salt to taste</p>
              <p class="single-ingredient">Oil for cooking</p>
            </div>
            <div>
              <h4>tools</h4>
              <p class="single-tool">Blender for batter</p>
              <p class="single-tool">Non-stick pan or tava</p>
              <p class="single-tool">Spatula</p>
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
        <span class="footer-logo">Kitchen Diary</span> 
      </p>
    </footer>
    <script src="./js/app.js"></script>
  </body>
</html>