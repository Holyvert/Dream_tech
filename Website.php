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
    <script src="JQueryv3.1.0.js"></script>
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
      <div class="RTS" style="text-align: center;">Ready to Shop </div>
          <div class="MainDiv">
                <select class="language" name="language">
                    <option value="EN"> English</option>
                    <option value="FR"> French</option>
                </select> 
              
              <div class="icons"> 
            
            <table class="Cart">
          <tr>
            <!-- column -->
            <th><a href="ShoppingCart.php">&#128722</a></th>
          </tr>
        </table>
            </div>
          </div>
          <div class="slideshow-container">

        <div class="mySlides fade banner" >
          <div class="numbertext">1 / 3</div>
          <a href="FruitsAndVegetables.html"> 
          <img class="banner" src="https://images.unsplash.com/photo-1498837167922-ddd27525d352?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" >
          
        </a>        </div>
        
        <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <a href="Snacks.html">
            <img class="banner" src="https://images.unsplash.com/photo-1621939514649-280e2ee25f60?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" >
          </a>
          
        </div>
        
        <div class="mySlides fade">
          <div class="numbertext">3 / 3</div>
          <a href="Beverages.html"> 
          <img class="banner" src="https://images.unsplash.com/photo-1506353219544-65860ffc5f41?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" >
          </a>
        </div>
        
        </div>
       
        <script>
        var slideIndex = 0;
        showSlides();
        
        function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides");
         
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}    
         
          slides[slideIndex-1].style.display = "block";  
          
          setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
        </script>
          

        <p class="popular"> Popular Items</p>

           <div class="one">

           <?php foreach($products as $product): ?>
            <?php if( $product['Quantity_inStock']<="75"): ?>  
          <a href="<?php echo str_replace(' ', '', $product['Ailse']) ?>\<?php echo str_replace(' ', '', $product['Name']) ?>.php">
              <div class="img" style="background-image: url(<?php echo $product['image']?>);">
               
                   <div class="title1"> 
                    <h4><?php echo $product['Name']?></h4>
            <p><?php echo $product['price_each']?></p></div>
              </div>
            </a>
            <?php endif ;; ?>
            <?php endforeach ;; ?>

            <!-- <a href="FruitsandVegetables/Pomegranate.php">
              <div class="img" style="background-image: url(https://images.unsplash.com/photo-1615411640087-873c938dd259?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1035&q=80);">
               
                   <div class="title1"> 
                    <h4>Pomegranates</h4>
                    <p>3.99$</p></div>
              </div>
            </a>

            <a href="Beverages\CoconutWater.php">
              <div class="img" style="background-image: url(https://images.unsplash.com/photo-1536677169608-4f3e10af7058?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80);">
               
                   <div class="title1"> 
                      <h4>Coconut Water</h4>
                      <p>10.99$</p></div>
              </div>
            </a>

            <a href="MeatAndFish\Oysters.php">
              <div class="img" style="background-image: url(https://images.unsplash.com/photo-1573697861622-6ad5f265e5f4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80);">
               
                   <div class="title1"> 
                      <h4>Oysters</h4>
                      <p>22.19$</p>
                      </div>
              </div>
            </a>

            
            <a href="Snacks\Jell-O.php">
              <div class="img" style="background-image: url(https://images.unsplash.com/photo-1597384462874-56b0bdeca197?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80);">
                       
                   <div class="title1"> 
                      <h4>Jell-O</h4>
                      <p>1.09$</p>
                    </div>
              </div>
            </a>

            <a href="Dairy\ParmesanCheese.php">
              <div class="img" style="background-image: url(https://images.unsplash.com/photo-1599932677968-877d85f64a12?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=969&q=80);">
                              
                   <div class="title1"> 
                      <h4>Parmesan Cheese</h4>
                      <p>11.99$</p>
                    </div>
              </div>
            </a>

            <a href="FrozenandCanned\FrozenChickenDumplings.php">
              <div class="img" style="background-image: url(https://images.unsplash.com/photo-1589047133481-02b4a5327d89?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80);">
               
                   <div class="title1"> 
                    <h4>Dumplings</h4>
                    <p>7.49$</p>
                  </div>
              </div>
            </a>
              </div> -->
          
          
          <!-- Slideshow container -->
   
    
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
  
  
  </body>
</html>
