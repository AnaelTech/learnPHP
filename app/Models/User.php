<?php

/**
 * Modèle utilisateur.
 *
 * PHP version 8.3.6
 *
 * @category Application
 * @package  App\Models
 * @author   AnaelTech <anaelpayetpro@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @date     2023-06-22
 * @version  GIT: main
 * @link     https://github.com/anaeltech/learnPHP
 */

namespace App\Models;

/**
 * Modèle utilisateur.
 *
 * @category Application
 * @package  App\Models
 * @author   AnaelTech <anaelpayetpro@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @date     2023-06-22
 * @link     https://github.com/anaeltech/learnPHP
 */
class User
{
    /**
     * Nom de la table.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Nom des colonnes.
     *
     * @var array
     */
    protected $columns = [
        'id',
        'name',
        'email',
        'password',
    ];

    /**
     * Nom des clés primaires.
     *
     * @var array
     */
    protected $primaryKey = 'id';

    /**
     * Nom des clés étrangères.
     *
     * @var array
     */
    protected $foreignKeys = [];

    /**
     * Nom des champs de l'index.
     *
     * @var array
     */
    protected $index = [];
}
