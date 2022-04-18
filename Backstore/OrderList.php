<?php

include('../LoginAndRegistration/AdminAuthentication.php');

include "ordersFunctions.php";

$orders = getOrders();
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
                   <a href="OrderList.php" ><span style="background-color: blue; color: white; border-radius: 2vw;">> </span>   Order List </a>
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


          <div class="RowDescrpitionS" style="width: 100%; left: 0%; right: 0%;"  >
        
            

              <div class="imgDescription" style="max-height: none; align-self: center; " > 
                <table  style="border-bottom: 3px;"cellpadding="0" cellspacing="0">
                 
                  <tbody>
                    <tr class="SCs">
                        <td>Name &nbsp; </td>
                        <td>Order number &nbsp; </td>
                        <td>Address &nbsp; </td>
                        <td>Total Price &nbsp; </td>
                        <td>Status&nbsp;  </td>
                        <td></td>
                        <td style="visibility: visible;">
                            <div class="Productquantity buttons_added" style=" background-color: rgb(0, 217, 255);">
                            <input name="Add" type="button" value="Add" class="Backs" style="border-radius: 10px;" >
                        </div></td>
                    </tr>
                   
                    <tr>
                    <?php foreach ($orders as $order) : ?>
                        <td class="CartProd Backs" ><div class="PhonePB"> Name:</div> <?php echo $order['Name'] ?></td>
                        <td class="CartProd Backs" ><div class="PhonePB">Order Number:</div> 
                        <?php echo $order['Id'] ?>
                        </td>
                          <td class="CartProd Backs" ><div class="PhonePB">Adress:</div> 
                          <?php echo $order['Adress'] ?>
                          </td>
                        <td class="CartProd Backs" ><div class="PhonePB">Total Price:</div> 
                            <div name ="cartPrice" id="price"><?php echo $order['Cost'] ?></div></td>
                            
                            <td class="CartProd Backs" ><div class="PhonePB">Status:</div> 
                            <div name ="cartPrice" id="price"><?php echo $order['Status'] ?></div></td>
                       
                        <td>  
                        <a href="editOrder.php?Id=<?php echo $order['Id'] ?>">
                          <div class="Productquantity buttons_added" style=" background-color: rgb(157, 255, 0);">
                            <input name="Edit" type="button" value="Edit" class="Backs" style="border-radius: 10px;" >
                            </div>
                            </a>
                        </td>
                        
                        <td>  
                          <a href="deleteOrder.php?Id=<?php echo $order['Id'] ?>">
                           <div class="Productquantity buttons_added" style=" background-color: rgb(255, 0, 0);">
                            <input name="delete" type="button" value="delete" class="Backs" style="border-radius: 10px;" >
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
