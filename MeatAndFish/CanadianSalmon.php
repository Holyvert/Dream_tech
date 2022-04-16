<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Food Box Grocery Store</title>
    <link rel="stylesheet" href="..\create.css" />
      <script src="../items.js"></script>
    <script src="../Functions.js"></script>
  </head>

  <body>
    
      <!-- outer division-->
    <div class="BorderDiv">
       <!-- header division-->

       <?php include "../header2.php" ?>
    
    <!-- Navigation division to left-->
    <?php include "../navBar2.php" ?>
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
              <th><a href="..\ShoppingCart.php">&#128722</a></th>
            </tr>
          </table>
              </div>
          </div>
         
       
       
       
      

          <div class="RowDescrpition" >
        
            <div class="imgDescription"  > 
                
              <img src="https://images.unsplash.com/photo-1610294394708-7053ca773103?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=986&q=80" alt="" class="images">
            </div>
  
            <div class="ProductDescription">
           
              <p class="compagny">Sailor's</p>
           
              <p class="porduct_name">Canadian Salmon</p>
              1 kg avg.
              </br>
              </br>
              <p class="price_each"id="price">$35.18 avg. ea.</p>
  
              
                  <form style="text-align: center;">
                  
                  <input 
                    class="AddCartButton"
                    type="image"
                    
                    src="../Images/Food_box_button_white.png"
                    name="Add"
                  style="color: rgb(208, 100, 58);"
                     width="100px"
  
                  />
                </form>
  
                <div class="dropdown">
                  <button class="dropbutton" >More description</button>
                  <div class="dropdown-content" style="background-color: rgb(208, 100, 58);">
                  <a href="#"> Healthy and nutritious, salmon is a fish rich in omega 3, protein, calcium and vitamin D.
                  </a>
                  </div>
                </div>
                </br>
                </br>
                  <p>Quantity</p>
                <div class="Productquantity buttons_added"  >
                    <input id="down" type="button"  value="-" class="minus" onclick="setQuantity('down');"><input id="amount" type="number" step="1"
                     min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input 
                     type="button" onclick="setQuantity('up');" id="up" value="+" class="plus" >
                      
                  </div>
      <br><br>

                  <div>
                    Total Price:&nbsp;
                    <div id="price1"> </div>
               </div>
        
                </div>
    </div>

        <div class="Footer">
            <table style="width: 100%; height:100%; vertical-align: middle;" >
              <td style="width: 50%; padding-left:1%;">
                <img class="FooterImages1"src="https://raw.githubusercontent.com/Holyvert/Dream_tech/main/Images/Food_box_logo_white.png" alt="SIUU" height="50"/>
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
</body>
</html>