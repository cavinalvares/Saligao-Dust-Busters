<?php
    session_start();
    function logedin($username){
        $_SESSION['username']=$username;
    }

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        if(isset($_GET['username']))
        {
            include './dbconnect.php';

            $username = $_GET['username'];

            $sql="SELECT * FROM users WHERE display_name = '$username'";
            $result = mysqli_query($conn,$sql);

        
            if(mysqli_num_rows($result) > 0)
                echo "*The Username Already Exists*";
            else
                echo "";
            mysqli_close($conn);
        }
        else
        {
            unset($_SESSION['username']);
            if(isset($_COOKIE['username']))
                setcookie("username", "", time() - 3600, "/");
            
            header("location:http://localhost/garbage/");

        }
    }
    else{
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            include './dbconnect.php';
            
            if(sizeof($_POST) == 7){
                $name = $_POST["fname"]." ".$_POST["lname"];
                $username = $_POST["uname"];
                $phno = $_POST["phno"];
                $address = $_POST["address"];
                $email = $_POST["email"];
                $psw = $_POST["psw"];
                
                
                $sql = "INSERT INTO users (name, display_name, phone_no, email, address, password) 
                        VALUES ('$name', '$username', $phno, '$email', '$address', '$psw')";
                
                mysqli_query($conn, $sql);

                header("location: http://localhost/garbage/");
                
            }
            else{
                $username = $_POST["uname"];
                $psw = $_POST["psw"];

                $sql = "select * from users where display_name='$username' and password='$psw'";
                $result = mysqli_query($conn, $sql);
                
                $rows=mysqli_num_rows($result);
                
                if($_POST["check"] == "true"){
                    setcookie("username", $username, time()+(30*60), "/");
                }

                if($rows>0)
                    logedin($username);
                else
                    echo "$rows";

            }

            mysqli_close($conn);
        }
    }
    
    ?>
