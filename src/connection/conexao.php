<?php 

function abrirConexao (): PDO
{
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '1234';
    $banco = 'ativ1';

    $conexao = new PDO("mysql:host={$servidor};dbname={$banco}", $usuario, $senha);

    return $conexao;
}