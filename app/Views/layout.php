<?php

/**
 * Layout principal de l'application.
 *
 * PHP version 8.3.6
 *
 * @category Application
 * @package  App
 * @author   AnaelTech <anael.tech@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @date     2023-06-22
 * @version  GIT: main
 * @link     https://github.com/anaeltech/learnPHP
 */

namespace App\Views;

$content = ob_get_clean();
$title = isset($title) ? $title : 'Learn PHP';
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>

    <?php echo isset($content) ? $content : ''; ?>

  </body>
</html>
