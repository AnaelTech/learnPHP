<?php

/**
 * Script pour lier les vues aux modèles,
 * Inclut les routes de l'application.
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

namespace Core;

/**
 * Script pour lier les vues aux modèles.
 *
 * @category Application
 * @package  App
 * @author   AnaelTech <anael.tech@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @date     2023-06-22
 * @link     https://github.com/anaeltech/learnPHP
 */
class Router
{
    /**
     * Méthode pour lier les routes de l'application.
     *
     * @param string $uri URI de la requête.
     *
     * @return void
     */
    public function dispatch($uri): void
    {
        $parts = explode('/', trim($uri, '/'));

        // Nom du contrôleur (ex: Home → HomeController)
        $controllerName = !empty($parts[0]) ? ucfirst($parts[0]) . 'Controller' : 'HomeController';
        $method = $parts[1] ?? 'index';
        $params = array_slice($parts, 2);

        // Namespace complet du contrôleur
        $fullyQualifiedController = "App\\Controllers\\$controllerName";
        $controllerFile = __DIR__ . "/../app/controllers/$controllerName.php";

        if (file_exists($controllerFile)) {
            include_once $controllerFile;

            if (class_exists($fullyQualifiedController)) {
                $controller = new $fullyQualifiedController();

                if (method_exists($controller, $method)) {
                    call_user_func_array([$controller, $method], $params);
                    return;
                } else {
                    http_response_code(404);
                    echo "⚠️ La méthode <strong>$method</strong> n'existe pas dans $controllerName.";
                    return;
                }
            } else {
                http_response_code(500);
                echo "⚠️ Classe contrôleur <strong>$fullyQualifiedController</strong> introuvable.";
                return;
            }
        }

        http_response_code(404);
        echo "⚠️ Contrôleur <strong>$controllerName</strong> introuvable.";
    }
}
