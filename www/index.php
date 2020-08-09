<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="js/ajax.js"></script>
</head>
<body>
<?php include ("header.php"); ?>

<?
	$review = new Review(); 
	$allarray = $review->getReviews();
?>

<?
if (!empty($allarray)):
?>

	<div class="comment_group">
	
		<?
		foreach ($allarray as $key => $value): 
		?>
	
			<div class="comment_box">
			
				<?
				if (!empty($value['name'])):
				?>
					<div class="name"><? echo $value['name']; ?></div>
				<?
				endif;
				?>
	
				<?
				if (!empty($value['date'])):
				?>
					<div class="data"><? echo $value['date']; ?></div>
	
				<?
				endif;
				?>
	
				<?
				if (!empty($value['comments'])):
				?>		
					<div class="comment_text"><? echo $value['comments']; ?></div>	
				<?
				endif;
				?>
			</div>


			<div class="comment_box_app">
				<div class="name"></div>
				<div class="data"></div>
				<div class="comment_text"></div>
				
			</div>
		<?
		endforeach;
		?>
	</div>

<?
endif;
?>

<form id="myform" name="comment" action="js/handler.php" method="POST">
	<hr>
	<h3>Оставить комментарий</h3>
	<p>
		<label>Ваше имя</label><br>
		<input id="name" type="text" name="name">
	</p>
	<p>
		<label>Ваш комментарий</label><br>
		<textarea id="comments" name="text_comment"></textarea>
	</p>
	<input id="btn" type="submit" value="Отправить">
</form>

<?php include ("footer.php");?>	
</body>
</html>
