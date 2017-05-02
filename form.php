<?php
	session_start();
	if (isset($_POST['submit'])) {
		if ($_SESSION['userAuth'] == @$_POST['userAuth']) {
			echo "验证成功";
			// echo "<script>alert('true');</script>";
		} else {
			echo "验证失败";	
			// echo "<script>alert('false');</script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>form-demo</title>
</head>
<body>
	<form action="" method="post">
		<div>
			<p><input name="userAuth" type="text">
			<img border="0" style='cursor:pointer;' src="test.php" onclick="this.src='test.php?'+new Date().getTime();">
			<a href="javascript:void(0)" onclick="document.getElementById('img_rand').src='./test.php?r='+Math.random();">看不清?</a>
			<img id="img_rand" src="test.php?r=<?php echo rand(); ?>"></p>
		</div>
		<p>
			<input name="submit" type="submit" value="点击提交">
		</p>
	</form>
</body>
</html>