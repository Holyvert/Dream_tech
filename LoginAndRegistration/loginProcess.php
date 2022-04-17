<html lang="en">

<head>
    <title>Processing...</title>
</head>

<body>
    <?php

    include "../Backstore/usersFunctions.php";

    $users = getUsers2();



    if (isset($_POST["submit"])) { // the POST form has been submitted.


        //user input
        $userEmail = $_POST["email"];
        $userPassword = $_POST["password"];
        $userCredentials = $userEmail . " " . $userPassword . " ";

        foreach ($users as $i => $user) {
            if (strcmp($user['Email'], $userEmail)  == 0) {
                if (strcmp($user['Password'], $userPassword)  == 0) {
                    if (strcmp($user['Admin_Status'], "Admin")  == 0) {
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
                        echo ("location.href = '../Backstore/ProductsList.php';</script>");
                        return 0;
                    } else {
                        echo "Credentials validated, welcome $userEmail";
                        //set cookie for valid user
                        echo '<script>
                            const d = new Date();
                            d.setTime(d.getTime() + (1*24*60*60*1000));
                            let expires = "expires="+ d.toUTCString();
                            document.cookie = "user_email" + "=" + "' . $userEmail . '" + ";" + expires + ";path=/";';
                        //redirect using JS
                        echo ("location.href = '../Website.php';</script>");
                        return 0;
                    }
                }
            }
        }
        // Write to the file new account || NON EXISTING USER
        echo "Credentials invalid!";
        // Redirect using JS
        echo ("<script>setTimeout(function () {location.href = './registration.html';}, 500);</script>");
        // header('Refresh: 2.5; URL=registration.html');


    }

    ?>
</body>

</html>