<?php
if (isset($_COOKIE['user_email'])) {
    unset($_COOKIE['user_email']);
    setcookie('user_email', '', time() - 3600, '/'); // empty value and old timestamp
}
?>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="Style.css" />
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <div class="container">
    <div class="cover">
      <div class="front">
        <img src="https://images.unsplash.com/photo-1607349913338-fca6f7fc42d0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80" alt="Sorry, photo has been taken down." />
        <div class="text">
          <span class="text-1">
            Our customers are<br />
            always served fresh</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
    </div>
    <div class="forms">
      <div class="form-content">
        <!-- Login Form -->
        <div class="login-form">
          <div class="title">Login</div>
          <form action="loginProcess.php" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" value="" autocomplete="on" required placeholder="Enter your email" />
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" value="" autocomplete="off" title="Must Contain at least 4+ Characters" minlength="4" placeholder="Enter your password" required />
              </div>
              <p>enter at least 4 characters.</p>
              <div class="button input-box">
                <input type="submit" value="submit" name="submit" />
              </div>
              <div class="text sign-up-text">
                No account? <a href="registration.html">Create one!</a>
              </div>
              <div>Return to <a href="../Website.php">homepage</a></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>