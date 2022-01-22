
<!DOCTYPE html>
<?php
    session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" prefix="foaf: http://xmlns.com/foaf/0.1/
          dc: http://purl.org/dc/terms/
           gr: http://purl.org/goodrelations/v1#
           xsd: http://www.w3.org/2001/XMLSchema#
           og: https://ogp.me/ns#
           ">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/github-icon-orange.png" type="image/x-icon">
    <title itemprop="headline" property="dc:title">Экспресс</title>
    <meta itemprop="description" name="description" content="
This is a site for the sale of things... ">

    <!--   CSS style -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/home.css"> 
    
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   
   <style>

    /* свойства модального окна по умолчанию */
    .modal {
      position: fixed;
      /* фиксированное положение */
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background: rgba(0, 0, 0, 0.5);
      /* цвет фона */
      z-index: 1050;
      opacity: 0;
      /* по умолчанию модальное окно прозрачно */
      -webkit-transition: opacity 400ms ease-in;
      -moz-transition: opacity 400ms ease-in;
      transition: opacity 400ms ease-in;
      /* анимация перехода */
      pointer-events: none;
      /* элемент невидим для событий мыши */
    }

    /* при отображении модального окно */
    .modal:target {
      opacity: 1;
      pointer-events: auto;
      overflow-y: auto;
    }

    /* ширина модального окна и его отступы от экрана */
    .modal-dialog {
      position: relative;
      width: auto;
      margin: 10px;
    }

    @media (min-width: 576px) {
      .modal-dialog {
        max-width: 500px;
        margin: 30px auto;
      }
    }

    /* свойства для блока, содержащего контент модального окна */
    .modal-content {
      position: relative;
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
      -ms-flex-direction: column;
      flex-direction: column;
      background-color: #fff;
      -webkit-background-clip: padding-box;
      background-clip: padding-box;
      border: 1px solid rgba(0, 0, 0, .2);
      border-radius: .3rem;
      outline: 0;
    }

    @media (min-width: 768px) {
      .modal-content {
        -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
      }
    }

    /* свойства для заголовка модального окна */
    .modal-header {
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-align: center;
      -webkit-align-items: center;
      -ms-flex-align: center;
      align-items: center;
      -webkit-box-pack: justify;
      -webkit-justify-content: space-between;
      -ms-flex-pack: justify;
      justify-content: space-between;
      padding: 15px;
      border-bottom: 1px solid #eceeef;
    }

    .modal-title {
      margin-top: 0;
      margin-bottom: 0;
      line-height: 1.5;
      font-size: 1.25rem;
      font-weight: 500;
    }

    /* свойства для кнопки "Закрыть" */
    .close {
      float: right;
      font-family: sans-serif;
      font-size: 24px;
      font-weight: 700;
      line-height: 1;
      color: #000;
      text-shadow: 0 1px 0 #fff;
      opacity: .5;
      text-decoration: none;
    }

    /* свойства для кнопки "Закрыть" при нахождении её в фокусе или наведении */
    .close:focus,
    .close:hover {
      color: #000;
      text-decoration: none;
      cursor: pointer;
      opacity: .75;
    }

    /* свойства для блока, содержащего основное содержимое окна */
    .modal-body {
      position: relative;
      -webkit-box-flex: 1;
      -webkit-flex: 1 1 auto;
      -ms-flex: 1 1 auto;
      flex: 1 1 auto;
      padding: 15px;
      overflow: auto;
    }
               table {
            width: 100%; /* Ширина таблицы */
            background: white; /* Цвет фона таблицы */
            color: black; /* Цвет текста */
            border-spacing: 1px; /* Расстояние между ячейками */
           }
           td, th {
            background: white; /* Цвет фона ячеек */
            padding: 5px; /* Поля вокруг текста */
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
    <!--  navigation  -->
    <nav class="nav">
        <div class="container">
            <div class="navig">
                <il><a class="nav__a" itemprop="url" rel="foaf:page" href="index.php">Главная</a></il>
                <il><a class="nav__a" itemprop="url" rel="foaf:page" href="table.html">Контакты</a></il>
                <il><a class="nav__a" itemprop="url" rel="foaf:page" href="about.html">О нас</a></il>
            </div>
        </div>
    </nav>
    <!-- header -->
    <header class="header">
        <div class="container">
            <div style="display: flex; height: 30px; margin: auto 75px;">
                <img src="img/telephone.svg" alt="telephone svg" style="width: 26px; height:25px">
                <div class="number_telphone" style="padding: 0 10px;"><a itemprop="telephone" href="tel:+375296532270">+375296532270</a></div>
            </div>
            <div style="margin: auto auto;">
                <div class="name_site">
                    <!--link to site: #-->
                    <a class="sitename" href="index.php" itemprop="name">ОДО "Экспресс"</a>
                    <link itemprop="address" content="Belarus, Gomel">
                </div>
            </div>
            <div class="cart-product" style="margin: auto 25px; display: flex">

                
                <!--cart(may be made working with js)-->
                <div class="cart">
                    <span class="cart-number">01</span>
                    <div class="container">
    <div style="text-align: center;">
    <a href="#openModal"><img src="img/cart-white.png" alt="cart"></a>
    </div>
    <div id="openModal" class="modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Ваши товары</h3>
            <a href="#close" title="Close" class="close">×</a>
            
          </div>
          <div class="modal-body">
            <?php
            if (isset($_POST['badr'])) {
                $id = (int)$_POST['id'];
                $id_element = 0; 

                $result = mysqli_query($connection, "SELECT * FROM `cards` WHERE id = $id");
                while ( $record = mysqli_fetch_assoc( $result ))
                    {
                        $id_element = $record['id'];
                        echo "<table>
                            <tr>
                                <td><img class='content_img' src='img/". $record['img']. "' alt='first'>
                                </td>
                                <td>".$record['name_cards']."</td>
                                <td>".$record['price']."</td>
                                <td>4</td>
                            </tr></table>";
                    }
                }
            ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
                </div>
                <!--total price(may be made working with js)-->
                <div class="price" style="margin-left:10px;"><a href="login.php">Вход</a></div>
                <div class="price" style="margin-left:10px;">
                    <?php
                        if(empty($_SESSION['name'])){
                            echo "Вы не авторизованны";
                        }
                        else echo $_SESSION['name'];
                    ?>
                </div>
            </div>
        </div>
    </header>

    <!-- slider(or static photo) -->
    <a href="#catalog"><section class="slider"></section></a>

 <section class="news">
        <div class="container_block">
            <h3 class="title_news">Услуги</h3>
            <div class="news-content">
                <div class="block-news">
                    <h2>Декоративная штукатурка</h2>
                    <h3>Title of the news</h3>
                    <h4>1 september 2021</h4>
                    <a href="#">More Info</a>
                    <p style="margin: 0px"><img src="img/2.png" alt=""></p>
                </div>
                <div class="block-news">
                    <h2>Шпатлевка,грунтовка</h2>
                    <p>Грунтовка для штукатурки стен, представляет собой непрозрачную жидкость без характерного запаха, а грунтование – это процесс нанесения и распределения данной жидкости на используемую поверхность.</p>
                    <p style="margin: 0px"><img  height="200px;" src="img/gr.jpg" alt=""></p>
                    <h3>Цену уточняйте</h3>
                    <button class="btn-form" name="btn-form">Написать &#128172;</button>
                </div>
                <div class="block-news">
                    <h2>News №3</h2>
                    <h3>Offline events</h3>
                    <h4>21 april 2021</h4>
                    <a href="#">More Info</a>
                    <p style="margin: 0px"><img src="img/4.png" alt=""></p>
                </div>
                <div class="block-news">
                    <h2>News №4</h2>
                    <h3>Qui officia deserunt</h3>
                    <h4>17 march 2021</h4>
                    <a href="#">More Info</a>
                    <p style="margin: 0px"><img src="img/3.png" alt=""></p>
                </div>
            </div>
        </div>
    </section>
    <section class="catalog" id="catalog">
        <div class="container_block">
            <div class="navigation_catalog">
                <il><a class="navig_catalog_active" href="#">Каталог</a></il>   
            </div>
            <!-----------------------------main content-------------------->
            <div class="content_main">
                <?php foreach($newsData as $oneNews){ ?>
                    <form method="POST" action="">
                        <div class="content" typeof="gr:Offering">
                            <a href="#"><?php echo '<img class="content_img" src="img/'.$oneNews['img'].'" alt="first"><textarea name="id" style="display: none;">'.
                                $oneNews['id'].
                            '</textarea>'?></a>
                            <div class="content_name" property="gr:name"><?=$oneNews['name_cards'];?></div>
                            <div class="content_price" property="gr:hasPriceSpecification" typeof="gr:UnitPriceSpecification" style="margin-left:10px;"><span property="gr:hasCurrency">$</span><span property="gr:hasCurrencyValue"><?=$oneNews['price'];?></span></div>
                                <div class="add_cart">
                                    <input name="badr" type="submit" value="В корзину">&#128722;
                                </div>
                        </div>
                    </form>
                <?php } ?>

            </div>
        </div>
    </section>
    <!-- footer -->
    <footer class="footer" style="bottom:0;">
        <div class="container">
            <div class="social_network">
                <p style="color: white; font-weight: bold;">Social Network:</p>
                <p>
                    <a href="https://vk.com/ferqileo" target="_blank"><img src="img/vk-icon.png" alt="Vk" title="VK"></a>
                </p>
            </div>
            <div class="footer_info" typeof="Person" style="text-align: center;">
                <p id="footer_date_create"><time datetime="2021-10-24">Date of creation:</time> <span property="dc:created">2021-11-05</span></p>
                <!--  in JS contains  -->
                <p id="footer_date">Today's date:</p>
            </div>
            <div class="owner">
                <p id="footer_author">Createor: <span property="name">VLADOS</span></p>
                <!--version-->
                <p id="footer_version">Version: 0.3a</p>
            </div>
        </div>


    </footer>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
      var scrollbar = document.body.clientWidth - window.innerWidth + 'px';
      console.log(scrollbar);
      document.querySelector('[href="#openModal"]').addEventListener('click', function () {
        document.body.style.overflow = 'hidden';
        document.querySelector('#openModal').style.marginLeft = scrollbar;
      });
      document.querySelector('[href="#close"]').addEventListener('click', function () {
        document.body.style.overflow = 'visible';
        document.querySelector('#openModal').style.marginLeft = '0px';
      });
    });
  </script>
    <script src="js/index.js"></script>
</body></html>
