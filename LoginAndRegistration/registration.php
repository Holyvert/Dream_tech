<html lang="en">

<head>
  <title>Registration</title>
</head>

<body>
  <?php

  include "../Backstore/usersFunctions.php";

  $users = getUsers2();

  error_reporting(E_ALL ^ E_WARNING);


  if (isset($_POST["submit"])) { // the POST form has been submitted.





    foreach ($users as $i => $user) {
      if (strcmp($user['Email'], $_POST['email'])  == 0) {
        echo "Email already exists";

        echo ("<script> location.href = 'loginUser.php'</script>");
        break;
      }
    }
    createUser2($_POST);
    echo ("<script> location.href = 'loginUser.php'</script>");
  }
  ?>
</body>

</html>