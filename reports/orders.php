<?php
//для отображения сегодняшней формы заказа
$db = mysqli_connect("localhost", "root", "", "orders");
$sql = 'SELECT * FROM `myorders` WHERE DATE(`date`) = CURDATE()';

$result = $db->query($sql);

if ($result->num_rows > 0) {
  // output data of each row (выходные данные каждой строки)
  while($row = $result->fetch_assoc()) {
    echo "</br><b>id:</b> " . $row["id"]. "  </br><b>Date:</b> " . $row["date"]. " </br><b>Name:</b> " . $row["name"]. " </br><b>Email:</b> " . $row["email"].  " </br><b>Phone:</b> " . $row["phone"]. " </br><b>Message:</b> " .  $row["message"]. "<br></br>";
  }
} else {
  echo "0 results";
}
$db->close();

?>
