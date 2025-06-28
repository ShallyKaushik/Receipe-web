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
          <img
            src="Assets/pasta.webp"
            class="img recipe-hero-img"
            alt="Chole Bhature"
          />
          <article class="recipe-info">
            <h2>Pasta</h2>
            <p>
                Pasta is a versatile Italian dish made from durum wheat dough, shaped into various forms like spaghetti, 
                penne, or fusilli. Often paired with flavorful sauces like marinara, alfredo, or pesto, pasta is a beloved
                comfort food enjoyed worldwide for its simplicity and delicious taste.
            </p>
            <div class="recipe-icons">
              <article>
                <i class="fas fa-clock"></i>
                <h5>prep time</h5>
                <p>10 min.</p>
              </article>
              <article>
                <i class="far fa-clock"></i>
                <h5>cook time</h5>
                <p>15 min.</p>
              </article>
              <article>
                <i class="fas fa-user-friends"></i>
                <h5>serving</h5>
                <p>2 servings</p>
              </article>
            </div>
            <p class="recipe-tags">
              Tags : <a href="tag-template.php">Italian Cuisine</a>
              <a href="tag-template.php">Indian</a>
              <a href="tag-template.php">Main Course</a>
              <a href="tag-template.php">Versatile Dish</a>
            </p>
          </article>
        </section>
        <!-- content -->
        <section class="recipe-content">
          <article>
            <h4>Instructions</h4>
            <!-- single instruction -->
            <div class="single-instruction">
              <header>
                <p>Step 1</p>
                <div></div>
              </header>
              <p>
                <b>Boil the Pasta:</b> In a large pot, bring water to a boil. Add salt and olive oil. Add the 
                pasta and cook until al dente (firm to the bite), according to the package instructions. Drain the pasta 
                and set it aside.
              </p>
            </div>
            <!-- end of single instruction -->
            <!-- single instruction -->
            <div class="single-instruction">
              <header>
                <p>Step 2</p>
                <div></div>
              </header>
              <p>
                <b>Prepare the sauce:</b>
                In a saucepan, heat olive oil over medium heat. Sauté garlic and onions until fragrant and translucent. 
                Add the tomato puree and cook for 5-7 minutes
              </p>
            </div>
            <!-- end of single instruction -->
            <!-- single instruction -->
            <div class="single-instruction">
              <header>
                <p>Step 3</p>
                <div></div>
              </header>
              <p>
                <b>Season the Sauce:</b>
                Add oregano, basil, chili flakes, salt, and pepper. Let the sauce simmer for another 2-3 minutes. 
                Adjust seasoning to taste
              </p>
            </div>
            <!-- end of single instruction -->
            <!-- single instruction -->
            <div class="single-instruction">
              <header>
                <p>Step 4</p>
                <div></div>
              </header>
              <p>
                <b>Combine Pasta and Sauce:</b>
          Add the cooked pasta to the sauce and mix well to coat evenly. Let it cook together for 2 minutes on low heat.
              </p>
            </div>
            <!-- end of single instruction -->
            <!-- single instruction -->
            <div class="single-instruction">
              <header>
                <p>Step 5</p>
                <div></div>
              </header>
              <p>
                <b>Garnish the Serve:</b>
                Transfer the pasta to a serving dish. Garnish with grated parmesan or mozzarella if desired. Serve hot and enjoy!
              </p>
            </div>
            <!-- end of single instruction -->
            
          </article>
          <article class="second-column">
            <div>
              <h4>Ingredients</h4>
              <p class="single-ingredient">200g pasta of choice (e.g., spaghetti, penne)</p>
              <p class="single-ingredient">4-5 cups water (for boiling)</p>
              <p class="single-ingredient">1 tsp salt</p>
              <p class="single-ingredient">1 tsp olive oil</p>
              <p class="single-ingredient">2 tbsp olive oil</p>
              <p class="single-ingredient">3-4 garlic cloves (minced)</p>
              <p class="single-ingredient">1 small onion (chopped)</p>
              <p class="single-ingredient">2 cups tomato puree</p>
              <p class="single-ingredient">1 tsp dried oregano</p>
              <p class="single-ingredient">1 tsp dried basil</p>
              <p class="single-ingredient">1/2 tsp chili flakes (optional)</p>
              <p class="single-ingredient">Grated parmesan or mozzarella (optional, for garnish)</p>
            </div>
            <div>
              <h4>Tools</h4>
              <p class="single-tool">Large Pot (for boiling pasta)</p>
              <p class="single-tool">Strainer/Colander</p>
              <p class="single-tool">Saucepan (for preparing sauce)</p>
              <p class="single-tool">Tongs or Wooden Spoon (for mixing and serving)</p>
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