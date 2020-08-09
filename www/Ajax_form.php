<?
echo($_POST);

require $_SERVER['DOCUMENT_ROOT'] . "/class/review/review.php";


if(isset($_POST['name']) && isset($_POST['comments']))
{
	$name = $_POST['name'];
	$comments = $_POST['comments'];

	$resReview = new Review();
$resReview->writeReview($name, $comments);
}

?>