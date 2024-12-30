<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Limbah Exchange-Login</title>
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container" id="container">

    <div class="form-container register-container">
      <form action="index.php" method="post" autocomplete="off">
        <h1>Register here</h1>
        
        <label for="Name">Name</label>
        <input type="text" name="Name" required>

        <label for="email">Email</label>
        <input type="text" name="email" required>

        <label for="password">Password</label>
        <input type="password" name="password" required>

        <button type="submit" name="submit">Submit</button>
        <span>or signup with other account</span>
        <div class="social-container">
          <a href="#" class="social"><i class="lni lni-twitter-original"></i></a>
          <a href="#" class="social"><i class="lni lni-google"></i></a>
          <a href="#" class="social"><i class="lni lni-linkedin-original"></i></a>
        </div>
      </form>
    </div>

    <div class="form-container login-container">
      <form action="validate.php" method="post">
        <h1>Welcome Back</h1>
       
        <label for="Name">Name</label>
        <input type="text" name="Name" placeholder="Name" required>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" required>
        <div class="content">
          <div class="checkbox">
            <input type="checkbox" name="checkbox" id="checkbox">
            <label>Remember me</label>
          </div>
          <div class="pass-link">
            <a href="#">Forgot password?</a>
          </div>
        </div>
        <button type="submit" name="submit">Login</button>
        <span>or use other account</span>
        <div class="social-container">
          <a href="#" class="social"><i class="lni lni-twitter-original"></i></a>
          <a href="#" class="social"><i class="lni lni-google"></i></a>
          <a href="#" class="social"><i class="lni lni-meta"></i></a>
        </div>
      </form>
    </div>

    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1 class="title">Hello <br> Heroes</h1>
          <p>if You have an account, login here to continue your journey </p>
          <button class="ghost" id="login">Login
            <i class="lni lni-arrow-left login"></i>
          </button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1 class="title">Start become<br>our hero</h1>
          <p>if you don't have an account, join us and become one of the earth heroes.</p>
          <button class="ghost" id="register">Register
            <i class="lni lni-arrow-right register"></i>
          </button>
        </div>
      </div>
    </div>

  </div>

  <script src="script.js"></script>

</body>
</html>
