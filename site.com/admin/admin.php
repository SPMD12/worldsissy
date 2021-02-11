<?php require "../web/db.php";?>
<!DOCTYPE html>
<html>
<head>
	<title>Админка</title>
	<link rel="stylesheet" href="admin.css">
</head>
<body>








<?php  
	
	$arr = [-1, 2, -3, -4, -5, 6, 7, 8, 9];
	$sum = 0;
	foreach ($arr as $value) {
		if ($value > 0) {
			echo $value;
		}
	}
	
?>




<!-- <?php  
	$arr = [2, 5, 9, 15, 0, 4];
	foreach ($arr as $value) {
		if ($value >= 3 and $value <= 10) {
			echo $value . '<br>';
		}
	}
?>
 -->









<!-- <?php  
	$sum = 0;

	while ($i <= 100) {
		$sum += $i;
		$i++;
	}
	echo $sum;
?> -->




<!-- <?php  

	
	$sum = 0;
	for ($i=1; $i <= 100; $i++) { 
		$sum += $i;
	}
	echo $sum . '<br>';

?>
 -->


<!-- <?php  
	
	$i = 0;
	while ($i <= 100) {
		echo $i . '<br>';
		$i+=2;
	}


?> -->


<!-- <?php 
	$arr = ['Коля' => '200', 'Вася' => '300', 'Петя' => '400'];
	foreach ($arr as $key => $value) {
		echo $key . ' ' . '-' . ' Зарплата ' . $value .'<br>';	
	}
	echo '<br>';
?> -->


<!-- <?php 
	$arr = [1, 2, 3, 4, 5];
	$result = 0;
	foreach ($arr as $value) {
		$result = $result + $value;
	}
	echo $result;
?> -->



<!-- <?php 
	$arr = ['html', 'css', 'php', 'js', 'jq'];
	foreach ($arr as $value) {
		echo $value.'<br>';
	}
?> -->

<!-- <div class='wrapper'>
	<div>
		<strong>Добро пожаловать в админку</strong>	
	</div>
	<div>
		<input type="" name="" placeholder="Логин"><br>
		<input type="" name="" placeholder="Пароль"><br>
		<button>Вход</button>
	</div>
</div> -->
</body>
</html>