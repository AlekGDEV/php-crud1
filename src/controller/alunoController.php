<?php 

//definindo que nesse arquivo será trabalhado os tipos de dados
declare(strict_types=1);

function inicio(): void //estamos declarando que essa funcao "nao tem retorno"
{
    include '../src/views/inicio.phtml';
}

function listar(): void 
{
    if(isset($_GET['$id']) && $_GET['$id']  != null){
        $aluno = buscarUmAluno($_GET['$id']);
        $alunos = buscarAlunos();
        include '../src/views/listar.phtml';
    }else{
        $alunos = buscarAlunos();
        include '../src/views/listar.phtml';
    }

}

function novo(): void 
{
    novoAluno();
    include '../src/views/novo.phtml';
}

function editar(): void
{
    $id = $_GET['id'];
    $aluno = buscarUmAluno($id);
    include '../src/views/listar.phtml';
}

function excluir() : void
{
    $id = $_GET['id'];
    excluirAluno($id);
    header('location:/listar');
}
