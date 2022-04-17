<?php

include('../LoginAndRegistration/AdminAuthentication.php');

?>

<?php
if (!isset($_COOKIE['User'])) {
    setcookie('User', 'id', time() + 3600);
    session_start();
}
?>
<?php
//$get_cart_items_name = $_GET("CartProd"[0]);
$get_cart_items_quantity = (array)$_GET["quantity"];
//$get_cart_items_price = $_GET["cartPrice"];
?>
    
    <?php
    foreach ($get_cart_items_quantity as $key => $value) {
        echo "$key: $value\n";
    }
    ?>

