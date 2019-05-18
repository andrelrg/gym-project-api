<?php

namespace App;

    use Components\Router\Router;

    Router::route(GET, '/heartbeat', 'HeartbeatController', 'ping');
    Router::route(POST, '/createExercice', 'PersonalController', 'createExercice');
