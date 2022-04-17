<?php

// If the admin-cookie is set, redirect the admin to backstore.

if (!isset($_COOKIE["isAdmin"]) && !isset($_COOKIE["user_email"])) {
    echo "Access Denied, redirecting to login page. . .";
    header('Refresh: 5; URL=/php_practice/login.html');
}

?>