<?php include ('../templates/header.html');?>
  <!-- Меню навигации шапка -->
  <!DOCTYPE html>
  <html>

  <head>
    <title>Мир SISSY девочек | SISSY ЛИСБИЯНКИ ПОРНО ВИДЕО | worldsissy.com</title>
    <meta name="description" content="Горячие порно-сцены от SISSY лисбиянок, которые удовлетворяют друг друга, своими маленькими SISSY члениками.">

    <meta name="keywords" content="sissy лисбиянки, групповое shemale порно, две shemale, group sissy, cute sissy, teens shemale, транс ебал транса, транс трахает транса">
  </head>

  <body>
    <div class="wrapper">
      <div class="contentVideo">
        <?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Сообщает о том какая именно ошибка произошла
$count = 20;// Количест во записей на странице
$page = $_GET["page"];// Узнаём номер страницы
$category = 'SissyLisbians';
$page = (isset($_GET['page']) && $_GET['page'] > 0) ? round($_GET['page']) : 1;
$shift = $count * ($page - 1);// Смещение в LIMIT. Те записи, порядковый номер которого больше этого числа, будут выводиться.
$result_set = $mysqli->query("SELECT * FROM `posts` WHERE `video_categories` = \"$category\" ORDER BY id DESC LIMIT $shift, $count");// Делаем выборку $count записей, начиная с $shift + 1.



$directory = '../video'; //название папки с видео
$allowed_types=array('mp4','avi','flv','mov');  //разрешеные типы видео
$file_parts=array();
$ext='';
$title='';
$i=0;
$title = implode('.',$file_parts);  
$title = htmlspecialchars($title);  

while ($row = $result_set->fetch_assoc()) {
  echo 
  '<div class="videoStyle">
  <span class="videoName">    
  <a href=" '.$directory.'/'.$row['video_name'].'" title="'.$row['title'].'"><strong>'.$row['title'].'</strong></a>
  </span>
  <a href="'.$directory.'/'.$row['video_name'].'">
  <video width="100%" height="100%" src="'.$directory.'/'.$row['video_name'].'">'.$row['title'].'</video></a>   
  </div>';
  $i++; 
  }
// }
// closedir($dir_handle);  // закрыть папку
?>
      </div>
    </div>

    <?php
  /* Входные параметры */
  $count_pages = 2;
  $active = $page; 
  $count_show_pages = 5;
  $url = "/web/catSissyLisbians.php";
  $url_page = "/web/catSissyLisbians.php?page=";
  if ($count_pages > 1) { // Всё это только если количество страниц больше 1
    /* Дальше идёт вычисление первой выводимой страницы и последней (чтобы текущая страница была где-то посредине, если это возможно, и чтобы общая сумма выводимых страниц была равна count_show_pages, либо меньше, если количество страниц недостаточно) */
    $left = $active - 1;
    $right = $count_pages - $active;
    if ($left < floor($count_show_pages / 2)) $start = 1;
    else $start = $active - floor($count_show_pages / 2);
    $end = $start + $count_show_pages - 1;
    if ($end > $count_pages) {
      $start -= ($end - $count_pages);
      $end = $count_pages;
      if ($start < 1) $start = 1;
    }
?>
      <!-- Дальше идёт вывод Pagination -->
      <div class="paginationWrapper">
        <div class="pagination">
          <!-- <span>Страницы: </span> -->
          <?php if ($active != 1) { ?>
            <!-- <a href="<?=$url?>" title="Первая страница">&lt;&lt;&lt;</a> -->
            <a href="<?php if ($active == 2) { ?><?=$url?><?php } else { ?><?=$url_page.($active - 1)?><?php } ?>" title="Предыдущая страница">&lt;</a>
            <?php } ?>
              <?php for ($i = $start; $i <= $end; $i++) { ?>
                <?php if ($i == $active) { ?><span><?=$i?></span>
                  <?php } else { ?>
                    <a href="<?php if ($i == 1) { ?><?=$url?><?php } else { ?><?=$url_page.$i?><?php } ?>">
                      <?=$i?>
                    </a>
                    <?php } ?>
                      <?php } ?>
                        <?php if ($active != $count_pages) { ?>
                          <a href="<?=$url_page.($active + 1)?>" title="Следующая страница">&gt;</a>
                          <!-- <a href="<?=$url_page.$count_pages?>" title="Последняя страница">< &gt;&gt;&gt;</a> -->
                          <?php } ?>
        </div>
      </div>
      <?php } ?>

        <?php include ('../templates/footer.html');?>
  </body>

  </html>