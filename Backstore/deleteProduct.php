<?php

include('../LoginAndRegistration/AdminAuthentication.php');

?>


<?php
require "productsFunctions.php";

$productId = $_GET['Id'];

deleteProduct($productId);

header("Location: ProductsList.php");
?>