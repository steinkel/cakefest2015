<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('Route');

$builder = function ($regex, $controller) {
    return function ($routes) use ($regex, $controller) {
        $extra = ['pass' => ['id'], 'id' => $regex];
        $routes->extensions(['json']);
        $routes->connect('/', ['action' => 'index'], ['_name' => "$controller::index"]);
        $routes->connect('/add', ['action' => 'add'], ['_name' => "$controller::add"]);

        $name = "$controller::";
        $routes->connect(
            '/:id/view',
            ['action' => 'view'],
            $extra
        );
        $routes->connect('/:id/edit', ['action' => 'edit'], $extra);
        $routes->connect('/:id/delete', ['action' => 'delete'], $extra);
    };
};

$scopes = function ($routes) use ($builder) {
    $routes->scope(
        '/questions',
        ['controller' => 'Questions'], $builder(Router::ID, 'Questions')
    );
    $routes->scope(
        '/answers',
        ['controller' => 'Answers'], $builder(Router::ID, 'Answers')
    );
    $routes->scope(
        '/users',
        ['controller' => 'Users'], $builder(Router::ID, 'Users')
    );
};

$languages = ['en', 'es', 'pt'];
foreach ($languages as $lang) {
    Router::scope("/$lang", ['lang' => $lang], $scopes);
}

Router::addUrlFilter(function ($params, $request) {
    if ($request->param('lang')) {
        $params['lang'] = $request->param('lang');
    }
    return $params;
});

Router::scope('/', function ($routes) use ($scopes) {
    $scopes($routes);
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    $routes->fallbacks('InflectedRoute');
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
