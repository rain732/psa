<?php

session_start();

include "../connect.php";

//Authorized admin ==1 else volunteer == 0
$Authorized = 0;
$_SESSION['Authorized'] = $Authorized;
if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        header("Location: ../login.php?error=Email is required");

        exit();

    }else if(empty($pass)){

        header("Location: ../login.php?error=Password is required");

        exit();

    }else{

        $sql1 = "SELECT * FROM admins WHERE email='$uname' AND password='$pass'";
        $sql2 = "SELECT * FROM volunteers WHERE email='$uname' AND password='$pass'";
        $sql3 = "SELECT status FROM volunteers WHERE email='$uname' AND password='$pass'";

        $result1 = mysqli_query($conn, $sql1); //admins
        $result2 = mysqli_query($conn, $sql2); //volunteers
        $result3 = mysqli_query($conn, $sql3); //volunteer's status:> if Accepted login only

        if (mysqli_num_rows($result1) === 1) {
            $row = mysqli_fetch_assoc($result1);

            if ($row['email'] === $uname && $row['password'] === $pass) {
                echo "Logged in!";
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                //This is admin
                $Authorized = 1;
                $_SESSION['Authorized'] = $Authorized;
                header("Location: ../user/admin");
                exit();
            }else{
                header("Location: ../login.php?error=Incorect Email or password");
                exit();
            }
        }
        elseif (mysqli_num_rows($result2) === 1) {
            $row = mysqli_fetch_assoc($result2);
            //Status {Accepted ,OnHold ,Blocked}
            $_SESSION['status'] = $row['status'];
            if ($row['email'] === $uname && $row['password'] === $pass) {
                if($row['status'] === 'Accepted'){
                    echo "Logged in!";
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['first_name'] = $row['first_name'];
                    $_SESSION['last_name'] = $row['last_name'];
                    
                    //this is not admin
                    $Authorized = 0;
                    $_SESSION['Authorized'] = $Authorized;
                    header("Location: ../user/volunteer.php");
                    exit();
                }else{
                    header("Location: ../login.php?error=Not Accepted Volunteer");
                exit();
                }
                
            }else{
                header("Location: ../login.php?error=Incorect Email or password");
                exit();
            }
        }else{
            header("Location: ../login.php?error=Incorect User name or password");
            exit();
        }
    }

}else{

    header("Location: ../login.php");

    exit();

}


