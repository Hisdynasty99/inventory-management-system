<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <link rel="stylesheet" href="inventory.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="inner-box" id="card">
                <div class="card-front">
                    <h2>LOGIN</h2>

                    <form action="" method="post">
                        <input type="email" class="input-box" name="email" placeholder="email">
                        <input type="password" class="input-box" name="password" placeholder="password">
                        <br>
                        <button type="submit" name="log" class="submit-btn"> Sign In </button>
                        <br>
                        <button type="button" class="btn" onclick="openRegister()"> Register </button>
                        <?php
                            if(isset($_POST['log'])){
        
                                $select="SELECT *FROM register WHERE email='$_POST[email]' AND password='$_POST[password]'";
                                $query=mysqli_query($dbase,$select);
                                $num=mysqli_num_rows($query);

                                if($num){
                                    session_start();
                                    $_SESSION['email']= $_POST['email'];
                                    header('location: index.php');
                                }else{
                                    echo '<span style="color: white";> Access Denied</span>';
                                }
                            }
                        ?>
                    </form>


                </div>
                <div class="card-back">
                <h2>REGISTER</h2>

            <form action="" method="post">
            <input type="text" class="input-box" name="name" placeholder="Organisation name" required>
            <input type="email" class="input-box" name="email" placeholder="Organisation email" required>
            <input type="password" class="input-box" name="password" placeholder="password">
            <input type="password" class="input-box" name="confirm" placeholder="confirm">
            <br>
            <button type="submit" name="register" class="submit-btn"> Sign In </button>
            <br>
            <button type="button" class="btn" onclick="openLogin()"> Login </button>
                        <?php
                            if(isset($_POST['register'])){
                                $name=$_POST['name'];
                                $email=$_POST['email'];
                                $password=$_POST['password'];
                                $confirm=$_POST['confirm'];
                                $len=strlen($password);

                                if( $len>8 ){
                                

                                if( $password == $confirm ){
                                   
                                    
                                            $insert="INSERT INTO register VALUES('','$name','$email','$password')";
                                            if($dbase->query($insert)){
                        mail($email, "Registering verification", "Thank you for visiting and register in Your Inventory system","from: emerchriss@gmail.com\r\n");
                                                $_SESSION['email']= $email;
                                                header('location: sign_in.php');
                                            }else{
                                                echo '<span style="color: white";> Oopss !! network error</span>';
                                            }
                                        

                                    }else{
                                        echo '<span style="color: red";>Password dont match</span>';
                                 }

                             }else{
                                    echo '<span style="color: red";>Strong password recommended exceed 8 character</span>';
                         }
                    }
                        ?>
</form>


                </div>

            </div>
        </div>
    </div>

    <script>
        var card = document.getElementById("card");
        function openRegister(){
            card.style.transform = "rotateY(-180deg)";
        }
        function openLogin(){
            card.style.transform = "rotateY(0deg)";
        }
    </script>
    
</body>
</html>