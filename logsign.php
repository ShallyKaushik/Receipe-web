<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "kitchen_diary");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to display alert messages
function showAlert($message, $type = "danger") {
    echo "<div class='alert alert-$type'>$message</div>";
}

// Signup logic
if (isset($_POST['signup'])) {
    $username = $_POST['username'] ?? null;
    $phone_number = $_POST['phone_number'] ?? null;
    $password = $_POST['password'] ?? null;

    if (!$username || !$phone_number || !$password) {
        showAlert("All fields are required!");
    } else {
        $password_hashed = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (username, phone_number, password) VALUES ('$username', '$phone_number', '$password_hashed')";
        if ($conn->query($sql)) {
            showAlert("Sign-up successful!", "success");
        } else {
            showAlert("Error: " . $conn->error);
        }
    }
}

// Login logic
if (isset($_POST['login'])) {
    $phone_number = $_POST['phone_number'] ?? null;
    $password = $_POST['password'] ?? null;

    if (!$phone_number || !$password) {
        showAlert("Phone number and password are required!");
    } else {
        $sql = "SELECT user_id, username, password FROM users WHERE phone_number = '$phone_number'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];
            $username = $row['username'];
            $user_id = $row['user_id'];

            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                showAlert("Login successful! Welcome, $username.", "success");

                $log_sql = "INSERT INTO login_activity (user_id, status) VALUES ('$user_id', 'success')";
                $conn->query($log_sql);
            } else {
                showAlert("Invalid phone number or password.");
            }
        } else {
            showAlert("Invalid phone number or password.");
        }
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Sign Up</title>
    <!-- normalize -->
    <link rel="stylesheet" href="normalize.css" />
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <!-- main css -->
    <link rel="stylesheet" href="main.css" />
    <script>
        // JavaScript Validation Function
    function validateForm(form) {
        const formType = form.name; // Check whether it's 'signup' or 'login'
        const phoneNumber = form.querySelector("#phone_number").value;
        const password = form.querySelector("#password").value;

        if (formType === "signup") {
            const username = form.querySelector("#username").value;
            if (!username) {
                alert("Username is required.");
                return false;
            }
        }

        if (!phoneNumber || !password) {
            alert("Phone number and password are required.");
            return false;
        }

        if (phoneNumber.length !== 10 || isNaN(phoneNumber)) {
            alert("Phone number must be a 10-digit number.");
            return false;
        }

        return true;
    }
</script>

    </script>
</head>
<body>
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
                </div>
            </div>
        </div>
    </nav>
    <!-- end of nav -->
    <center>
    <div class="container">
        <div class="form-title">
            <h2>Welcome to Kitchen Diary</h2>
            <p>Sign up or Log in to continue</p>
        </div>
      <!-- Sign-up Form -->
       <h3>Sign Up</h3>
<form method="POST" action="logsign.php" name="signup" onsubmit="return validateForm(this)">
    <div class="form-group">
        <label for="username">&nbsp;&nbsp;&nbsp;&nbsp;Username&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="phone_number">Phone Number</label>
        <input type="text" class="form-control" id="phone_number" name="phone_number" required>
    </div>
    <div class="form-group">
        <label for="password">&nbsp;&nbsp;&nbsp;&nbsp;Password&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" name="signup" class="btn btn-custom">Sign Up</button>
</form>

<hr>

<!-- Login Form -->
 <h3>Login</h3>
<form method="POST" action="logsign.php" name="login" onsubmit="return validateForm(this)">
    <div class="form-group">
        <label for="phone_number">Phone Number</label>
        <input type="text" class="form-control" id="phone_number" name="phone_number" required>
    </div>
    <div class="form-group">
        <label for="password">&nbsp;&nbsp;&nbsp;&nbsp;Password&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" name="login" class="btn btn-custom">Login</button>
</form>

    </div>
    </center>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
