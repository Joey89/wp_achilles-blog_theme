<?php

//connect to db
$host = 'localhost';
$user = 'root';
$pass = '';
$table = 'test';

try {
		$conn = new PDO("mysql:host=$host;dbname=$table", $user, $pass);
		 // set the PDO error mode to exception
	    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    }
		catch(PDOException $e){
	    	echo "Connection failed: " . $e->getMessage();
	    }


$email = $_POST['email'];
//check for email exists before insterting to db
$sql = 'SELECT `email` from `users` WHERE `email`="'.$email.'"';
$result = $conn->query($sql);
	//echo 'Email Already Exists';
if($result->rowCount() === 0){

//insert to db

	$sql = 'INSERT INTO `users` VALUES("", "'.$email.'", "t")';
		if ($conn->query($sql)) {
		    echo "New record created successfully";
		} else {
			var_dump($sql);
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
} else {
	echo 'Email already exists';
}

$conn = null; 
?>