<!DOCTYPE html>
<?php
    session_start();
?>
<html>
<html xmlns="http://www.w3.org/1999/xhtml" prefix="foaf: http://xmlns.com/foaf/0.1/
          dc: http://purl.org/dc/terms/
           gr: http://purl.org/goodrelations/v1#
           xsd: http://www.w3.org/2001/XMLSchema#
           og: https://ogp.me/ns#
           ">

<head >
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/github-icon-orange.png" type="image/x-icon">
    <title itemprop="headline" property="dc:title">admin</title>
    <meta itemprop="description" name="description" content="
This is a site for the sale of things... ">

    <!--   CSS style -->
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>

        hr {
            border: none;
            color: #000;
            background-color: #000;
            height: 1px;
        }

    </style>
</head>

<body>
    <?php 
        include('include/connection.php');
        mysqli_query($connection, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
        mysqli_query($connection, "SET CHARACTER SET 'utf8'");
        $sql = mysqli_query($connection, "SELECT SQL_CALC_FOUND_ROWS * FROM `cards`ORDER BY id DESC") or die(mysqli_error($connection));
        $newsData = array();
        while($result = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
            $newsData[] = $result;
        }
    ?>
    <header>
            <div style="margin: auto auto;"><a id="home-site" href="index.php">Home Site</a></div>
            <div id="info-author" style="margin: auto auto;">
            <span id="name-author">Your Name</span>
            <img src="img/avatar1.png" width="52px" height="52px" style="border-radius:26px; margin: 0 auto;" alt="ava">
            </div>
    </header>
    <h2 style="text-align: center; color: #000; font-weight:500; font-size:18px;">Admin Panel</h2>

    <hr>
    <div id="for-form">
        
    <form method="POST" action="include/handler.php" style="color:#000; margin: 0 auto; font-size: 14px;">
        <div style="display:flex; justify-content: space-between; text-align:center; margin: 10px auto;">Цена <input type="text" name="price"></div>
        <div style="display:flex; justify-content: space-between; text-align:center; margin: 10px auto;">Название <input type="text" name="name"></div>
        <div style="display:flex; justify-content: space-between; text-align:center; margin: 10px auto;">Изображение <input type="file" name="img" id="imgAct"></div>
        <div style="display: block; 
    align-items: center; ">
            
            <button type="submit" name="dob" style="position: relative;
left: 40%;" class="button_action">Добавить</button>
            
        </div>
    </form>
    </div>

    <hr>
    <h2 style="text-align:center; font-weight:500; font-size: 18px; margin-bottom: 0px;">Весь каталог</h2>
    <div class="content_main">
        <?php foreach($newsData as $oneNews){ ?>
        <form method="POST" action="include/handler.php" style="margin-top: 0px;">
            <div class="content">
                <a href="#"><?php echo '<img class="content_img" src="img/'.$oneNews['img'].'" alt="first">'?></a>
                <div class="content_name"><?=$oneNews['name_cards'];?></div>
                <div class="content_price" style="margin-left:10px;"><span property="gr:hasCurrency">$</span><span><?=$oneNews['price'];?></span></div>
                <?php echo "<input type='text' name='id' style='display: none;' value='".$oneNews['id']."'>"?>
                <a href="#" class="a_price" rel="foaf:page">
                    <button class="add_cart" style="cursor:pointer;" type="submit" name="delete">Delete</button>
                </a>
            </div>
        </form>
        <?php } ?>

    </div>
</body>

</html>
