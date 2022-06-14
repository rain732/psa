<?php
include "../connect.php";

function validate($data){

  $data = trim($data);

  $data = stripslashes($data);

  $data = htmlspecialchars($data);

  return $data;

}
//Set Variables ..

$name = validate($_POST['name']);
$email = validate($_POST['email']);
$phonenumber = validate($_POST['phone_number']);
$message = validate($_POST['message']);


$sql = "INSERT INTO contact_form (email, name, phone_number, message)
VALUES ('$email','$name' , '$phonenumber', '$message')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
  header("Location: ../contact_us.php?message=sent");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
