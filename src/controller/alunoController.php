<?php

//definindo que nesse arquivo será trabalhado os tipos de dados
declare(strict_types=1);

function renderizar(string $nomeDoArquivo, array $dados = null)
{
    include dirname(__DIR__) . "/views/components/head.phtml";
    include dirname(__DIR__) . "/views/$nomeDoArquivo.phtml";
    $dados;
    include dirname(__DIR__) . "/views/components/foot.phtml";
    return $dados;
}

function redirecionar(string $onde): void
{
    header("Location:/$onde");
    exit();
}

function inicio(): void //estamos declarando que essa funcao "nao tem retorno"
{
    renderizar('inicio');
}

function listar(): void
{
    $alunos = buscarAlunos();

    if (isset($_GET['id']) && $_GET['id']  != null) {
        $aluno = buscarUmAluno($_GET['id']);
        renderizar('listar', [$alunos, $aluno]);
        echo "<script>
            document.getElementById('editModal').style.display = 'block';
            document.getElementById('editModal').style.backgroundColor = '#00000050';
        </script>";
    } else {
        $dados = renderizar('listar', [$alunos]);
    }
}

function novo(): void
{
    if (!empty($_POST)) {
        $nome = trim($_POST['valor_nome']);
        $matricula = trim($_POST['valor_matricula']);
        $cidade = trim($_POST['valor_cidade']);

        $validacao = validateForm($nome, $matricula, $cidade);
        if (!$validacao) {
            // $mensagem = $_SESSION['erro'];
            // include '../src/views/components/erro.phtml';
            redirecionar('novo');
        } else {
            novoAluno($nome, $matricula, $cidade);
            redirecionar('listar');
        }
    }
    renderizar('novo');
}

function editar(): void
{
    if (!empty($_POST)) {
        $id = $_POST['id'];
        $nome = trim($_POST['valor_nome']);
        $matricula = trim($_POST['valor_matricula']);
        $cidade = trim($_POST['valor_cidade']);

        $validacao = validateForm($nome, $matricula, $cidade);

        if ($validacao) {
            atualizarAluno($nome, $matricula, $cidade, $id);
        }

        redirecionar('listar');
    }
}

function excluir(): void
{
    $id = $_GET['id'];
    excluirAluno($id);
    redirecionar('listar');
}

function salvar(): void
{
    $caminhoDoArquivo = dirname(__DIR__) . "/../public/assets/data/localStorage.json";
    $id = $_GET['id'];
    $aluno = buscarUmAluno($id);

    $alunosSalvos = json_decode(file_get_contents($caminhoDoArquivo));
    if ($alunosSalvos === null) {
        $jsonString = json_encode([$aluno], JSON_PRETTY_PRINT);
    } else {
        $alunoJaSalvo = false;
        foreach ($alunosSalvos as $value) {    
            if ($value->idalunos == $id) {
                $alunoJaSalvo = true;
            }
        }
        if (!$alunoJaSalvo) {
            array_push($alunosSalvos, $aluno);
        }
        $jsonString = json_encode($alunosSalvos, JSON_PRETTY_PRINT);
    }
    file_put_contents($caminhoDoArquivo, $jsonString);
    redirecionar('listar');
}
