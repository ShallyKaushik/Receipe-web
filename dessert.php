<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recipes || Final</title>

  <!-- normalize -->
  <link rel="stylesheet" href="normalize.css" />
  <!-- font-awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
  />
  <!-- main css -->
  <link rel="stylesheet" href="main.css" />
  <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color:
     #f4f4f9;
}

header {
    text-align: center;
    padding: 20px;
    color: #333;
}
h1 {
    font-size: 28px; /* Adjusted to make it not too large */
    margin: 0;
}

.recipe-section {
    padding: 20px;
    max-width: 1200px;
    margin: auto;
}

.recipe {
    background-color: #fff;
    margin-bottom: 20px;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
.recipe h2 {
    color: #333;
    font-size: 24px; /* Adjusted for recipe title size */
}

.recipe p {
    color: #666;
    font-size: 18px; /* Slightly larger font size for description */
}

.recipe img {
    width: 200px; /* Set the image size to be small */
    height: auto;
    border-radius: 8px;
    display: block;
    margin: 0 auto 10px auto; /* Centers the image */
}

.recipe-description {
    margin-top: 10px;
}

  </style>
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

  <header>
    <h1>Kitchen Dairy - Recipes</h1>
</header>

<div class="recipe-section">
  <a href="single-recipe5.php">
    <div class="recipe">
        <h2>Gulab Jamun</h2>
        <img src="Assets/gulab.webp" alt="Gulab Jamun">
        <p class="recipe-description">Gulab Jamun is a rich, indulgent Indian dessert made from fried dough balls soaked in fragrant sugar syrup, perfect for any celebration!</p>
    </div>
  </a>

<a href="single-recipe12.php">
    <div class="recipe">
        <h2>Mango Shake</h2>
        <img src="Assets/mango.webp" alt="Mango Shake">
        <p class="recipe-description">A refreshing and creamy mango shake, perfect for summer days. Made with ripe mangoes, milk, and sugar, it's a delightful treat.</p>
    </div>
</a>
<a href="single-recipe13.php">
    <div class="recipe">
        <h2>Chocolate Cake</h2>
        <img src="Assets/cake.webp" alt="Cake">
        <p class="recipe-description"> A moist, rich, and decadent chocolate cake perfect for any celebration. Enjoy this delightful dessert with your favorite frosting or toppings!</p>
    </div>
</a>

</div>
<footer class="page-footer">
  <p>
    &copy; <span id="date"></span>
    <span class="footer-logo">Kitchen Diary</span> 
  </p>
</footer>

</body>
</html>