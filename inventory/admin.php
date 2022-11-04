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
    <a href="index.php">Back</a>
    <a href="Dash-admin.php">Dashboard</a>
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

     <div class="records">
         <h2>SALES RECORDS</h2>
         <?php
         $select="SELECT * FROM sales order by id asc";
         $query=mysqli_query($dbase,$select);
       
          
                if(mysqli_num_rows($query)){
                    ?>
                    <table cellspacing="5px">
                    <tr>

                        <th>PRO ID</th>
                        <th>PRODUCT</th>
                        <th>QUANTITY</th>
                        <th>BRAND</th>
                        <th>COLOR</th>
                        <th>PRICE</th>
                        <th>DAY</th>
                        <th>COSTUMER</th>
                        <th>DELETE</th>
                    </tr>
                    <?php
             while($records=mysqli_fetch_array($query)){
               echo "<tr>"; 
               echo "<td>".$records['product_id']."</td>";
               echo "<td>".$records['product_name']."</td>";
               echo "<td>".$records['quantity']."</td>";
               echo "<td>".$records['brand']."</td>";
               echo "<td>".$records['color']."</td>";
               echo "<td>".$records['price']."</td>";
               echo "<td>".$records['deyi']."</td>";
               echo "<td>".$records['costumer']."</td>";
               ?>
               <td>  <a href="delete.php?id=<?php echo $records['id']?>" style="text-decoration: none; color: red;" >delete</a>             </td>
                             <?php
               echo "</tr>"; 
               
            
             }

         }else{ ?>
            <div class="stock">
            <p>  Out of Stock. </p>
                 </div>
                 <?php
        }
         ?>
         </table>


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