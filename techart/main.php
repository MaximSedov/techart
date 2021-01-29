<?php

$db_user = "root";
$db_pass = "root";
$db_name = "techart.ru";

//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$db_connect = mysqli_connect("127.0.0.1",$db_user, $db_pass, $db_name );

$news_on_page = 5; // новостей на странице
$page = 1;

if (isset($_GET['page'])) {
    $page = (int) $_GET['page'];
}

$total_news_all = mysqli_query($db_connect, "SELECT COUNT(`id`)  AS `total_news` FROM  `news`"); // всего новостей в базе
$total_news = mysqli_fetch_assoc($total_news_all)['total_news'];
$total_pages = ceil($total_news / $news_on_page); // целочисленное количество страниц с новостями

$offset = ($news_on_page * $page) - $news_on_page;
?>