<html lang="en">

<head>
  <title>Registration</title>
</head>

<body>
  <?php

  error_reporting(E_ALL ^ E_WARNING);


  if (isset($_POST["submit"])) { // the POST form has been submitted.

    // Read from file
    $fileReader = fopen("user.txt", "a+");
    $userEmail = $_POST["email"];
    $fileSize = filesize("user.txt");

    if ($fileSize != 0 && strpos(fread($fileReader, $fileSize), $userEmail) !== false) {
      echo "Email already exists.";
      echo ("<script>setTimeout(function () {location.href = 'loginUser.php';}, 2500);</script>");
    } else {

      // Write to the file new account
      $userEmail = $_POST["email"];
      $password = $_POST["password"];
      $fileUpdater = fopen('user.txt', 'r');
      fwrite($fileUpdater, $userEmail . " " . $password . " \n");
      fclose($fileUpdater);
      echo "Account Created Successfully!";
      echo ("<script>setTimeout(function () {location.href = '../Website.php';}, 2500);</script>");
    }
    fclose($fileReader);
  }
  ?>
</body>

</html>