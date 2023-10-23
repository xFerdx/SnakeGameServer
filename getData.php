<?php


$host = "localhost";
$dbname = "snake_users";
$username = "root";
$password = "";
        
$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);


if (mysqli_connect_errno()) {
  die("Connection error: " . mysqli_connect_error());
                    }          

$sql = "select * from users order by score desc limit 10";

$result = mysqli_query($conn,$sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)){
  $data[] = $row;
}

echo json_encode($data);


?>