<?php  
$host = 'like.loc';
$database = 'links';
$user = 'root';
$password = '';

$pdo = new PDO('mysql:host='.$host .';dbname='.$database.';charset=utf8',$user,$password);
$pdo->exec("SET NAMES utf8");

$id = intval($_POST['id']);
$count = 0;
$message = '';
$error = true;

if($id){
	$query = $pdo->prepare("UPDATE article SET count_like = count_like+1  WHERE id = :id");
    $query->execute(array(':id'=>$id));

    $query = $pdo->prepare("SELECT count_like FROM article WHERE id = :id");
    $query->execute(array(':id'=>$id));
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $count = isset($result['count_like']) ? $result['count_like']  : 0;

    $error = false;
} else {
	$error = true;
	$message = 'Статья не найдена';
};
$out = array(
	'error' => $error,
    'message' => $message,
    'count' => $count,
);
header('Content-Type: text/json; charset=utf-8');
echo json_encode($out);
?>