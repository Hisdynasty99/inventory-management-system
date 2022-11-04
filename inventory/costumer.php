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
    <title>Registering of custumer</title>
    
    <link rel="stylesheet" href="inventory.css">
</head>
<body>
    <div class="dashboard" id="navlink">
        <center>
    <img src="image/clo.jpg" onclick="hideMenu()"> 
    </center>
        <a href="index.php" > Dashboard </a>
        <a href="records.php">Records</a>
        <a href="sales.php">sales</a>
        <a href="stock.php">New Stock</a>
        <a href="vendor.php" >Register Vendor</a>
        <a href="costumer.php"class="active"> Register Costumer</a>
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
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> " method="post">
   
<input type="text" class="name" name="name" placeholder="Costumer Name"> <br>
<input type="text" class="email" name="email" placeholder="Costumer Email">
<input type="text" class="addres" name="addres" placeholder="Vendor Addres"><br>
<input type="text" class="phone" name="name1" placeholder="Phone 1" required>
<input type="text" class="phone2" name="name2" placeholder="Phone 2">
<input type="text" class="phone3" name="name3" placeholder="Phone 3"><br>
<input type="text" class="location" name="location" placeholder="location"><br>
<input type="text" class="district" name="district" placeholder="district">
<select class="region" name="region">
    <option value="Dar-es-Salaam">Dar-Es-Salaam</option>
    <option value="Morogoro">Morogoro</option>
    <option value="Tanga">Tanga</option>
    <option value="Arusha">Arusha</option>
    <option value="Dodoma">Dodoma</option>
    <option value="Tabora">Tabora</option>
    <option value="Mtwara">Mtwara</option>
    <option value="Singida">Singida</option>
    <option value="Kilimanjaro">Kilimanjaro</option>
    <option value="Mbeya">Mbeya</option>
</select>
<br>
<input type="submit" class="sub" name="submit" value="Register">
<input type="reset" class="sub" value="reset">
<?php
if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $addres=$_POST['addres'];
            $phone1=$_POST['name1'];
            $phone2=$_POST['name2'];
            $phone3=$_POST['name3'];
            $location=$_POST['location'];
            $district=$_POST['district'];
            $region=$_POST['region'];

            $select="INSERT INTO costumers VALUES('','$name','$email','$addres','$phone1','$phone2','$phone3','$location','$district','$region')";
            if($dbase->query($select)){
                ?>
                <div class="notification">
                <p>  Registering... </p>
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