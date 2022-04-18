<div class="Header">
        <div class="ShopSign">
          <p class="TShop"><a href="../Website.php"><img class="Logo" src="../Images/Food_box_logo_white.png" alt="SIUU" height="50" /> </a></p>
      </div>
     
      
      <?php

if (isset($_COOKIE["user_email"])) {
  function getUsers()
  {
    return  json_decode(file_get_contents('../Backstore/users.json'), true);
  }
       function getUserNameByEmail($Email)
       {
         $users = getUsers();
       
         foreach ($users as $user) {
           if ($user['Email'] == $Email)
           echo ($user['Name']);
         }
       
        
       }
  

  echo"<form class=\"sign\">";
  echo"<button class=\"dropbutton\">";
  echo"Welcome ";
  getUserNameByEmail($_COOKIE["user_email"]);

  echo "  </button>";
  echo "  </form>";
}
?>

      
      
      
        <form class="SignUp">
          <table class="Table">
            <tr>
              <!-- rows of the tables -->
              <th><a href="../Website.php">Home </a></th>
              <!-- column -->
              <th> Services</th>
              <th>Shop</th>
            <th>

          
         


            <?php
          if (isset($_COOKIE["user_email"])) {
            echo " <a href=\"../LoginAndRegistration/loginUser.php\"> SignOut </a>";
            
            } else{
              echo " <a href=\"../LoginAndRegistration/loginUser.php\" >SignIn</a>";
            }
            ?>
 
            </th>
            </tr>
          </table>
        </form>
      </div>