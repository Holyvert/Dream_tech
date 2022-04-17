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
        $userCredentials = $userEmail . " " . $userPassword . " ";

        if ($fileSize != 0 && strpos($usersFile, $userCredentials) !== false) {
            // check if user is an admin
            if (strpos($usersFile, $userEmail . " " . $userPassword . " 70ba33708cbfb103f1a8e34afef333ba7dc021022b2d9aaa583aabb8058d8d67") !== false) {

                echo "Welcome Admin! Redirecting to the backstore page . . .";
                /*set cookies using JS b/c using PHP cause error on the ENCS server (i.e., can't modify http header)*/
                // setcookie("user_email", $userEmail, time() + (86400), "../Website.php");
                //redirect using JS    
                echo '<script>
                    const d = new Date();
                    d.setTime(d.getTime() + (1*24*60*60*1000));
                    let expires = "expires="+ d.toUTCString();
                    document.cookie = "user_email" + "=" + "' . $userEmail . '" + ";" + expires + ";path=/";';
                echo 'document.cookie = "is_admin" + "=" + "' . $userEmail . '" + ";" + expires + ";path=/";';
                echo ("setTimeout(function () {location.href = '../Backstore/ProductsList.php';}, 2500);</script>");
            } else {
                echo "Credentials validated, welcome $userEmail";
                //set cookie for valid user
                echo '<script>
                    const d = new Date();
                    d.setTime(d.getTime() + (1*24*60*60*1000));
                    let expires = "expires="+ d.toUTCString();
                    document.cookie = "user_email" + "=" + "' . $userEmail . '" + ";" + expires + ";path=/";';
                //redirect using JS
                echo ("setTimeout(function () {location.href = '../Website.php';}, 2500);</script>");
            }
        } else {
            // Write to the file new account || NON EXISTING USER
            echo "Credentials invalid!";
            // Redirect using JS
            echo ("<script>setTimeout(function () {location.href = './registration.html';}, 2500);</script>");
            // header('Refresh: 2.5; URL=registration.html');
        }
        fclose($fileReader);
    }
    ?>
</body>

</html>