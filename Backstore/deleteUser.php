<?php

include('../LoginAndRegistration/AdminAuthentication.php');

?>

<?php
require "usersFunctions.php";

$userId = $_GET['Id'];

deleteUser($userId);

header("Location: UsersList.php");
?>