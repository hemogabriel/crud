<?php

	require '/var/www/vendor/autoload.php';

	$name = $_POST['name'];
	$age = $_POST['age'];
	
	//test the post data
	echo "<p>Name: $name and Age: $age</p>";
	
	$connection = new MongoDB\Client("mongodb://root:mongopwd@mongo:27017");
	
	$db = $connection->gettingstarted;
	$col = $db->users;
	
	
	$deleteResult = $col->deleteOne(['name' => $name]);

if ($deleteResult->getDeletedCount() > 0) {
    echo "Usuario deletado com sucesso.";
} else {
    echo "Usuario não encontrado";
}
	
	
	
?>
