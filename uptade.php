<?php
require '/var/www/vendor/autoload.php';

$name = $_POST['name'];
$newAge = $_POST['new_age'];

$connection = new MongoDB\Client("mongodb://root:mongopwd@mongo:27017");

$db = $connection->gettingstarted;
$col = $db->users;

$col->updateOne(
    ['name' => $name],
    ['$set' => ['age' => $newAge]]
);

echo "Dado de usuario alterado com sucesso.<br>";


$record = $col->find(['name' => $name]);
foreach ($record as $user) {
    echo "Nome: " . $user['name'] . '<br>';
    echo "Idade: " . $user['age'] . '<br>';
}
?>