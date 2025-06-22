<?php

/**
 * TestCase pour la classe Connection.
 * Ce fichier contient des tests pour la classe Connection.
 *
 * PHP version 8.3.6
 *
 * @category Database
 * @package  App\Database
 * @author   AnaelTech <anaelpayetpro@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @date     2023-06-22
 * @link     https://github.com/anaeltech/learnPHP
 */

namespace App\Database;

use PHPUnit\Framework\TestCase;
use PDO;

/**
 * TestCase pour la classe Connection.
 *
 * @category Database
 * @package  App\Database
 * @author   AnaelTech <anaelpayetpro@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @date     2023-06-22
 * @link     https://github.com/anaeltech/learnPHP
 */
class ConnectionTest extends TestCase
{
    /**
     * Teste la connexion à la base de données.
     *
     * @return void
     */
    public function testConnection(): void
    {
        $connection = new Connection();

        $pdo = $connection->getPdo();

        $this->assertInstanceOf(PDO::class, $pdo);
    }
}
