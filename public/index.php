<?php

/**
 * Main entry point for the application.
 *
 * This file is loaded by the web server and is responsible for setting up the
 * application environment and routing requests to the appropriate controllers.
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

use App\Database\Connection;

require_once __DIR__ . '/../vendor/autoload.php';

$connection = new Connection();

$pdo = $connection->getPdo();

echo 'Hello World!';
