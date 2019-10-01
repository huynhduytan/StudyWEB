<?php

 require_once __DIR__ . '/../../bootstrap.php';
 include_once(__DIR__ . '/../../dbconnect.php');
 echo $twig->render('frontend/pages/gioithieu.html.twig');
?>
<a href="./../index.php">Trang chu</a>