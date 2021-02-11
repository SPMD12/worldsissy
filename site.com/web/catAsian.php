<?php include ('../templates/header.html.twig');?> <!-- Меню навигации шапка -->
<!DOCTYPE html>
<html>
<head>
  <title>Большие члены и SISSY девочки | shemale порно видео | worldsissy.com</title>
  <meta name="description" content="SISSY Девочки обслуживают большие члены парней ежедневно, без отдыха, ведь для SISSY сосать большой член одно удовольствие, которое, она ни на что не променяет!">
  <meta name="keywords" content="sissy, sissy порно, sissy porn, ебут транса, shemale, big dick, sissy porno, член транса, shemale sissy, красивые трансы, трансы видео">
</head>
<body>
  <div class="wrapper">
    <div class="contentVideo">
      <?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Сообщает о том какая именно ошибка произошла
$count = 30;// Количест во записей на странице
$page = $_GET["page"];// Узнаём номер страницы
$mysqli = new mysqli("localhost", "world_sissy", "world_sissy", "world_sissy");// Подключаемся к базе данных
$category = 'BigDick';
$page = (isset($_GET['page']) && $_GET['page'] > 0) ? round($_GET['page']) : 1;
$shift = $count * ($page - 1);// Смещение в LIMIT. Те записи, порядковый номер которого больше этого числа, будут выводиться.
$result_set = $mysqli->query("SELECT * FROM `posts` WHERE `video_categories` = \"$category\" ORDER BY id DESC LIMIT $shift, $count");// Делаем выборку $count записей, начиная с $shift + 1.



$directory = '../video'; //название папки с видео
$allowed_types=array('mp4','avi','flv','mov');  //разрешеные типы видео
$file_parts=array();
$ext='';
$title='';
$i=0;
//пробуем открыть папку
// $dir_handle = @opendir($directory) or die("There is an error with your image directory!");
// while ($file = readdir($dir_handle))  //поиск по файлам
// {
// if($file=='.' || $file == '..') continue; //пропустить ссылки на другие папки
// $file_parts = explode('.',$file);  //разделить имя файла и поместить его в массив
// $ext = strtolower(array_pop($file_parts));  //последний элеменет - это расширение
 $title = implode('.',$file_parts);  
 $title = htmlspecialchars($title);  
// $nomargin='';

while ($row = $result_set->fetch_assoc()) {
  echo 
  '<div class="videoStyle">
  <span class="videoName">    
  <a href=" '.$directory.'/'.$row['video_name'].'" title="'.$row['title'].'"><strong>'.$row['title'].'</strong></a>
  </span>
  <a href="'.$directory.'/'.$row['video_name'].'">
  <video width="180" src="'.$directory.'/'.$row['video_name'].'">'.$row['title'].'</video></a>   
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
  $url = "/web/catAsian.php";
  $url_page = "/web/catAsian.php?page=";
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
      <?php if ($i == $active) { ?><span><?=$i?></span><?php } else { ?><a href="<?php if ($i == 1) { ?><?=$url?><?php } else { ?><?=$url_page.$i?><?php } ?>"><?=$i?></a><?php } ?>
    <?php } ?>
    <?php if ($active != $count_pages) { ?>
      <a href="<?=$url_page.($active + 1)?>" title="Следующая страница">&gt;</a>
      <!-- <a href="<?=$url_page.$count_pages?>" title="Последняя страница">< &gt;&gt;&gt;</a> -->
    <?php } ?>
  </div>
</div>
<?php } ?>



<?php include ('../templates/footer.html.twig');?>
</body>
</html>
