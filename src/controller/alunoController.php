<?php 

//definindo que nesse arquivo será trabalhado os tipos de dados
declare(strict_types=1);

function renderizar(string $nomeDoArquivo, array $dados = null)
{ 
    include "../src/views/components/head.phtml";
    include "../src/views/{$nomeDoArquivo}.phtml";
    // foreach($dados as $dado){
    //     $dado;
    // };
    $dados;
    include "../src/views/components/foot.phtml";
}

function redirecionar(string $onde) : void
{
    header("location : {$onde}");
}

function inicio(): void //estamos declarando que essa funcao "nao tem retorno"
{
    renderizar('inicio');
}

function listar(): void 
{
    if(isset($_GET['id']) && $_GET['id']  != null){
        $alunos = buscarAlunos();
        $aluno = buscarUmAluno($_GET['id']);
        renderizar('listar', [$alunos, $aluno]);
        echo "<script>
        document.getElementById('editModal').style.display = 'block';
        document.getElementById('editModal').style.backgroundColor = '#00000050';
        </script>";
    }else{
        $alunos = buscarAlunos();
        renderizar('listar', [$alunos]);
    }
}

function novo(): void 
{
    renderizar('novo');
    if(!empty($_POST)){
        $nome = trim($_POST['valor_nome']);
        $matricula = trim($_POST['valor_matricula']);
        $cidade = trim($_POST['valor_cidade']);

        $validacao = validateForm($nome, $matricula, $cidade);
        if(!$validacao){
            return;
        } else{
            novoAluno($nome, $matricula, $cidade);
            redirecionar('/listar');
        }
    }
}

function editar(): void
{
    $id = $_GET['id'];
    $aluno = buscarUmAluno($id);
    renderizar('listar', [$aluno]);
    if(!empty($_POST)){
        $nome = trim($_POST['valor_nome']);
        $matricula = trim($_POST['valor_matricula']);
        $cidade = trim($_POST['valor_cidade']);

        $validacao = validateForm($nome, $matricula, $cidade);
        if(!$validacao){
            return;
        } else{
            atualizarAluno($nome, $matricula, $cidade, $id);
            redirecionar('/listar');
        }
    }
}

function excluir() : void
{
    $id = $_GET['id'];
    excluirAluno($id);
    redirecionar('/listar');
}
