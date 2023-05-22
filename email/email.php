<?php
    $user = 'username'; /* database user name */
    $pass = 'password'; /* database user password */
    $db = 'database'; /* database name */
    $con = mysqli_connect("localhost", $user, $pass, $db);
?>

<html>
    <head>
        <title>意見回饋</title>
    </head>

    <body>
        <!-- 引入header -->
        <?php include ("../header/header.php");?> 
        <style><?php include '../CSS/email.css';?></style>  
        <ul class="breadcrumb">
			<li>Home</li>
			<li>意見回饋</li>
		</ul>	   
        <form id="form" name="form" method="post" class="center">

            <!-- ########### 表單 ########### -->
            <textarea type="text" id="form" name="form" cols="30" rows="10" placeholder="leave your message"></textarea>
            
            <!-- ########### button ########### -->
            <br>
            <input class="button" type="submit" name="Submit" value="ok" />
            <div class="center">
            <?php
                if(isset($_POST['Submit'])) { /* if 按下按鈕 */
                    if(isset($_POST['form']) && !empty($_POST['form'])){ /* 檢查是否有輸入內容 */
                        $text = $_POST['form'];
                        $sql_insert = "INSERT INTO `form` (`text`) VALUES ('{$text}')"; /* sql語法(把表單內容傳到資料庫) */
                        mysqli_query($con, $sql_insert);
                    }
                    else{
                        echo "<p>欄位不可為空:(</p>";
                    }
                }

            ?>
            
        <!-- 引入footer -->
        <?php include ("../footer/footer.php");?>