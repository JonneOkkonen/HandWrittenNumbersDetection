<?php
if(isset($_GET['label']) && isset($_GET['data'])) {
	$username = "username";
	$password = "password";
	try {
		$dbConnection = new PDO('mysql:host=localhost;dbname=AI;charset=utf8',$username, $password);
	}catch(PDOException $e) {
                echo "ErrMsg to enduser!<hr>";
        	echo "CatchErrMsg: " . $e->getMessage() . "<hr>";
        }
	$sql = "INSERT INTO numbers0_9(label, data) VALUES(:label, :data)";
	$result = $dbConnection->prepare($sql);
	$result->bindValue(':label', $_GET['label'], PDO::PARAM_STR);
	$result->bindValue(':data', $_GET['data'], PDO::PARAM_STR);
	$result->execute();
	if($result->rowCount() == 1) {
		echo "OK";
	}else {
		echo "Error";
	}

}else {
	echo "Missing parameters";
}
?>
