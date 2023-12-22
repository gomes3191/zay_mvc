<?php

/*
 * Autor: FAGA
 * O ponto de partida para a estrutura.
 */

require_once '../app/Utility/ErrorControl.php';

require_once '../vendor/autoload.php';

require_once '../app/core/bootstrap.php';


use App\Core\{Router, Request, App};

session_start();

//Se não estivermos no modo de produção, exibiremos erros no navegador da Web.
if (!App::get('config')['options']['production']) {
	display_errors();
}

//É aqui que carregamos as rotas do arquivo de rotas.
Router::load('../app/routes.php')->direct(Request::uri(), Request::method());
