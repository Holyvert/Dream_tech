
<?php

// If the cookie is not set, redirect the user to login page.

if (!isset($_COOKIE["user_email"])) {
    echo "A sign-in is needed. Redirecting to login page . . .";
    header('Refresh: 5; URL=/php_practice/loginUser.php');
}

?>