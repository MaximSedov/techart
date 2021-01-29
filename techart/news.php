<?php include_once "main.php" ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>techart.ru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12  news-block mt-5">
                <div class="row news-block__header pb-3 pt-3">
                    <div class="col-md-12">
                    <h1 class="news-block__header-text">Новости</h1> 
                    </div>
                </div>
                <div class="row news-block__content">
                    <?php 
                        $news = mysqli_query($db_connect, "SELECT * FROM `news` ORDER BY `idate` DESC LIMIT {$offset}, {$news_on_page}");
                        while ($post = mysqli_fetch_assoc($news)){?>
                        <div class="col-md-12 news-block__content-block pb-3">
                        <span class="news-block__content-date"><?php echo gmdate("d-m-Y", $post['idate']); ?></span> <a href="/techart/view.php?id=<?php echo $post['id'];?>" class="news-block__content-header"><?php echo $post['title'];?></a> <br>
                        <span class="news-block__content-text"><?php echo $post['announce'];?></span>
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <div class="row news-block__pagination pb-3 pt-3">
                    <div class="col-md-12">
                        <h4 class="news-block__pagination-header">Страницы:</h4> 
                        <?php
                            for ($i = 1; $i <= $total_pages; $i++){
                                if ($page == $i) {
                                    echo "<a href='/techart/news.php?page=".$i."' class='btn btn-light news-block__pagination-content disabled'  role='button' data-bs-toggle='button'>". $i ."</a>";
                                } else {
                                    echo "<a href='/techart/news.php?page=".$i."' class='btn btn-light news-block__pagination-content ' role='button' data-bs-toggle='button'>". $i ."</a>";
                                }
                                
                            }
                        ?>

                        </div>
                </div>


            </div>

        </div>
            
    </div>
</body>
</html>