<?php

include('../LoginAndRegistration/AdminAuthentication.php');


require "productsFunctions.php";

$productId = $_GET['Id'];

$product = getProductById($productId);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  editProduct($_POST, $productId);
  header("Location: ProductsList.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Food Box Grocery Store</title>
  <link rel="stylesheet" href="..\create.css" />

</head>

<body>
  <!-- outer division-->
  <div class="BorderDiv">
    <!-- header division-->

    <div class="Header">
      <div class="ShopSign" style="  background-color: #9b9b9b;">
        <p class="TShop"><a href="..\Website.php"><img class="Logo" src="../Images\Food_box_logo_white.png" alt="SIUU" height="50" /> </a></p>
      </div>
    </div>
    <!-- Navigation division to left-->
    <div class="Nav">
      <p class="navigation">
        <label for="touch">Back Store</label> <br />
        &#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;
      </p>
      <input type="checkbox" id="touch">
      <table class="NavBar">
        <tr>
          <th>
            <a href="ProductsList.php">> Product List </a>
          </th>
        </tr>
        <tr>
          <th>
            <a href="OrderList.php">> Order List </a>
          </th>
        </tr>
        <tr>
          <th>
            <a href="UsersList.php">> User List</a>
          </th>
        </tr>

      </table>
      </input>
    </div>
    <!-- division for main page-->
    <div class="MainPage" style=" background-color: #9b9b9b;">

      <div class="RowDescrpition">


        <form class="ProductDescription" method="post" action="">
          <input type="hidden" name="Id" value="<?php echo $product['Id'] ?>">
          <p>Company name</p>
          <input type="text" name="company" placeholder="Enter Company Name" value="<?php echo $product['company'] ?>">
          <p>Product name</p>
          <input type="text" name="porduct_name" placeholder="Enter Product Name" value="<?php echo $product['Name'] ?>">
          <p>Product size</p>
          <input type="text" name="s_perU" placeholder="Product size per unit" value="<?php echo $product['Quantity'] ?>">
          <p>Product Price</p>
          <input type="text" name="price_each" placeholder="Price per unit" value="<?php echo $product['price_each'] ?>">
          <input type="text" name="price_perQ" placeholder=" Price per smallest unit" value="<?php echo $product['price_perQ'] ?>">
          <p>Product Description</p>
          <textarea name="More_Description" style="width:60vw; height:20vw; align-self: center;" placeholder="Enter Description">
                    <?php echo $product['More_Description'] ?>
                </textarea><br>
          <p>Product Category</p>
          <select name="Category">
            <option <?php categoryFv($product['Ailse']) ?>>Fruits and Vegetables</option>
            <option <?php categoryBeverages($product['Ailse']) ?>>Beverages</option>
            <option <?php categoryMeatAndFish($product['Ailse']) ?>>MeatAndFish</option>
            <option <?php categorySnacks($product['Ailse']) ?>>Snacks</option>
            <option <?php categoryDairy($product['Ailse']) ?>>Dairy</option>
            <option <?php categoryFc($product['Ailse']) ?>>Frozen and Canned</option>
          </select>
          <p>Quantity in Stock</p>
          <input type="text" name="Quantity" placeholder="Enter Quantity" value="<?php echo $product['Quantity_inStock'] ?>">
          <p>Product Image</p>
          <input type="text" name="images" placeholder="Image url" value="<?php echo $product['image'] ?>">
          <p>OR</p>
          <input type="file" accept="image/*" />

          <p>Description Color</p>
          <input type="color" name="color" placeholder="Enter rgb values" style="align-self: center;" value="<?php echo $product['color'] ?>">

          <div class="Productquantity buttons_added">
            <a href="ProductsList.php">
              <input type="submit" value="save" class="Backs" style="border-radius: 10px;" id="myButton" />
            </a>

          </div>

        </form>
      </div>
    </div>


  </div>
  <div class="Footer" style="  background-color: #9b9b9b;">
    <table style="width: 100%; height:100%; vertical-align: middle;">
      <td style="width: 50%; padding-left:1%;">
        <img class="FooterImages1" src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Food_box_logo_white.png" alt="SIUU" height="50" />
        <img class="FooterImages2" style="padding-left: 2%" src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Dots_footer.png" alt="SIUU" height="35" />
        <img class="FooterImages3" src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Twitter_logo.png" alt="SIUU" height="35" />
        <img class="FooterImages4" style="padding-left: 2%" src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Facebook_logo.png" alt="SIUU" height="35" />
        <img class="FooterImages5" style="padding-left: 2%" src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Youtube_logo.png" alt="SIUU" height="35" />
        <a style="padding-left: 2%;" href="..\https://github.com/Holyvert/Dream_tech">
          <img class="FooterImages6" alt="GitHub" src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/github-icon.jpg" height="35" />
        </a>
      </td>
      <td style="width: 50%; text-align: right; color: #fff; padding-right: 1%;"><b>&copy; 2022 FoodBox, All rights reserved</b></td>
    </table>
  </div>
  </div>
</body>

</html>