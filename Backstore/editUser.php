<?php

include('../LoginAndRegistration/AdminAuthentication.php');


require "usersFunctions.php";

$userId = $_GET['Id'];

$user = getUserById($userId);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  editUser($_POST, $userId);
  header("Location: UsersList.php");
}

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
          <input type="hidden" name="Id" value="<?php echo $user['Id'] ?>">
          <p>Name</p>
          <input type="text" name="Name" placeholder="Enter Name" value="<?php echo $user['Name'] ?>">
          <p>Email</p>
          <input type="email" name="Email" placeholder="Enter Email" value="<?php echo $user['Email'] ?>">
          <p>Password</p>
          <input type="password" name="Password" placeholder="Password" value="<?php echo $user['Password'] ?>">
          <p>Address</p>
          <input type="text" name="Adress" placeholder="Enter Adress" value="<?php echo $user['Adress'] ?>">
          <p>Age</p>
          <input type="number" name="Age" placeholder="Enter Age" value="<?php echo $user['Age'] ?>">
          <p>Admin Status</p>
          <label for="Admin"><input type="radio" id="Admin" name="Admin_Status" value="Admin" <?php Admin_Status($user['Admin_Status']) ?>>Admin</label>
          <label for="User"><input type="radio" id="User" name="Admin_Status" value="User" <?php User_Status($user['Admin_Status']) ?>>User</label>

          <div class="Productquantity buttons_added">
            <input type="submit" value="save" class="Backs" style="border-radius: 10px;">
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