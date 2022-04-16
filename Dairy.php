<?php


require "Backstore/productsFunctions.php";


$products = getProducts2();



?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Food Box Grocery Store</title>
    <link rel="stylesheet" href="create.css" />
  </head>

  <body>
    <!-- outer division-->
    <div class="BorderDiv">
      <!-- header division-->

      <?php include "header.php" ?>
      <!-- Navigation division to left-->
      <?php include "navBar.php" ?>
      <!-- division for main page-->
      <div class="MainPage">
        <h2 class="RTS">Dairy</h2>
            <div class="MainDiv">
              <select class="language" name="language">
                <option value="EN"> English</option>
                <option value="FR"> French</option>
              </select>
              <!-- <div class="RTS">Ready to Shop </div> -->
              <div class="icons">
                
              <table class="Cart">
                <tr>
                  <!-- column -->
                    <th><a href="ShoppingCart.php">&#128722</a></th>
                </tr>
              </table>
            </div>
          </div>

          <div class="Oleft one " >

          <?php foreach($products as $product): ?>
            <?php if( $product['Ailse']=="Dairy"): ?>  
          <a href="<?php echo str_replace(' ', '', $product['Ailse']) ?>\<?php echo str_replace(' ', '', $product['Name']) ?>.php">
              <div class="img" style="background-image: url(<?php echo $product['image']?>);">
               
                   <div class="title1"> 
                    <h4><?php echo $product['Name']?></h4>
            <p><?php echo $product['price_each']?></p></div>
              </div>
            </a>
            <?php endif ;; ?>
            <?php endforeach ;; ?>
      </div>
      </div>
      
     <div class="Footer">
        <table style="width: 100%; height:100%; vertical-align: middle;" >
          <td style="width: 50%; padding-left:1%;">
            <img class="FooterImages1"src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Food_box_logo_white.png" alt="SIUU" height="50"/>
            <img class="FooterImages2"style="padding-left: 2%" src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Dots_footer.png" alt="SIUU" height="35" />
            <img class="FooterImages3"src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Twitter_logo.png" alt="SIUU" height="35" />
            <img class="FooterImages4" style="padding-left: 2%" src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Facebook_logo.png" alt="SIUU" height="35" />
            <img class="FooterImages5"style="padding-left: 2%" src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Youtube_logo.png" alt="SIUU" height="35" />
            <a style="padding-left: 2%;" href="https://github.com/Holyvert/Dream_tech">
              <img class="FooterImages6"alt="GitHub" src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/github-icon.jpg" height="35" />
            </a>
          </td>
          <td style="width: 50%; text-align: right; color: #fff; padding-right: 1%;"><b>&copy; 2022 FoodBox, All rights reserved</b></td>
        </table>
      </div>
    </div>
  </body>
</html>
