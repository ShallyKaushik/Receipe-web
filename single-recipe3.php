<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vegetable Soup Recipe || Final</title>
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
            src="Assets/vgsoup.jpg"
            class="img recipe-hero-img"
            alt="Vegetable Soup"
          />
          <article class="recipe-info">
            <h2>Vegetable Soup</h2>
            <p>
              Vegetable Soup is a hearty and nutritious dish made with a variety of vegetables and herbs. It's perfect for a cozy meal and can be customized with your favorite ingredients.
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
              Tags : <a href="tag-template.php">vegetarian</a>
              <a href="tag-template.php">soup</a>
              <a href="tag-template.php">healthy</a>
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
                In a large pot, heat olive oil over medium heat. Add chopped onions, garlic, and celery. Sauté until softened.
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
                Add diced carrots, bell peppers, and any other vegetables you prefer. Cook for about 5 minutes.
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
                Pour in vegetable broth and bring to a boil. Reduce heat and let it simmer for 15-20 minutes.
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
                Season with salt, pepper, and fresh herbs. Serve hot with crusty bread.
              </p>
            </div>
            <!-- end of single instruction -->
          </article>
          <article class="second-column">
            <div>
              <h4>ingredients</h4>
              <p class="single-ingredient">1 tablespoon olive oil</p>
              <p class="single-ingredient">1 onion, chopped</p>
              <p class="single-ingredient">2 cloves garlic, minced</p>
              <p class="single-ingredient">2 celery stalks, chopped</p>
              <p class="single-ingredient">2 carrots, diced</p>
              <p class="single-ingredient">1 bell pepper, diced</p>
              <p class="single-ingredient">4 cups vegetable broth</p>
              <p class="single-ingredient">Salt and pepper to taste</p>
              <p class="single-ingredient">Fresh herbs for garnish</p>
            </div>
            <div>
              <h4>tools</h4>
              <p class="single-tool">Large pot</p>
              <p class="single-tool">Cutting board</p>
              <p class="single-tool">Knife</p>
              <p class="single-tool">Ladle</p>
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