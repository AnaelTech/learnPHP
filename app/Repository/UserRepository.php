<?php

/**
 * Classe pour récupérer les utilisateurs.
 *
 * PHP version 8.3.6
 *
 * @category Application
 * @package  App\Repository
 * @author   AnaelTech <anaelpayetpro@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @date     2023-06-22
 * @version  GIT: main
 * @link     https://github.com/anaeltech/learnPHP
 */

namespace App\Repository;

use App\Database\Connection;

/**
 * Classe pour récupérer les utilisateurs.
 *
 * @category Application
 * @package  App\Repository
 * @author   AnaelTech <anaelpayetpro@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @date     2023-06-22
 * @link     https://github.com/anaeltech/learnPHP
 */
class UserRepository
{
    /**
     * Instance de la connexion à la base de données.
     *
     * @var Connection
     */
    private $_connection;

    /**
     * Constructeur.
     *
     * @param Connection $connection Instance de la connexion à la base de données.
     */
    public function __construct(Connection $connection)
    {
        $this->_connection = $connection;
    }

    /**
     * Méthode pour récupérer les utilisateurs.
     *
     * @return array
     */
    public function getUsers(): array
    {
        $users = $this->connection->query('SELECT * FROM users');

        return $users->fetchAll();
    }

    /**
     * Méthode pour récupérer un utilisateur.
     *
     * @param int $id ID de l'utilisateur.
     *
     * @return array
     */
    public function getUser(int $id): array
    {
        $user = $this->connection->query('SELECT * FROM users WHERE id = ?', [$id]);

        return $user->fetch();
    }


    /**
     * Méthode pour ajouter un utilisateur.
     *
     * @param array $user Données de l'utilisateur.
     *
     * @return bool
     */
    public function addUser(array $user): bool
    {
        $query = $this->connection->query('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
        $query->execute([$user['name'], $user['email'], $user['password']]);

        return $query->rowCount() > 0;
    }


    /**
     * Méthode pour modifier un utilisateur.
     *
     * @param array $user Données de l'utilisateur.
     *
     * @return bool
     */
    public function updateUser(array $user): bool
    {
        $query = $this->connection->query('UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?');
        $query->execute([$user['name'], $user['email'], $user['password'], $user['id']]);

        return $query->rowCount() > 0;
    }


    /**
     * Méthode pour supprimer un utilisateur.
     *
     * @param int $id ID de l'utilisateur.
     *
     * @return bool
     */
    public function deleteUser(int $id): bool
    {
        $query = $this->connection->prepare('DELETE FROM users WHERE id = ?');
        $query->execute([$id]);

        return $query->rowCount() > 0;
    }
}
