<?

require $_SERVER['DOCUMENT_ROOT'] . "/class/review/review.php";


if(isset($_POST['FORM_RESULT']))
{

	parse_str($_POST["FORM_RESULT"], $input);

	$name = !empty($input['name']) ? $input['name'] : '';
	$comments = !empty($input['text_comment']) ? $input['text_comment'] : '';

	$resReview = new Review();

	if($resReview->writeReview($name, $comments))
	{
		$reviews = $resReview->getReviews();

		echo json_encode(array('name' => $reviews[0]['name'], 'date' => $reviews[0]['date'], 'comments' => $reviews[0]['comments'])); 
	}


}



?>