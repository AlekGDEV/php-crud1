<?php

declare(strict_types = 1);

function validateForm(string $nome, string $matricula, string $cidade) : bool
{
    $mensagem = '';

    if(strlen($nome) < 3){
        $mensagem = 'Nome invalido';
    } else if(strlen($matricula) < 6){
        $mensagem = 'Matricula invalida';
    } else if(strlen($cidade) < 3){
        $mensagem = 'Cidade invalida';
    }

    $_SESSION['erro'] = $mensagem;

    return $mensagem == '';
}