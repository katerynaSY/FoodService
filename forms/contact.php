<?php
//Происходит проверка на заполнение контактной формы
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$validate = "success";

if (!$name or !preg_match("/^[a-zA-Z-' ]*$/",$name)) {
  echo "Please, enter your name in English</br>";
  $validate = "fail";
}

if (!$email or !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "Please, enter a correct email address</br>";
  $validate = "fail";
}

if (!$message) {
  echo "Please, fill your message</br>";
  $validate = "fail";
}

if ($validate == "success") {
  $db = mysqli_connect("localhost", "root", "", "orders");
  $query = 'INSERT INTO mycontacts (date, name, email, message) VALUES (NOW(), "'.$name.'", "'.$email.'", "'.$message.'")';
  mysqli_query($db, $query);
  echo "Your message successfully saved. Our employee will send email to you at the short time</br>";
}

?>
