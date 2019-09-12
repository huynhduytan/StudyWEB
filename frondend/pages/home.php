<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../bootstrap.php';
// Yêu cầu `Twig` vẽ giao diện được viết trong file `home.html.twig`
echo $twig->render('frontend/pages/home.html.twig');
© 2019 GitHub, Inc.