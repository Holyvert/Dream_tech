<?php 

include('LoginAndRegistration/UserAuthentication.php');

?>


<html lang="en">
  <head>
      
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Food Box Grocery Store</title>
    <link rel="stylesheet" href="create.css" />
    
    
      
  </head>

  <body>
      <!-- <form action="backstoreorderlist.php" method="get"> -->
    <!-- outer division-->
    <div class="BorderDiv">
      <!-- header division-->
     
      <?php include "header.php" ?>
      <!-- Navigation division to left-->
      <?php include "navBar.php" ?>
      <!-- division for main page-->
      <div class="MainPage">
       
          <div class="MainDiv">
                <select class="language" name="language">
                    <option value="EN"> English</option>
                    <option value="FR"> French</option>
                </select>
             
              <div class="icons"> 
            <table class="Heart">
            <tr>
              <!-- rows of the tables -->
              <th>&#10084</th>
            </tr>
          </table>
             <table class="Cart">
            <tr>
              <!-- column -->
                <th> <span  id="itemstotal"> </span></th>
              <th ><a href="ShoppingCart.html">&#128722</a> <span class="subTotal2" >$0.00</span></th>
              
            
        
            </tr>
          </table>
              </div>
          </div>
  
          <div class="RowDescrpitionS"  >
        
            

              <div  class="imgDescription" style="max-height: none; align-self: center;"> 
                <table  style="border-bottom: 3px;"cellpadding="0" cellspacing="0">
                  <tbody class= "add" >
                    <tr class="SC" id="Scs">
                      <td >Shopping cart</td>
                      
                    </tr>
                    <!--<tr>
                      <td>
                        <img class="images" src="https://images.unsplash.com/photo-1617102738820-bee2545405fd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80"></a>
                      </td>
                      <td class="CartProd">Unsalted Chips</td>
                      <td >Quantity
                          <div class="Productquantity buttons_added" style="background-color: rgb(148, 202, 137);" >
                            <input id="down" type="button"  value="-" class="minus" onclick="setCartQuantity(this,'down');"><input 
                            id="amount" type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input 
                             type="button" onclick="setCartQuantity(this,'up');" id="up" value="+" class="plus" >
                              
                          </div>
                      </td>
                        <td>
                          <div class="Productquantity buttons_added" style="background-color: rgb(255, 0, 0);">
                            <input name="delete" type="button" value="delete" class="minus" style="border-radius: 10px;" >
                          </div>
                        </td>
                      <td><div name ="cartPrice" id="price">4.99$</div></td>
                
                      
                    </tr>-->
                   <!-- <tr>
                      <td>
                        <img class="images" src="https://images.unsplash.com/photo-1573555657105-47a0bb37c3ea?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=986&q=80" ></a>
                      </td>
                      <td class="CartProd">Cashews</td>
                      <td >Quantity
                        <div class="Productquantity buttons_added" style="background-color: rgb(148, 202, 137);" >
                          <input id="down" type="button"  value="-" class="minus" onclick="setCartQuantity(this,'down');"  ><input
                           id="amount" type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input
                            type="button" onclick="setCartQuantity(this,'up');"  id="up" value="+" class="plus" >
                            
                        </div>
                      </td>
                      <td>
                          <div class="Productquantity buttons_added" style="background-color: rgb(255, 0, 0);">
                            <input type="button" name="delete" value="delete" class="minus" style="border-radius: 10px;" >
                          </div>
                      </td>
                      <td><div name ="cartPrice" id="price">12.99$</div></td>
                   
                    
                    </tr>
                    <tr>
                      <td>
                        <img class="images" src="https://images.unsplash.com/photo-1628791392322-de3fc6348d1b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80" ></a>
                      </td>
                      <td class="CartProd">Salsa Chips</td>
                      <td>Quantity
                        <div class="Productquantity buttons_added" style="background-color: rgb(148, 202, 137);" >
                          <input id="down" type="button"  value="-" class="minus" onclick="setCartQuantity(this,'down');" onclick=""><input 
                          id="amount" type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input
                           type="button" onclick="setCartQuantity(this,'up');" id="up" value="+" class="plus" >
                            
                        </div>
                      </td>
                        <td>
                          <div class="Productquantity buttons_added" style="background-color: rgb(255, 0, 0);">
                            <input type="button" name="delete" value="delete" class="minus" style="border-radius: 10px;" >
                          </div>
                        </td>
                        <td><div name ="cartPrice"  id="price">5.99$</div></td>
                       
                    
                    </tr> -->
                  </tbody>
                </table>
               </div>
              
  
            <div class="ProductDescription" style="text-align: right; align-self: center; top: 0%;" > 
             
            <div class="listing_P">
              <p><span style="float: left;">Before taxes</span><span name="priceB4Taxes"> 23.97$</span></p>
              <p><span style="float: left;">TPS</span><span id="tps"> 1.20$</span></p>
              <p><span style="float: left;">TVQ</span><span id="tvq">2.39$</span></p>
                <p><span style="float: left;">Total Items: </span><span id="itemstotal2"> </span></p>
              
          </div>
     
            <hr style="height: 3px; width: 90%; background-color: #fff;" class="listing_P">
       
          <div class="listing_P">
            <p style="display: flex inline-block; color: red; background-color: white; border-radius: 1vw; padding: 1vw;"><span style="float: left;">Sub-total: </span> <span id="subTotal">27.56$</span></p> 
          </div>
              <div class="dropdown" style="width: 80%; align-self: center; padding: 0vw;">
                <button class="dropbutton">Proceed to checkout</button>
               
              </div>
              </br>
              </br>
        
                </div>
    </div>
    
  </div>
    <div class="Footer">
      <table style="width: 100%; height:100%; vertical-align: middle;" >
        <td style="width: 50%; padding-left:1%;">
          <img class="FooterImages1" src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Food_box_logo_white.png" alt="SIUU" height="50"/>
          <img class="FooterImages2"style="padding-left: 2%" src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Dots_footer.png" alt="SIUU" height="35" />
          <img class="FooterImages3"src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Twitter_logo.png" alt="SIUU" height="35" />
          <img class="FooterImages4"style="padding-left: 2%" src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Facebook_logo.png" alt="SIUU" height="35" />
          <img class="FooterImages5"style="padding-left: 2%" src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Youtube_logo.png" alt="SIUU" height="35" />
          <a style="padding-left: 2%;" href="https://github.com/Holyvert/Dream_tech">
            <img class="FooterImages6"alt="GitHub" src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/github-icon.jpg" height="35" />
          </a>
        </td>
        <td style="width: 50%; text-align: right; color: #fff; padding-right: 1%;"><b>&copy; 2022 FoodBox, All rights reserved</b></td>
      </table>
    </div>
  </div>
  <script src="Functions.js"></script>
    
    <script>
        printToCart()
        updateCartQuantities()
    </script>
  </body>
</html>
