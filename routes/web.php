<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->group(['namespace' => 'Admin'], function () use ($router) {
        $router->group(['namespace' => 'Conversations'], function () use ($router) {
            $router->get('conversations', 'ConversationController@index');
            $router->post('conversations', 'ConversationController@store');
        });
        $router->group(['prefix' => 'dashboard'], function () use ($router) {
            $router->group(['namespace' => 'Dashboard'], function () use ($router) {
                $router->group(['prefix' => 'total'], function () use ($router) {
                    $router->post('conversation', 'DashboardController@getTotalConversation');
                    $router->post('responded', 'DashboardController@getTotalResponded');
                    $router->post('escalate', 'DashboardController@getTotalEscalate');
                    $router->post('skipped', 'DashboardController@getTotalSkipped');
                    $router->post('comment', 'DashboardController@getTotalComment');
                    $router->post('message', 'DashboardController@getTotalMessage');
                });
                $router->group(['prefix' => 'avg'], function () use ($router) {
                    $router->post('avg_waiting_time','DashboardController@getAvgWaitingTime');
                    $router->post('avg_processing_time','DashboardController@getAvgProcessingTime');
                });
                $router->post('conversations','DashboardController@getConversation');
            });
        });
    });
});
