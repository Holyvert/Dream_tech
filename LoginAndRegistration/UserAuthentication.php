
<?php

// If the cookie is not set, redirect the user to login page.

/*if (!isset($_COOKIE["user_email"])) {
    echo "A sign-in is needed. Redirecting to login page . . .";
    echo ("<script>setTimeout(function () {location.href = 'LoginAndRegistration/loginUser.php';}, 2500);</script>");
}
*/
if (!isset($_COOKIE["user_email"])) {
    echo "A sign-in is needed. Redirecting to login page . . .";
    echo ("<script>location.href = 'LoginAndRegistration/loginUser.php';</script>");
}
?>