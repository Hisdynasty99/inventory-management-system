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
    <title>Sale</title>
    
    <link rel="stylesheet" href="inventory.css">
</head>
<body>
    <div class="dashboard" id="navlink">
        <center>
    <img src="image/clo.jpg" onclick="hideMenu()"> 
    </center>
        <a href="index.php"> Dashboard </a>
        <a href="records.php">Records</a>
        <a href="sales.php" class="active" > Sales</a>
        <a href="stock.php" >New Stock</a>
        <a href="vendor.php">Register Vendor</a>
        <a href="costumer.php"> Register Costumer</a>
        <a href="search.php">Search</a>
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
         <input type="submit" class="sub" name="see" value="store">  <br>
         <?php
            if(isset($_POST['see'])){
                
                    $select="SELECT * FROM stock WHERE product_id='$_POST[productId]' limit 1";
                    $query=mysqli_query($dbase,$select);
                    if(!empty(mysqli_num_rows($query))){
                       while($prod=mysqli_fetch_array($query)){?>

                       <table cellspacing="15px">
                           <tr class="email">
                               <td class="sale">Product:  <?php echo $prod['product_name'];  ?></td>
                               <td class="sale"> <input type="text" name="quantity" placeholder="Quantity <?php echo $prod['quantity'];  ?>"> </td>
                           </tr>
                           <tr>
                               <td class="sale"> Brand: <?php echo $prod['brand'];  ?></td>
                               <td class="sale"> Color: <?php echo $prod['color'];  ?></td>
                               <td class="sale"> Price: <?php echo $prod['price'];  ?></td>
                           </tr>
                           <tr>
                               <td class="sale"><input type="datetime-local" class="location" name="day"></td>
                               <td>
                               <select name="costumer">
        <option disable selection> Select costumer </option>
            <?php
                $select="SELECT * FROM costumers";
                $que=mysqli_query($dbase,$select);
                while($num=mysqli_fetch_array($que)){?>
                
                <option value="<?php echo $num['name'];?>"><?php echo $num['name'];?></option>
                    <?php
                }
            ?>
        </select>
        <br>
                       </td>
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

            <input type="submit" class="sub" name="upload" value="SALE">
            <input type="reset" class="sub" value="Reset">

            <?php
                 if(isset($_POST['upload'])){
                        if(!empty($_POST['productId'])){

                  $productId=$_POST['productId'];
                  $quantity=$_POST['quantity'];
                  $day=$_POST['day'];
                  $costumer=$_POST['costumer'];


                  $input="SELECT * FROM stock WHERE product_id='$productId'";
                  $table=mysqli_query($dbase,$input);
                  while($in=mysqli_fetch_array($table)){
                      $product_name=$in['product_name'];
                      $brandi=$in['brand'];
                      $rangi=$in['color'];
                      $thamani=$in['price'] * $quantity;
      
                      $datas="INSERT INTO sales VALUES('','$productId','$product_name','$quantity','$brandi','$rangi','$thamani','$day','$costumer')";
                      if($dbase->query($datas)){     ?>
                        <div class="notification">
                        <p>  Uploading... </p>
                             <span class="progress"> Successful.. </span>
                             </div>
                             <?php
                     }else{ ?>
                        <div class="notification">
                        <p>  FAILED !! </p>
                             </div>
           <?php
                     }
                  }
               
               
                 $selqua="SELECT quantity FROM stock WHERE product_id='$productId' ";
                 $Qn=mysqli_query($dbase,$selqua);

                 while($quant=mysqli_fetch_array($Qn)){
                        $out=$quant['quantity'];
                        $result = $out - $quantity;
                        

                 $updates="UPDATE stock SET quantity='$result' where product_id='$productId'";
                 if(!$dbase->query($updates)){
                        echo "process fail";
                 }
            }  
        }else{ ?>
            <div class="notification">
            <p>  please insert product id !! </p>
                 </div>
<?php

        }
            
        
        }
        

?>
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