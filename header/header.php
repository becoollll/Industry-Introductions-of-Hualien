<!-- header(包含導覽列)所有頁面共用 -->
<!DOCTYPE html>
<html>
	<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="../header/style.css">
		<script src="https://kit.fontawesome.com/fc383a6465.js" crossorigin="anonymous"></script>
	</head>

	<body>
		<nav>
			<h4> 花蓮產業介紹網 </h4>
			
			<ul>
				<li><a href="../main/main.php">home</a></li>
				<li><a href="#">水泥業 <i class="fas fa-chevron-down"></i></a>
					<ul>
						<li><a href="../cement/company.php">水泥企業</a></li>
						<li><a href="../cement/news.php">相關新聞、文章</a></li>
					</ul>
				</li>
        <li><a href="#">觀光旅遊業 <i class="fas fa-chevron-down"></i></a>
					<ul>
						<li><a href="../tourism/scene.php">風景區</a></li>
            			<li><a href="../tourism/hotel.php">住宿</a></li>
						<li><a href="../tourism/eat.php">飲食</a></li>
					</ul>
				</li>
        <li><a href="#">漁業 <i class="fas fa-chevron-down"></i></a>
					<ul>
						<li><a href="../fishery/ground.php">定置漁場</a></li>
						<li><a href="../fishery/news.php">相關新聞、文章</a></li>
					</ul>
				</li>
        <li><a href="../email/email.php">意見回饋</a></li>
			</ul>
		</nav>