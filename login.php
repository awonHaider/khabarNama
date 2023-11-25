<?php
// Include the 'db.php' file to establish a database connection.
include('./database/db.php');
if (isset($_POST["email"]) && isset($_POST["password"])) {


  $email = $_POST["email"];
  $password = $_POST["password"];



  // Define the SQL query to select data from the 'user' table.
  $sql = "SELECT `user_email`, `user_password` FROM `user` WHERE `user_email` = '" . $email . "' AND `user_password` = '" . $password . "'";
  // Execute the SQL query and store the result in the variable $result.
  $result = $conn->query($sql);

  // Check if there are rows returned from the query.
  if ($result->num_rows > 0) {

    session_start();

    $_SESSION["email"] = $email;

    header("Location: index.php");
  } else {
    // If there are no results, display a message indicating that.
    $msg = "Incorrect Email or Password";
    // echo "Incorrect Email or Password";
  }

  // Close the database connection.
  $conn->close();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/login-signup-style.css">
  <title>Log Into KhabarNama</title>
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

          <form action="./login.php" method="POST" id="signUpForm" onsubmit="validate(event);">
            <p>Log into KhabarNama!</p>

            <label for="email">Email:</label>
            <div class="inputField">
              <input type="email" id="email" name="email" required placeholder="Enter your Email!" />
            </div>

            <label for="password">Password:</label>
            <div class="inputField">
              <input type="password" name="password" id="password" placeholder="Enter your Password!" />
            </div>
            <?php
            if (isset($msg)) {
              echo '<p>' . $msg . '</p>';
            }
            ?>
            <div class="form-buttons">
              <button><a href="./">Back</a></button>
              <button>Log in</button>
              <button><a href="./signup.php">Sign Up</a></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="./js//loginFormValidation.js"></script>
</body>

</html>