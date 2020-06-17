<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    echo '<title>' . $PageSettings['name'] . '</title>';
    ?>
    <!--all css files-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../../../cms/Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../cms/Assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../cms/Assets/css/slick.min.css">
    <link rel="stylesheet" href="../../../cms/Assets/css/animate.css">
    <link rel="stylesheet" href="../../../cms/Assets/css/magnific.pupup.css">
    <link rel="stylesheet" href="../../../cms/Assets/css/sweet.alert.css">
    <link rel="stylesheet" href="../../../cms/Assets/css/slicknav.css">
    <link rel="stylesheet" href="../../../cms/Assets/css/main.css"> <!-- main stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

<!-- start .preloader -->
<div class="preloader">
    <div class="inner text-center">
        <span class="preloader-spin"></span>
    </div>
</div>
<!-- end .preloader -->

<div class="site_wrap">
    <div class="eco--header--wraper eco--header--2 eco--white--style">
        <div class="eco--header--top">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="eco--logo">
                            <a href="/">CosmicDevelop</a>
                        </div>
                    </div>
                    <div class="col-md-10 eco--menu--column--1 eco--menu--col">
                        <nav class="eco--main--menu">
                            <ul>
                                <li><a href="/">Главная</a></li>
                                <li class="current-menu-item"><a>Категории</a>
                                    <ul class="sub-menu">
                                        <?php

                                        foreach ($CategoryServices as $category){
                                            echo '<li><a href="/category/' . $category['id']  . '">' . $category['name'] . '</a></li>';
                                        }

                                        ?>
                                    </ul>
                                </li>
                                <li><a href="#contact">Контакты</a></li>
                                <li><a href="/review">Отзывы</a></li>
                                <li><a href="#">О Нас</a></li>


                                <?php
                                if (!$PageSettings['authUser']) {

                                    echo '<li class="current-menu-item"><a href="/cms/login/">Авторизоваться</a>';
                                    echo '<ul class="sub-menu">';
                                    echo '<li><a href="/cms/register/">Зарегистрироваться</a></li>';
                                    echo '</ul></li>';
                                }else{
                                    if($PageSettings['params']) {
                                        echo '<li><a href="#">Статус заказа: В работе.</a></li>';
                                    }
                                    echo '<li class="current-menu-item"><a href="/cms/po/">Личный кабинет</a>';
                                    echo '<ul class="sub-menu">';
                                    echo '<li><a href="/cms/logout/">Выйти</a></li>';
                                    echo '</ul></li>';
                                }
                                ?>


                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div> <!-- end .eco-header-top -->
    </div> <!-- end .eco-header-wraper -->
