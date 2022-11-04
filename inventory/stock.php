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
    <title>Stocking</title>
    
    <link rel="stylesheet" href="inventory.css">
</head>
<body>
    <div class="dashboard" id="navlink">
        <center>
    <img src="image/clo.jpg" onclick="hideMenu()"> 
    </center>
        <a href="index.php"> Dashboard </a>
        <a href="records.php">Records</a>
        <a href="sales.php">sales</a>
        <a href="stock.php" class="active">New Stock</a>
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
      

        <input  type="text" class="name" name="proname" placeholder="Product Name" > 
        <input type="text" class="phone3" name="buying" placeholder="Buying Price"> <br>
        <input type="text" class="email" name="proid" placeholder="Product Id"> 
        <input type="number" class="addres" name="quantity" placeholder="Quantity"> <br>
        <input type="text" class="phone" name="brand" placeholder="Brand"> 
        <input type="text" class="phone2" name="color" placeholder="color"> 
        <input type="number" class="phone3" name="price" placeholder="Price"> <br>
        <input type="datetime-local" class="location" name="day"><br>
        <input type="text" class="location" name="use" placeholder="Time of Use"><br>
        <select name="vendor" class="vendor">
        <option disable selection> Select Vendor </option>
            <?php
                $select="SELECT * FROM vendors";
                $que=mysqli_query($dbase,$select);
                while($num=mysqli_fetch_array($que)){?>
                
                <option value="<?php echo $num['name'];?>"><?php echo $num['name'];?></option>
                    <?php
                }
            ?>
        </select>
        <br>

        
            <input type="submit" class="sub" name="upload" value="ADD ITEM">
            <input type="reset" class="sub" value="RESET">
            <input type="submit" class="sub" name="update" value="UPDATE">
            <!-------updates of stock---->
            <?php
                 if(isset($_POST['update'])){
                    $fields=$_POST['proid']&$_POST['proname']&$_POST['quantity']&$_POST['brand']&$_POST['color']&$_POST['price']&$_POST['day']&$_POST['use']&$_POST['vendor'];
                    if(!empty($fields )){

                     $productId=$_POST['proid'];
                     $productname=$_POST['proname'];
                     $quantity=$_POST['quantity'];
                     $brand=$_POST['brand'];
                     $color=$_POST['color'];
                     $price=$_POST['price'];
                     $day=$_POST['day'];
                     $use=$_POST['use'];
                     $vendor=$_POST['vendor'];

                

                     $updatee="UPDATE stock SET  product_id='$productId', product_name='$productname', quantity='$quantity', brand='$brand', color='$color', price='$price', deyi='$day', expire='$use', vendor='$vendor' where product_id='$productId'";
                     if($dbase->query($updatee)){
                         ?>
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
                    }else{ ?>
                        <div class="notification">
                        <p>  Empty fields detected. </p>
                             </div>
                             <?php
                    }

                 }
            ?>
            <!------update of stock end--->

            <?php
                 if(isset($_POST['upload'])){
                        $matchId="SELECT product_id FROM stock WHERE product_id='$_POST[proid]'";
                        $queryselector=mysqli_query($dbase,$matchId);
                        $numsrow=mysqli_num_rows($queryselector);

                        if( $numsrow < 1){


                    $fields=$_POST['proid']&$_POST['proname']&$_POST['buying']&$_POST['quantity']&$_POST['brand']&$_POST['color']&$_POST['price']&$_POST['day']&$_POST['use']&$_POST['vendor'];
                    if(!empty($fields )){

                     $productId=$_POST['proid'];
                     $productname=$_POST['proname'];
                     $buying=$_POST['buying'];
                     $quantity=$_POST['quantity'];
                     $brand=$_POST['brand'];
                     $color=$_POST['color'];
                     $price=$_POST['price'];
                     $day=$_POST['day'];
                     $use=$_POST['use'];
                     $vendor=$_POST['vendor'];

                

                     $insert="INSERT INTO stock VALUES('','$productId','$productname','$buying','$quantity','$brand','$color','$price','$day','$use','$vendor')";
                     if($dbase->query($insert)){
                         ?>
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
                    }else{ ?>
                        <div class="notification">
                        <p>  Empty fields detected. </p>
                             </div>
                             <?php
                    }

                }else{ ?>
                        <div class="notification">
                        <p>  product id already exist !! </p>
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