<?php

session_start();
$rota = explode('?', $_SERVER['REQUEST_URI']);
$rota = $rota[0];

//usando require_once pq esse arquivo é importante, e nao pode jamais ser duplicado
require_once dirname(__DIR__) . '/src/controller/alunoController.php';
require_once dirname(__DIR__) . '/src/connection/conexao.php';
require_once dirname(__DIR__) . '/src/repository/alunoRepository.php';
require_once dirname(__DIR__) . '/src/validation/alunoValidator.php';


$paginas = [
    '/' => 'inicio',
    '/listar' => 'listar',
    '/novo' => 'novo',
    '/editar' => 'editar',
    '/excluir' => 'excluir',
    '/salvar' => 'salvar',
];

include dirname(__DIR__) . '/src/views/menu.phtml';
include dirname(__DIR__) . '/src/views/components/erro.phtml';

if (false === isset($paginas[$rota])) {
    include dirname(__DIR__) . '/src/views/erro404.phtml';
    exit;
} 

echo $paginas[$rota]();