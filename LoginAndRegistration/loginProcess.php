<html lang="en">

<head>
    <title>Registration</title>
</head>

<body>
    <?php


    if (isset($_POST["submit"])) { // the POST form has been submitted.

        // Read from file
        $fileReader = fopen("user.txt", "r");
        $fileSize = filesize("user.txt");
        $usersFile = fread($fileReader, $fileSize);

        //user input
        $userEmail = $_POST["email"];
        $userPassword = $_POST["password"];
        $userCredentials = $userEmail . " " . $userPassword;

        if ($fileSize != 0 && str_contains($usersFile, $userCredentials)) {

            setcookie("user_email", $userEmail, time() + (86400), "/");

            // check if user is an admin
            if (str_contains($usersFile, $userCredentials . " 70ba33708cbfb103f1a8e34afef333ba7dc021022b2d9aaa583aabb8058d8d67")) {
                echo "Welcome Admin! Redirecting to the backstore page . . .";
                setcookie("isAdmin", $userEmail, time() + (86400), "/");
                header('Refresh: 2.5; URL=/php_practice/backstore.php');
            } else {
                echo "Credentials validated, welcome $userEmail";
                header('Refresh: 2.5; URL=/php_practice/Website.php');
            }
        } else {
            // Write to the file new account
            echo "Credentials invalid!";
            header('Refresh: 2.5; URL=/php_practice/registration.html');
        }
        fclose($fileReader);
    }
    ?>
</body>

</html>