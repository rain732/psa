<?php
include "../connect.php";


function validate($data){

  $data = trim($data);

  $data = stripslashes($data);

  $data = htmlspecialchars($data);

  return $data;

}
//Set Variables ..
$fname = validate($_POST['first_name']);
$lname = validate($_POST['last_name']);
$email = validate($_POST['email']);
$phonenumber = validate($_POST['telephone']);
$password = validate($_POST['password']);

$sql = "INSERT INTO volunteers (email, first_name, last_name, phone_number, password, status, admins_id_fk )
VALUES ('$email', '$fname', '$lname', '$phonenumber', '$password', 'OnHold', '5')";

$sql2 = "SELECT * FROM volunteers WHERE email='$email'";
$result = mysqli_query($conn, $sql2); //volunteers

if(mysqli_num_rows($result) > 0){
  echo "Email is Already exist! <br>";
  header("Location: ../login.php?error2=email already exist");
}else{
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: ../login.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

}


?>
