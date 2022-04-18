<?php

include('../LoginAndRegistration/AdminAuthentication.php');


include "productsFunctions.php";

$products = getProducts();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Food Box Grocery Store</title>
  <link rel="stylesheet" href="..\create.css" />
  <script src="backstoreFunctions.js"></script>


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
            <a href="ProductsList.php"><span style="background-color: blue; color: white; border-radius: 2vw;">> </span> Product List </a>
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


      <div class="RowDescrpitionS" style="width: 100%; left: 0%; right: 0%;">



        <div class="imgDescription" style="max-height: none; align-self: center;">
          <table style="border-bottom: 3px;" cellpadding="0" cellspacing="0">

            <tbody id="tableMania">
              <tr class="SCs">
                <td>Picture</td>
                <td>Product Name</td>
                <td>Company Name</td>
                <td>Quantity in stock</td>
                <td>Price</td>
                <td></td>
                <td style="visibility: visible;">
                  <a href="addProduct.php">
                    <div class="Productquantity buttons_added" style=" background-color: rgb(0, 217, 255);">
                      <input name="Add" type="button" value="Add" class="Backs" style="border-radius: 10px;" onclick="addButton()">
                    </div>
                  </a>
                </td>
              </tr>
              <?php foreach ($products as $product) : ?>
                <tr>
                  <td>
                    <img class="imagesp" src=<?php echo $product['image'] ?>></a>
                  </td>
                  <td class="CartProd Backs">
                    <div class="PhonePB">Product Name: </div> <?php echo $product['Name'] ?>
                  </td>
                  <td class="CartProd Backs">
                    <div class="PhonePB">Company Name:</div> <?php echo $product['company'] ?>
                  </td>
                  <td class="CartProd Backs">
                    <div class="PhonePB"> Quantity in Stock:</div> <?php echo $product['Quantity_inStock'] ?>
                  </td>
                  <td class="CartProd Backs">
                    <div class="PhonePB"> Price:</div>
                    <div name="cartPrice" id="price"><?php echo $product['price_each'] ?>
                  </td>

                  <td>
                    <a href="editProduct.php?Id=<?php echo $product['Id'] ?>">
                      <div class="Productquantity buttons_added" style=" background-color: rgb(157, 255, 0);">
                        <input name="Edit" type="button" id="btn" value="Edit" class="Backs" style="border-radius: 10px;">
                      </div>
                    </a>
                  </td>
                  <td>
                    <a href="deleteProduct.php?Id=<?php echo $product['Id'] ?>">
                      <div class="Productquantity buttons_added" style=" background-color: rgb(255, 0, 0);">
                        <input name="delete" type="button" value="delete" class="Backs" style="border-radius: 10px;">
                      </div>
                    </a>
                  </td>
                </tr>

              <?php endforeach;; ?>
            </tbody>
          </table>
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