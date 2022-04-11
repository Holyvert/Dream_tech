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
              <a href="ProductsList.html">> Product List </a>
                </th>
            </tr>
               <tr>
                   <th>
                   <a href="OrderList.html" >>  Order List </a>
                    </th>
               </tr>
               <tr>
                   <th>
                  <a href="UsersList.html">>  User List</a>
                    </th>
               </tr>
               
          </table>
        </input>
      </div>
      <!-- division for main page-->
      <div class="MainPage" style=" background-color: #9b9b9b;">

            <div class="RowDescrpition">
              
            
              <form class="ProductDescription"  method="post" action="products.php">
                <p>Company name</p>
                <input type="text" name="company"placeholder="Enter Company Name">
                <p>Product name</p>
                <input type="text" name="porduct_name" placeholder="Enter Product Name">
                <p>Product size</p>
                <input type="text" name="s_perU" placeholder="Product size per unit">
                <p>Product Price</p>
                <input type="text" name="price_each" placeholder="Price per unit">
                <input type="text" name="price_perQ" placeholder=" Price per smallest unit">
                <p>Product Description</p>
                <textarea  name="More_Description" style="width:60vw; height:20vw; align-self: center;" placeholder="Enter Description">
                </textarea><br>
                <p>Product Category</p>
                <select name="Category">
                  <option >Fruits and Vegetables</option>
                  <option>Beverages</option>
                  <option >MeatAndFish</option>
                  <option >Snacks</option>
                  <option >Dairy</option>
                  <option >Frozen and Canned</option>
                </select>
                <p>Quantity in Stock</p>
                <input type="text" name="Quantity" placeholder="Enter Quantity">
                <p>Product Image</p>
                <input type="text" name="images" placeholder="Image url">
                <p>OR</p>
                <input type="file" accept="image/*" />
             
                <p>Description Color</p>
                <input type="color" name="color" placeholder="Enter rgb values" style="align-self: center;">

                <div class="Productquantity buttons_added" >
                    <input type="submit" value="save"  class="Backs" style="border-radius: 10px;" onclick="on_submit()">
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
<?php

// if (isset($_POST['Edit'])) {

//     echo "['Edit']";
//     // $filename='Products.json';
//     // $jsonData= file_get_contents( $filename,true);
//     // $jsondecode=json_decode($jsonData);
//     // foreach($jsondecode as $key => $value){
//     //     foreach($value as $kkey => $vvalue){
//     //         if($kkey==['Edit'])

//     //     }
//     // }
// } 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $datae = array();
        $datae[] = array(
        'Name'=>$_POST['porduct_name'],
        'Ailse' => $_POST['Category'],
        'company'=> $_POST['company'],
        'Quantity'=> $_POST['s_perU'],
        'price_each'=> $_POST['price_each'],
        'price_perQ'=> $_POST['price_perQ'],
        'More_Description'=> $_POST['More_Description'],
        'image'=> $_POST['images'],
        'color'=> $_POST['color'],
        'Quantity_inStock'=> $_POST['Quantity'] 
        );

  
       $filename='Products.json';
    
    // read the file if present
$handle = @fopen($filename, 'r+');

// create the file if needed
if ($handle === null)
{
    $handle = fopen($filename, 'w+');
}

if ($handle)
{
    // seek to the end
    fseek($handle, 0, SEEK_END);

    // are we at the end of is the file empty
    if (ftell($handle) > 0)
    {
        // move back a byte
        fseek($handle, -1, SEEK_END);

        // add the trailing comma
        fwrite($handle, ',', 1);

        // add the new json string
        fwrite($handle, json_encode($datae) . ']');
    }
    else
    {
        // write the first event inside an array
        fwrite($handle, json_encode($datae));
    }

        // close the handle on the file
        fclose($handle);
}

 }
?>