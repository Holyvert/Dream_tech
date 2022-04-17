<?php
// If the admin-cookie is set, redirect the admin to backstore.

/*if (!isset($_COOKIE["is_admin"]) || !isset($_COOKIE["user_email"])) {
    echo "Access Denied, redirecting to login page. . .";
    echo ("<script>setTimeout(function () {location.href = '../LoginAndRegistration/loginUser.php';}, 2500);</script>");
}
*/
if (!isset($_COOKIE["is_admin"]) || !isset($_COOKIE["user_email"])) {
    echo "Access Denied, redirecting to login page. . .";
    echo ("<script>location.href = '../LoginAndRegistration/loginUser.php'</script>");
}

?>