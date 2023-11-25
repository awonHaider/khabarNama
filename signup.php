<?php 
include('./database/db.php');

if (isset($_POST["fullname"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $fullname = $_POST["fullname"];

    // Prepare the SQL query using a prepared statement
    $sql = "INSERT INTO `user` (`user_id`, `user_fullname`, `user_email`, `user_password`) VALUES (NULL, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the statement
    $stmt->bind_param("sss", $fullname, $email, $password);

    // Execute the statement
    if ($stmt->execute()) {
        // If the query was successful, display a success message.
        $msg = "You Signed Up to the Website";
        // echo "You Signed Up to the Website";
    } else {
        // If there was an error with the query, display an error message along with the details of the error.
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection.
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/login-signup-style.css">
  <title>Sign up to KhabarNama</title>
</head>

<body>
  <div class="loginContainer">
    <div class="left">
      <div class="left-image"><img src="https://images.unsplash.com/photo-1611159063981-b8c8c4301869?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" width="100%" /></div>
    </div>

    <div class="right">
      <div class="right-outer">
        <div class="right-logo">
          <h1>KhabarNama</h1>
        </div>
        <div class="right-form">
          <form action="./signup.php" method="POST" id="signUpForm" onsubmit="validate(event);">
            <p>Sign into KhabarNama!</p>

            <label for="fullname">Full Name:</label>
            <div class="inputField">
              <input type="text" id="fullname" name="fullname" placeholder="Enter your Full Name!" />
            </div>

            <label for="email">Email:</label>
            <div class="inputField">
              <input type="email" id="email" name="email" required placeholder="Enter your Email!" />
            </div>

            <label for="password">Password:</label>
            <div class="inputField">
              <input type="password" name="password" id="password" placeholder="Enter your Password!" />
            </div>

            <?php 
            if(isset($msg)){
              echo '<p>' . $msg . '</p>';
            }
            ?>

            <div class="form-buttons">
            <button><a href="./">Back</a></button>
              <button>Sign Up</button>
              <button><a href="./login.php">Log In</a></button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="./js//signupFormValidation.js"></script>
</body>

</html>