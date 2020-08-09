<?
require "class/db/Database.php";

$database = new Database();


if(isset($_POST['name']) && isset($_POST['comments']))
{
	$name = $_POST['name'];
	$comments = $_POST['comments'];
}

$database->write($name,$comments);

?>