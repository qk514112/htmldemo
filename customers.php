<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "123456", "northwind");

$result = $conn->query("SELECT name, city, country FROM customers");

$outp = "";
while ($rs = $result->fetch_array(MYSQLI_ASSOC)) {
  if ($outp != "") {$outp .= ",";} 
  $outp .= '{"Name":"' . $rs["name"] . '",';
  $outp .= '"City":"' . $rs["city"] . '",';
  $outp .= '"Country":"' . $rs["country"] . '"}';
}
$outp = '{"records":[' . $outp . ']}';

$conn->close();

echo($outp);
?>
