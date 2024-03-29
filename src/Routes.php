<?php

namespace App;

    use Components\Router\Router;

    Router::route(GET, '/heartbeat', 'HeartbeatController', 'ping');

    Router::route(POST, '/criarExercicio', 'PersonalController', 'criarExercicio');
    Router::route(GET, '/buscaExercicio', 'PersonalController', 'buscaExercicio');
    Router::route(GET, '/mostrarExercicios', 'PersonalController', 'mostrarExercicios');
    Router::route(POST, '/deletarExercicio', 'PersonalController', 'deletarExercicio');

    Router::route(POST, '/criarTreino', 'PersonalController', 'criarTreino');
    Router::route(GET, '/buscaTreinoAluno', 'PersonalController', 'buscaTreinoAluno');
    Router::route(POST, '/deletarTreino', 'PersonalController', 'deletarTreino');

    Router::route(GET, '/mostrarAparelhos', 'PersonalController', 'mostrarAparelhos');
    Router::route(GET, '/buscaAparelho', 'PersonalController', 'buscaAparelho');
    Router::route(POST, '/adicionarAparelho', 'PersonalController', 'adicionarAparelho');
    Router::route(POST, '/deletarAparelho', 'PersonalController', 'deletarAparelho');

    Router::route(POST, '/criarUsuario', 'AccountController', 'criarUsuario');
    Router::route(POST, '/deletarUsuario', 'AccountController', 'deletarUsuario');
    Router::route(GET, '/buscaAlunos', 'AccountController', 'buscaAlunos');
    Router::route(GET, '/buscaPersonais', 'AccountController', 'buscaPersonais');
    Router::route(GET, '/buscaUsuario', 'AccountController', 'buscaUsuario');
    Router::route(GET, '/login', 'AccountController', 'login');

    Router::route(POST, '/criarAcademia', 'AcademiaController', 'criarAcademia');
    Router::route(GET, '/buscaAcademia', 'AcademiaController', 'buscaAcademia');
    Router::route(GET, '/mostrarAcademias', 'AcademiaController', 'mostrarAcademias');
    Router::route(POST, '/deletarAcademia', 'AcademiaController', 'deletarAcademia');

    Router::route(GET, '/buscaAgendamento', 'AlunoController', 'buscaAgendamento');
    Router::route(POST, '/criarAgendamento', 'AlunoController', 'criarAgendamento');
