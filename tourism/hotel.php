<?php 
    include('../db_cn.php');
?>
<html>
    <head>
        <title>住宿</title>
        <link rel="stylesheet" type="text/css" href="../CSS/tourism/hotel.css">
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
			<li>住宿</li>
		</ul>	
        <?php
            $user = 'username';
            $pass = 'password';
            $db = 'database';
            $con = mysqli_connect("localhost", $user, $pass, $db);
            $sql = "SELECT DISTINCT town FROM hotel";
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

	        $query = "SELECT * FROM `hotel` WHERE `town` = '$town'";
	        $query_run = mysqli_query($con,$query);
        ?>
        <p class="center title"><?php echo $town;?></p>
        <div class="container">
        <div class="table-responsive">
        <table class="table">
            <thead class="center">
                <tr class="center">
                    <th height="50px" width="100px" scope="col">type</th>
                    <th height="50px" width="200px" scope="col">name</th>
                    <th height="50px" width="500px" scope="col">address</th>
                    <th height="50px" width="150px" scope="col">phone</th>
                    <th height="50px" width="100px" scope="col">website</th>
                </tr>
            </thead>

            <tbody class="center">
                <?php
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $row)
                        {?>
                            <tr class="center">
                                <td height="50px" width="100px" class="noBorder"><?php echo $row['type']; ?></td> 
                                <td height="50px" width="200px" class="noBorder"><?php echo $row['name']; ?></td> 
                                <td height="50px" width="500px" class="noBorder"><?php echo $row['address']; ?></td>
                                <td height="50px" width="150px" class="noBorder"><?php echo $row['phone']; ?></td>
                                <?php if($row['website'] != "nan"){?>
                                <td height="50px" width="100px" class="noBorder"><a href="<?php 
                                    if($row['website'] != "nan"){
                                        echo $row['website'];}?>">go</a></td>
                                <?php } ?>
                            </tr>
                <?php
                    }
                    }
                }
                ?>
            </tbody>
        </table>
        <footer>
            <p class="footer-text">資料來源：<a href="https://tour-hualien.hl.gov.tw/cl.aspx?n=50">花蓮觀光資訊網</a></p>
        </footer>

        </div>
        </div>
        <!-- 引入footer -->
        <?php include ("../footer/footer.php");?>