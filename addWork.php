<?php 
	session_start();
 ?>
<?php 
	$con = mysqli_connect('127.0.0.1', 'root', '', 'project1');
	$queryy = mysqli_query($con, "SELECT * FROM students WHERE id='{$_SESSION["id"]}'");
	$stroka = $queryy->fetch_assoc(); 
	$img_direct = "img/"; //папку куда сохранять файл
	$img_name = $img_direct . basename($_FILES['file']['name']); // путь куда сохранится файл с полным названием
	$upload = move_uploaded_file($_FILES['file']['tmp_name'], $img_name);
	$query = mysqli_query($con, "INSERT INTO works (description, img, user) 
		VALUES ('{$_POST['desc']}', '{$img_name}', '{$stroka["id"]}')");
	header( 'Location: accountStudent.php');
?>