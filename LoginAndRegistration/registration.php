<html lang="en">

<head>
  <title>Registration</title>
</head>

<body>
  <?php

  if (isset($_POST["submit"])) { // the POST form has been submitted.

    // Read from file
    $fileReader = fopen("user.txt", "r");
    $userEmail = $_POST["email"];
    $fileSize = filesize("user.txt");

    if ($fileSize != 0 && str_contains(fread($fileReader, $fileSize), $userEmail)) {
      echo "Email already exists.";
      header('Refresh: 2.5; URL=/php_practice/registration.html');
    } else {

      // Write to the file new account
      $userEmail = $_POST["userEmail"];
      $password = $_POST["password"];
      $fileUpdater = fopen('user.txt', 'a+');
      fwrite($fileUpdater, $userEmail . " " . $password . "\n");
      fclose($fileUpdater);
      echo "Account Created Successfully!";
      header('Refresh: 2.5; URL=/php_practice/loginUser.php');
    }
    fclose($fileReader);
  }
  ?>
</body>

</html>