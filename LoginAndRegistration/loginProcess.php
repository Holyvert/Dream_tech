<html lang="en">

<head>
    <title>Processing...</title>
</head>

<body>
    <?php
    error_reporting(E_ALL ^ E_WARNING); 

    if (isset($_POST["submit"])) { // the POST form has been submitted.

        // Read from file
        $fileReader = fopen("user.txt", "r");
        $fileSize = filesize("user.txt");
        $usersFile = fread($fileReader, $fileSize);

        //user input
        $userEmail = $_POST["email"];
        $userPassword = $_POST["password"];
        $userCredentials = $userEmail . " " . $userPassword;

        if ($fileSize != 0 && strpos($usersFile, $userCredentials)!==false) {

            setcookie("user_email", $userEmail, time() + (86400), "/");

            // check if user is an admin
            if (strpos($usersFile, $userCredentials . " 70ba33708cbfb103f1a8e34afef333ba7dc021022b2d9aaa583aabb8058d8d67")!==false) {
                echo "Welcome Admin! Redirecting to the backstore page . . .";
                setcookie("isAdmin", $userEmail, time() + (86400), "/");
                echo ("<script>setTimeout(function () {location.href = '../Backstore/ProductsList.php';}, 2500);</script>");
                header('Refresh: 2.5; URL=../Backstore/ProductsList.php');
            } else {
                echo "Credentials validated, welcome $userEmail";
                echo ("<script>setTimeout(function () {location.href = '../Website.php';}, 2500);</script>");
                // header('Refresh: 2.5; URL=../Website.php');
            }
        } else {
            // Write to the file new account || NON EXISTING USER
            echo "Credentials invalid!";
            echo ("<script>setTimeout(function () {location.href = './registration.html';}, 2500);</script>");
            // header('Refresh: 2.5; URL=registration.html');
        }
        fclose($fileReader);
    }
    ?>
</body>

</html>