<?php 
    include('../db_cn.php');
?>
<html>
    <head>
        <title>風景區</title>
        <link rel="stylesheet" type="text/css" href="../CSS/tourism/scene.css">
    </head>

    <body>
        <div id="rightBar">
            <div class="btn" id="shougongBtn"><span><a href="javascript:%20window.scrollTo(0,%200);"><p>go top</p></a></span></div>
        </div>
        <!-- 引入header -->
        <?php include ("../header/header.php");?> 
        <ul class="breadcrumb">
			<li>Home</li>
			<li>觀光業</li>
			<li>風景區</li>
		</ul>	
        <?php
            $user = 'username';
            $pass = 'password';
            $db = 'database';
            $con = mysqli_connect("localhost", $user, $pass, $db);
            $sql = "SELECT DISTINCT town FROM scene";
            $town = mysqli_query ($con, $sql);
        ?>

        <form method="POST" action="" class="center">
            <select name='NEW' class="form">
                    <option value="">選取鄉鎮市區</option>
                    <?php
                        while ($cat = mysqli_fetch_array($town, MYSQLI_ASSOC)):;
                    ?>
                    <option value="<?php echo $cat['town'];?>">
                        <?php echo $cat['town'];?>
                    </option>
                    <?php
                        endwhile;
                    ?>
            </select>
            <input class="button" type="submit" name="Submit" value="Select" />
        </form>
        <?php 
            if(isset($_POST['NEW'])) {
                $town = $_POST['NEW'];

	        $query = "SELECT * FROM `scene` WHERE `town` = '$town'";
	        $query_run = mysqli_query($con,$query);
        ?>
        <p class="center title"><?php echo $town;?></p>
        <?php
            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $row)
                {?>
                    <div style="margin-top:5%;">
                        <pre>
                            <p class="center ti"><?php echo $row['name'];?></p>
                            <?php if($row['des'] != "nan"){?>
                            <p class="center"><?php echo $row['des'];}?></p>
                            <p>電話：<?php echo $row['tel'];?></p>
                            <p>地址：<?php echo $row['address'];?></p>
                            <p>營業時間：<?php echo $row['opentime'];?></p>
                            <?php if($row['ticketinfo'] != "nan"){?>
                            <p>門票資訊：<?php echo $row['ticketinfo'];}?></p>
                        </pre>
                    </div>

                            
        <?php }}}?>
        <footer>
            <p class="footer-text">資料來源：<a href="https://data.gov.tw/dataset/7777">政府資料開放平臺（景點 - 觀光資訊資料庫）</a></p>

        </footer>
        
        <!--<p class="center" style="color:#868B8E; margin: 10px;">資料來源：<a href="https://data.gov.tw/dataset/7777">政府資料開放平臺（景點 - 觀光資訊資料庫）</a><p>-->
        <!-- 引入footer -->
        <?php include ("../footer/footer.php");?>