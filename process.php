
<?php
//  echo "<pre>";
//  print_r($_POST);
//  echo "</pre>";

include 'config.php';
include 'lib.php';

$db = dbConnect();


$nick = quote_smart($_POST['nick']);
$scores = quote_smart($_POST['scores']);
$upgrades = quote_smart($_POST['upgrades']);

//insert, update, select, delete
$query1 = "INSERT INTO nick VALUES ('', '$nick')";
$query2 = "INSERT INTO scores VALUES ('', '$scores')";
$query3 = "INSERT INTO upgrades VALUES ('', '$upgrades')";
$result = insertQuery($query1 , $query2 , $query3);


 dbClose($db);

echo "entry saved";

?>