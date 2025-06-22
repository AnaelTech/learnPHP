<?php

/**
 * Connection.php
 *
 * Ce fichier contient la classe Connection,
 * qui permet de se connecter à la base de données.
 *
 * PHP version 8.3.6
 *
 * @category Database
 * @package  App\Database
 * @author   AnaelTech <anaelpayetpro@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @date     2023-06-22
 * @version  GIT: main
 * @link     https://github.com/anaeltech/learnPHP
 */

namespace App\Database;

use App\Config\Config;
use PDO;
use PDOStatement;

/**
 * La classe Connection permet de se connecter à la base de données.
 *
 * @category Database
 * @package  App\Database
 * @author   AnaelTech <anaelpayetpro@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @date     2023-06-22
 * @link     https://github.com/anaeltech/learnPHP
 */
class Connection
{
    private PDO $_pdo;
    /**
     * Crée une instance de la classe Connection.
     */
    public function __construct()
    {
        $db = Config::getDatabaseConfig();

        $this->_pdo = new PDO(
            'mysql:host=' . $db['DB_HOST'] .
            ';port=' . $db['DB_PORT'] .
            ';dbname=' . $db['DB_NAME'],
            $db['DB_USER'],
            $db['DB_PASSWORD'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
    }

    /**
     * Retourne la connexion PDO.
     *
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->_pdo;
    }

    /**
     * Méthode pour exécuter une requête SQL.
     *
     * @param string $sql    Requête SQL.
     * @param array  $params Paramètres de la requête.
     *
     * @return PDOStatement
     */
    public function query(string $sql, array $params = []): PDOStatement
    {
        $statement = $this->_pdo->prepare($sql);
        $statement->execute($params);

        return $statement;
    }

}
