<?php
error_reporting(E_ALL ^ E_WARNING);
include('../LoginAndRegistration/AdminAuthentication.php');



function getProducts()
{
  return  json_decode(file_get_contents('ProductsDB.json'), true);
}
function getProducts2()
{
  return  json_decode(file_get_contents('Backstore/ProductsDB.json'), true);
}
function getNewId()
{
  $products = getProducts();

  return  intval($products[count($products) - 1]["Id"] + 1);
}
function getProductById($Id)
{
  $products = getProducts();

  foreach ($products as $product) {
    if ($product['Id'] == $Id)
      return $product;
  }

  return null;
}

function createProduct($data)
{
  $products = getProducts();

  $array = array(
    "Id" => $data['Id'],
    "Name" => $data['porduct_name'],
    "Ailse" => $data['Category'],
    "company" => $data['company'],
    "Quantity" => $data['s_perU'],
    "price_each" => $data['price_each'],
    "price_perQ" => $data['price_perQ'],
    "More_Description" => $data['More_Description'],
    "image" => $data['images'],
    "color" => $data['color'],
    "Quantity_inStock" => $data['Quantity'],
  );

  array_push($products, $array);

  file_put_contents('ProductsDB.json', json_encode($products));

  $path = str_replace(' ', '', $data['porduct_name']);
  $pathf = str_replace(' ', '', $data['Category']);
  $template = <<<EOD
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
                  
                <img src="{$data['images']}" alt="" class="images">
              </div>
    
              <div class="ProductDescription">
            
                <p class="compagny">{$data['company']}</p>
            
                <p class="porduct_name">{$data['porduct_name']}</p>
                {$data['s_perU']}
                </br>
                </br>
                <p class="price_each"id="price">{$data['price_each']}</p>
    
                
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
                    <a href="#"> {$data['More_Description']}
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
EOD;
  $myfile = fopen("../{$pathf}/{$path}.php", "w+");
  fwrite($myfile, $template);
  fclose($myfile);
}

function editProduct($data, $Id)
{
  $products = getProducts();



  foreach ($products as $i => $product) {
    if ($product['Id'] == $Id) {

      // $products[$i] = array_merge($product,$data);
      $products[$i]['Name'] = $data['porduct_name'];
      $products[$i]['Ailse'] = $data['Category'];
      $products[$i]['company'] = $data['company'];
      $products[$i]['Quantity'] = $data['s_perU'];
      $products[$i]['price_each'] = $data['price_each'];
      $products[$i]['price_perQ'] = $data['price_perQ'];
      $products[$i]['More_Description'] = $data['More_Description'];
      $products[$i]['image'] = $data['images'];
      $products[$i]['color'] = $data['color'];
      $products[$i]['Quantity_inStock'] = $data['Quantity'];

      $path = str_replace(' ', '', $product['Name']);
      $pathf = str_replace(' ', '', $product['Ailse']);
      $template = <<<EOD
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
                        
                      <img src="{$data['images']}" alt="" class="images">
                    </div>
          
                    <div class="ProductDescription">
                  
                      <p class="compagny">{$data['company']}</p>
                  
                      <p class="porduct_name">{$data['porduct_name']}</p>
                      {$data['s_perU']}
                      </br>
                      </br>
                      <p class="price_each"id="price">{$data['price_each']}</p>
          
                      
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
                          <a href="#"> {$data['More_Description']}
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
EOD;
      $myfile = fopen("../{$pathf}/{$path}.php", "w+");
      fwrite($myfile, $template);
      fclose($myfile);
    }
  }


  file_put_contents('ProductsDB.json', json_encode($products));
}


function deleteProduct($Id)
{
  $products = getProducts();

  foreach ($products as $i => $product) {
    if ($product['Id'] == $Id) {
      array_splice($products, $i, 1);

      $path = str_replace(' ', '', $product['Name']);
      $pathf = str_replace(' ', '', $product['Ailse']);
      unlink("../{$pathf}/{$path}.php");
    }
  }

  file_put_contents('ProductsDB.json', json_encode($products));
}

function categoryBeverages($category)
{
  if ($category == "Beverages")
    echo "selected";
}

function categoryFv($category)
{
  if ($category == "Fruits and Vegetables")
    echo "selected";
}
function categoryFc($category)
{
  if ($category == "Frozen and Canned")
    echo "selected";
}
function categoryDairy($category)
{
  if ($category == "Dairy")
    echo "selected";
}
function categoryMeatAndFish($category)
{
  if ($category == "MeatAndFish")
    echo "selected";
}
function categorySnacks($category)
{
  if ($category == "Snacks")
    echo "selected";
}

?>