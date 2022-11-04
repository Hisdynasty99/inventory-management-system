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
    <title>Home</title>
    
    <link rel="stylesheet" href="inventory.css">
</head>
<body>
    <div class="dashboard" id="navlink">
        <center>
    <img src="image/clo.jpg" onclick="hideMenu()"> 
    </center>
        <a href="admin.php" class="active"> Dashboard </a>
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


     <?php 
         $select="SELECT *FROM register WHERE email='$_SESSION[email]' limit 1";
         $que=mysqli_query($dbase,$select);

         while($display=mysqli_fetch_array($que)){
    ?>
       <div class="notification">
       <p>  <?php echo $display['name'];?> </p>
            <span class="progress"></span>
            </div>
            
    <?php
         }
         ?>
         <div class="buttons">
             <form action="" method="post">
             <input type="submit" name="costumer" class="costumer" value="costumers">
                <?php
                    if(isset($_POST['costumer'])){
                        $select="SELECT * FROM costumers";
                        $query=mysqli_query($dbase,$select);
                        if(mysqli_num_rows($query)){?>
                            <table cellspacing '5px'>
                                <tr>
                                    <th>Costumer Name</th>
                                    <th colspan="2">Phone No</th>
                                    <th>Email</th>
                                    <th>Location</th>
                                </tr>
<?php
                            while($cos=mysqli_fetch_array($query)){
                                echo "<tr>";
                                echo "<td>".$cos['name']."</td>";
                                echo "<td>".$cos['phone1']."</td>";
                                echo "<td>".$cos['phone2']."</td>";
                                echo "<td>".$cos['email']."</td>";
                                echo "<td>".$cos['district']."</td>";
                                echo "</tr>";
                            }

                        }else{ ?>
                       <div class="stock">
                        <p>  No Costumer REgistered ! </p>
                        </table>
                    </div>
                    <?php
        }
    
                    }
                ?>

             <input type="submit" name="vendors" class="Vend" value="Vendors">
             <?php
                    if(isset($_POST['vendors'])){
                        $select="SELECT * FROM vendors";
                        $query=mysqli_query($dbase,$select);
                        if(mysqli_num_rows($query)){?>
                            <table cellspacing '5px'>
                                <tr>
                                    <th>Vendor Name</th>
                                    <th colspan="2">Phone No</th>
                                    <th>Email</th>
                                    <th>Location</th>
                                </tr>
<?php
                            while($cos=mysqli_fetch_array($query)){
                                echo "<tr>";
                                echo "<td>".$cos['name']."</td>";
                                echo "<td>".$cos['phone1']."</td>";
                                echo "<td>".$cos['phone2']."</td>";
                                echo "<td>".$cos['email']."</td>";
                                echo "<td>".$cos['district']."</td>";
                                echo "</tr>";
                            }

                        }else{ ?>
                       <div class="stock">
                        <p>  No Costumer REgistered ! </p>
                        </table>
                    </div>
                    <?php
        }
    
                    }
                ?>


<input type="submit" name="stock" class="Vend" value="STOCK">
             <?php
                    if(isset($_POST['stock'])){
                        $select="SELECT * FROM stock";
                        $query=mysqli_query($dbase,$select);
                        if($tot=mysqli_num_rows($query)){
                            
                            ?>
                                
                            <table cellspacing '5px'>
                                <tr>
                                    <th>Product Id</th>
                                    <th>Product name</th>
                                    <th>Quantity</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Expire</th>
                                </tr>
<?php
                            while($stock=mysqli_fetch_array($query)){
                                echo "<tr>";
                                echo "<td>".$stock['product_id']."</td>";
                                echo "<td>".$stock['product_name']."</td>";
                                echo "<td>".$stock['quantity']."</td>";
                                echo "<td>".$stock['brand']."</td>";
                                echo "<td>".$stock['buying_price']."</td>";
                                echo "<td>".$stock['expire']."</td>";
                                echo "</tr>";
                            }
                            echo "Total Product &nbsp ".$tot;

                        }else{ ?>
                       <div class="stock">
                        <p>  No Costumer REgistered ! </p>
                        </table>
                    </div>
        }
        <?php
                        }
                }
                ?>
             </form>
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