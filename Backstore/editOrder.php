<?php

include('../LoginAndRegistration/AdminAuthentication.php');

include "ordersFunctions.php";



$orderId = $_GET['Id'];

$order = getOrderById($orderId);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Food Box Grocery Store</title>
    <link rel="stylesheet" href="..\create.css" />
    <script src="../Functions.js"></script>
  </head>

  <body>
    <!-- outer division-->
    <div class="BorderDiv">
      <!-- header division-->
     
      <div class="Header">
        <div class="ShopSign" style="  background-color: #9b9b9b;">
          <p class="TShop"><a href="..\Website.html"><img class="Logo" src="../Images\Food_box_logo_white.png" alt="SIUU" height="50" /> </a></p>
      </div>
      </div>
      <!-- Navigation division to left-->
      <div class="Nav">
        <p class="navigation" >
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
                   <a href="OrderList.php" >>  Order List </a>
                    </th>
               </tr>
               <tr>
                   <th>
                  <a href="UsersList.php">>  User List</a>
                    </th>
               </tr>
               
          </table>
        </input>
      </div>
      <!-- division for main page-->
      <div class="MainPage" style=" background-color: #9b9b9b;">

            <div class="RowDescrpition" style=" flex-direction: column; ">
            
             <form class="ProductDescription" style="align-self: center;">
            
                <p>Name</p>
                <input type="text" name="Name" placeholder="Enter Name" value="<?php echo $order['Name'] ?>">
                <p>Email</p>
                <input type="email" name="Email" placeholder="Enter Email" value="<?php echo $order['Email'] ?>">
                <p>Order Number</p>
                <input type="number" name="Id" placeholder="Order Number"value="<?php echo $order['Id'] ?>">
                <p>Delivery Address</p>
                <input type="text" name="Adress" placeholder="Enter Adress"value="<?php echo $order['Adress'] ?>">
                <p>Status</p>
                <input type="text" name="Status" placeholder="Enter Status"value="<?php echo $order['Status'] ?>">
            
              
              <div class="RowDescrpitionS"  >
        
            

                <div class="imgDescription" style="max-height: none; align-self: center; width: 200%;" > 
                  <table  style="border-bottom: 3px;"cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr class="SC" id="Scs">
                        <td >Order detail</td>
                        
                      </tr>
                      
                      <?php foreach ($order['Products'] as $i =>  $product) : ?>
                      <tr>
                        <td>
                          <img class="images" src=<?php echo $product['image'] ?> ></a>
                        </td>
                        <td class="CartProd"><?php echo $product['Name'] ?></td>
                        <td>Quantity
                          <div class="Productquantity buttons_added" style="background-color: rgb(148, 202, 137);" >
                            <input id="down" type="button"  value="-" class="minus" onclick="setCartQuantity(this,'down');" onclick="">
                            <input id="amount" type="number" step="1" min="1" max="" name="quantity" value="<?php echo $product['Quantitiy'] ?>" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                            <input type="button" onclick="setCartQuantity(this,'up');" id="up" value="+" class="plus" >
                              
                          </div>
                        </td>
                          <td>
                          <a href="deleteOrderProduct.php?Id=<?php echo $order['Id'] ?>">
                            <div class="Productquantity buttons_added" style="background-color: rgb(255, 0, 0);">
                              <input type="button" name="delete" value="delete" class="minus" style="border-radius: 10px;" >
                            </div>
                            <a>
                          </td>
                          <td><div name ="cartPrice"  id="price">
                            <?php echo $product['price_each'] ?>
                          </div></td>
                         
                      
                      </tr>
                      <?php endforeach;; ?>
                    </tbody>
                  </table>
                 </div>
                
    
              <div class="ProductDescription" style="text-align: right; align-self: center; top: 0%; " > 
               
              <div class="listing_P">
                <p><span style="float: left;">Before taxes</span><span name="priceB4Taxes"> <?php echo $order['Cost'] ?></span></p>
                <p><span style="float: left;">TPS</span><span id="tps"> <?php echo $tax1 = intval( $order['Cost'])  ?></span></p>
                <p><span style="float: left;">TVQ</span><span id="tvq"><?php echo $tax2 = intval( $order['Cost']) * 0.09975 ?></span></p>
                  <p><span style="float: left;">Total Items: </span><span id="itemstotal2"> </span></p>
                
            </div>
       
              <hr style="height: 3px; width: 90%; background-color: #fff;" class="listing_P">
         
            <div class="listing_P">
              <p style="display: flex inline-block; color: red; background-color: white; border-radius: 1vw; padding: 1vw;"><span style="float: left;">Sub-total: </span> <span id="subTotal"><?php echo $order['Cost'] + $tax1 + $tax2 ?></span></p> 
            </div>
                
                
          
                  </div>
      </div>
      <div class="Productquantity buttons_added" >
      <input type="submit" value="save"  class="Backs" style="border-radius: 10px;">
    </div>
            </form>
          </div>          
      </div>
 
      
    </div>
    <div class="Footer" style="  background-color: #9b9b9b;">
      <table style="width: 100%; height:100%; vertical-align: middle;" >
        <td style="width: 50%; padding-left:1%;">
          <img class="FooterImages1" src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Food_box_logo_white.png" alt="SIUU" height="50"/>
          <img class="FooterImages2"style="padding-left: 2%" src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Dots_footer.png" alt="SIUU" height="35" />
          <img class="FooterImages3"src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Twitter_logo.png" alt="SIUU" height="35" />
          <img class="FooterImages4"style="padding-left: 2%" src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Facebook_logo.png" alt="SIUU" height="35" />
          <img class="FooterImages5"style="padding-left: 2%" src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Youtube_logo.png" alt="SIUU" height="35" />
          <a style="padding-left: 2%;" href="..\https://github.com/Holyvert/Dream_tech">
            <img class="FooterImages6"alt="GitHub" src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/github-icon.jpg" height="35" />
          </a>
        </td>
        <td style="width: 50%; text-align: right; color: #fff; padding-right: 1%;"><b>&copy; 2022 FoodBox, All rights reserved</b></td>
      </table>
    </div>
  </div>
  </body>
</html>