<?php 

declare(strict_types=1); 

function buscarAlunos() : iterable
{
    $sql = "SELECT * FROM alunos";
    $alunos = abrirConexao()->query($sql);
    return $alunos; 
} 

function novoAluno() : void
{
    if(false === empty($_POST)){
        $nome = $_POST['valor_nome'];
        $matricula = $_POST['valor_matricula'];
        $cidade = $_POST['valor_cidade'];

        $sql = "INSERT INTO alunos (nome, matricula, cidade) VALUES (?,?,?)";
        $query = abrirConexao()->prepare($sql);
        $query->execute([$nome, $matricula, $cidade]);

        header('location: /listar');
    }
}

function buscarUmAluno($id) : iterable
{
    $sql = "SELECT * FROM alunos WHERE idalunos='{$id}'";
    $aluno = abrirConexao()->query($sql);
    return $aluno->fetch(PDO::FETCH_ASSOC);
}

function excluirAluno(string $id) : void
{
    $sql = "DELETE FROM alunos WHERE idalunos='{$id}'";
    abrirConexao()->query($sql);
}