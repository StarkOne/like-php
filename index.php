<?php  
$host = 'like.loc';
$database = 'links';
$user = 'root';
$password = '';

$pdo = new PDO('mysql:host='.$host .';dbname='.$database.';charset=utf8',$user,$password);
$pdo->exec("SET NAMES utf8");

$query = $pdo->prepare("SELECT * FROM article");
$query->execute();
$articles = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>like</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php if($articles): ?>
		<?php foreach ($articles as $article): ?>
			<div class="like" data-id="<?php print $article['id']?>"><span class="counter"><?php print $article['count_like'] ?></span></div>
	    <?php endforeach; ?>
	<?php endif; ?>
	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
	<script src="script.js"></script>
</body>
</html>