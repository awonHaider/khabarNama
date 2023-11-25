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
          <form action="" method="POST" id="signUpForm" onsubmit="validate(event);">
            <p>Sign into KhabarNama!</p>

            <label for="fullname">Full Name:</label>
            <div class="inputField">
              <input type="text" id="fullname" name="fullname" required placeholder="Enter your Full Name!" />
            </div>

            <label for="email">Email:</label>
            <div class="inputField">
              <input type="email" id="email" name="email" required placeholder="Enter your Email!" />
            </div>

            <label for="password">Password:</label>
            <div class="inputField">
              <input type="password" name="password" id="password" placeholder="Enter your Password!" />
            </div>

            <div class="form-buttons">
              <button>Log in</button>
              <button type="submit">Sign up</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>