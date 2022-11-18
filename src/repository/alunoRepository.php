<?php 

declare(strict_types=1); 

function buscarAlunos() : iterable
{
    $sql = "SELECT * FROM alunos";
    $alunos = abrirConexao()->query($sql);
    return $alunos; 
} 

function novoAluno(string $nome, string $matricula, string $cidade) : void
{
    $sql = "INSERT INTO alunos (nome, matricula, cidade) VALUES (?,?,?)";
    $query = abrirConexao()->prepare($sql);
    $query->execute([$nome, $matricula, $cidade]);
}

function buscarUmAluno($id) : iterable
{
    $sql = "SELECT * FROM alunos WHERE idalunos='{$id}'";
    $aluno = abrirConexao()->query($sql);
    return $aluno->fetch(PDO::FETCH_ASSOC);
}
function atualizarAluno(string $nome, string $matricula, string $cidade, string $id): void
{

    $sql = "UPDATE alunos SET nome=?, matricula=?, cidade=? WHERE id=?";
    $query = abrirConexao()->prepare($sql);
    $query->execute([$nome, $matricula, $cidade,$id]);
}
function excluirAluno(string $id) : void
{
    $sql = "DELETE FROM alunos WHERE idalunos='{$id}'";
    abrirConexao()->query($sql);
}