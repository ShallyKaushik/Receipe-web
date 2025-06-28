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
              <img src="Assets/cake.webp" class="img recipe-hero-img" alt="Chocolate Cake" />
              <article class="recipe-info">
                <h2>Chocolate Cake</h2>
                <p>
                  A moist, rich, and decadent chocolate cake perfect for any celebration. Enjoy this delightful dessert with your favorite frosting or toppings!
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
                    <p>35 min.</p>
                  </article>
                  <article>
                    <i class="fas fa-user-friends"></i>
                    <h5>serving</h5>
                    <p>8 servings</p>
                  </article>
                </div>
                <p class="recipe-tags">
                  Tags: <a href="tag-template.php">dessert</a>
                  <a href="tag-template.php">chocolate</a>
                  <a href="tag-template.php">baking</a>
                  <a href="tag-template.php">vegetarian</a>
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
                  <p>Preheat your oven to 180°C (350°F). Grease and line two 8-inch round baking pans.</p>
                </div>
                <div class="single-instruction">
                  <header>
                    <p>step 2</p>
                    <div></div>
                  </header>
                  <p>In a large bowl, sift together flour, cocoa powder, baking powder, baking soda, and salt.</p>
                </div>
                <div class="single-instruction">
                  <header>
                    <p>step 3</p>
                    <div></div>
                  </header>
                  <p>In another bowl, whisk sugar, eggs, milk, oil, and vanilla extract until smooth. Gradually add the dry ingredients and mix until combined.</p>
                </div>
                <div class="single-instruction">
                  <header>
                    <p>step 4</p>
                    <div></div>
                  </header>
                  <p>Add boiling water to the batter and mix. The batter will be thin; this ensures a moist cake.</p>
                </div>
                <div class="single-instruction">
                  <header>
                    <p>step 5</p>
                    <div></div>
                  </header>
                  <p>Divide the batter between the pans and bake for 30-35 minutes, or until a toothpick inserted comes out clean.</p>
                </div>
                <div class="single-instruction">
                  <header>
                    <p>step 6</p>
                    <div></div>
                  </header>
                  <p>Cool the cakes in the pans for 10 minutes, then transfer to a wire rack. Frost and decorate as desired before serving.</p>
                </div>
              </article>
              <article class="second-column">
                <div>
                  <h4>ingredients</h4>
                  <p class="single-ingredient">1 3/4 cups all-purpose flour</p>
                  <p class="single-ingredient">3/4 cup cocoa powder</p>
                  <p class="single-ingredient">1 1/2 teaspoons baking powder</p>
                  <p class="single-ingredient">1 1/2 teaspoons baking soda</p>
                  <p class="single-ingredient">1 teaspoon salt</p>
                  <p class="single-ingredient">2 cups sugar</p>
                  <p class="single-ingredient">2 large eggs</p>
                  <p class="single-ingredient">1 cup milk</p>
                  <p class="single-ingredient">1/2 cup vegetable oil</p>
                  <p class="single-ingredient">1 teaspoon vanilla extract</p>
                  <p class="single-ingredient">1 cup boiling water</p>
                </div>
                <div>
                  <h4>tools</h4>
                  <p class="single-tool">Mixing bowls</p>
                  <p class="single-tool">Whisk or hand mixer</p>
                  <p class="single-tool">8-inch round baking pans</p>
                  <p class="single-tool">Wire rack</p>
                  <p class="single-tool">Oven</p>
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