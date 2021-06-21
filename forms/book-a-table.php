<?php
//Происходит проверка на заполнение формы с заказом
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
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

if (!$phone or !preg_match("/^[0-9\+\-\ ]*$/",$phone)) {
  echo "Please, enter a correct Phone number</br>";
  $validate = "fail";
}

if (!$message) {
  echo "Please, fill your message with order details</br>";
  $validate = "fail";
}

if ($validate == "success") {
  $db = mysqli_connect("localhost", "root", "", "orders");
  $query = 'INSERT INTO myorders (date, name, email, phone, message) VALUES (NOW(), "'.$name.'", "'.$email.'", "'.$phone.'", "'.$message.'")';
  mysqli_query($db, $query);
  echo "Your order successfully saved. Our employee will call to you at the short time</br>";
}

?>
