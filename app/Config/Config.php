<?php

/**
 * Configuration file for the application.
 *
 * This file contains database connection settings and other configurations.
 * It is loaded by the bootstrap.php file.
 *
 * PHP version 8.3.6
 *
 * @category Configuration
 * @package  App\Config
 * @author   AnaelTech <anael.tech@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @date     2023-06-22
 * @version  GIT: main
 * @link     https://github.com/anaeltech/learnPHP
 */

namespace App\Config;

/**
 * La classe Config contient des méthodes,
 * pour récupérer les informations de configuration.
 *
 * @category Config
 * @package  App\Config
 * @author   AnaelTech <anaelpayetpro@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @date     2023-06-22
 * @link     https://github.com/anaeltech/learnPHP
 */
class Config
{
    /**
     * Retourne les informations de configuration de la base de données.
     *
     * @return array
     */
    public static function getDatabaseConfig(): array
    {
        $config = parse_ini_file(__DIR__ . '/db.ini', true);

        if (!$config || !isset($config['database'])) {
            die('Configuration file is missing or invalid.');
        }

        return $config['database'];
    }
}
