<?php

declare(strict_types = 1);

function validateForm(string $nome, string $matricula, string $cidade) : bool
{
    if(strlen($nome) < 3){
        $mensagem = 'Nome invalido';
        include '../src/views/components/erro.phtml';
        return false;
    } else if(strlen($matricula) < 6){
        $mensagem = 'Matricula invalida';
        include '../src/views/components/erro.phtml';
        return false;
    } else if(strlen($cidade) < 3){
        $mensagem = 'Cidade invalida';
        include '../src/views/components/erro.phtml';
        return false;
    } else {
        return true;
    }
}