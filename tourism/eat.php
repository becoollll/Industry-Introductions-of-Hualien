<html>
    <head>
        <title>飲食</title>
            <script
    src="https://maps.googleapis.com/maps/api/js?key=API_KEY_HERE&callback=initMap&v=weekly"
    defer
  ></script>
  <script
    src="https://maps.googleapis.com/maps/api/js?key=API_KEY_HERE&callback=initMap&v=weekly"
    defer
  ></script>
        <link rel="stylesheet" type="text/css" href="../CSS/tourism/eat.css">
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
			<li>飲食</li>
		</ul>	
        
        <?php
            $user = 'username';
            $pass = 'password';
            $db = 'database';
            $con = mysqli_connect("localhost", $user, $pass, $db);
            $sql = "SELECT DISTINCT town FROM eat";
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
                if($town == "豐濱鄉"){
                    $file = "fb";
                }
                if($town == "鳳林鎮"){
                    $file = "fl";
                }
                if($town == "花蓮市"){
                    $file = "hl";
                }
                if($town == "吉安鄉"){
                    $file = "ja";
                }
                if($town == "瑞穗鄉"){
                    $file = "rs";
                }
                if($town == "新城鄉"){
                    $file = "sc";
                }
                if($town == "壽豐鄉"){
                    $file = "sf";
                }
                if($town == "秀林鄉"){
                    $file = "sl";
                }
                if($town == "光復鄉"){
                    $file = "gf";
                }
                if($town == "玉里鎮"){
                    $file = "yl";
                }?>
                <p class="center title"><?php echo $town;?></p>
                
                <?php include ("eat/$file.php");

	            $query = "SELECT * FROM `eat` WHERE `town` = '$town'";
	            $query_run = mysqli_query($con,$query);
        ?>

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
                        </pre>
                    </div>

                            
        <?php }}}?>
        <!--<p class="center" style="color:#868B8E; margin-bottom: 2%;">資料來源：<a href="https://data.gov.tw/dataset/7779">政府資料開放平臺（餐飲 - 觀光資訊資料庫）</a><p>-->

        <footer>
            <p class="footer-text">資料來源：<a href="https://data.gov.tw/dataset/7779">政府資料開放平臺（餐飲 - 觀光資訊資料庫）</a></p>
        </footer>

        <!-- 引入footer -->
        <?php include ("../footer/footer.php");?>
    