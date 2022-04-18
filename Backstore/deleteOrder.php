<?php

include('../LoginAndRegistration/AdminAuthentication.php');


require "ordersFunctions.php";

$orderId = $_GET['Id'];

deleteOrder($orderId);

header("Location: OrderList.php");
?>