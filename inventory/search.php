<?php
include 'connection.php';
?>

<?php
session_start();
if(empty($_SESSION['email'])){
    header('location: sign_in.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    
    <link rel="stylesheet" href="inventory.css">
</head>
<body>
    <div class="dashboard" id="navlink">
        <center>
    <img src="image/clo.jpg" onclick="hideMenu()"> 
    </center>
        <a href="index.php"> Dashboard </a>
        <a href="records.php">Records</a>
        <a href="sales.php"  > Sales</a>
        <a href="stock.php" >New Stock</a>
        <a href="vendor.php">Register Vendor</a>
        <a href="costumer.php"> Register Costumer</a>
        <a href="search.php" class="active">Search</a>
        <a href="sign_out.php">Sign Out</a>
    </div>

    <div class="content">
    <?php 
         $select="SELECT *FROM register WHERE email='$_SESSION[email]' limit 1";
         $que=mysqli_query($dbase,$select);
         while($display=mysqli_fetch_array($que)){
             echo "<h1>". $display['name']."</h1>";
         }
         ?>
    <div class="open">
     <img src="image/menu.png" width="25px" onclick="showMenu()">
     </div>



    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
      

        <input  type="search" class="name" name="productId" placeholder="Product Id" > 
         <input type="submit" class="sub" name="see" value="search">  <br>
         <?php
            if(isset($_POST['see'])){
                
                    $select="SELECT * FROM stock WHERE product_id='$_POST[productId]' limit 1";
                    $query=mysqli_query($dbase,$select);
                    if(!empty(mysqli_num_rows($query))){
                       while($prod=mysqli_fetch_array($query)){?>

                       <table cellspacing="15px">
                           <tr class="email">
                               <td class="sale">Product:  <?php echo $prod['product_name'];  ?></td>
                               <td class="sale">Quantity <?php echo $prod['quantity'];  ?> </td>
                           </tr>
                           <tr>
                               <td class="sale"> Brand: <?php echo $prod['brand'];  ?></td>
                               <td class="sale"> Color: <?php echo $prod['color'];  ?></td>
                               <td class="sale"> Price: <?php echo $prod['price'];  ?></td>
                           </tr>
                           <tr>
                           <td class="sale"> Expired on: <?php echo $prod['expire'];  ?></td>
                           </tr>
                           
                       
                    
                       </table>
       <?php
    }
}else{ ?>
    <div class="notification">
    <p>  Product not found </p>
    <?php
            }
        }
?>
        <br>

           
            <input type="reset" class="sub" value="Reset">

         </form>

         </div>
    
  </div>


<script>
     var navLink = document.getElementById("navlink");

     function showMenu(){
         navLink.style.left = "0";
     }

     function hideMenu(){
         navLink.style.left = "-260px";
     }
 </script>
       
    
</body>
</html>