<?php
require '../config/db.php';
$db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);$pass = md5('s3cr37');
$query = "insert into user (username, password,first_name,last_name,dob,email,date)";
$query .= "values ('admin','$pass','System','Admin',STR_TO_DATE('01-12-1991','%d-%m-%Y'),'admin@email.com',CURDATE())";
echo $query."<br>";
if($db->query($query) === true){
	echo 'User inserted ';
} else echo 'something wrong ';
 ?>
