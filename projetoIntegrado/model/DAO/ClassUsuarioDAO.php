<?php

require_once 'Conexao.php';
class ClassUsuarioDAO {
    public function cadastrar(ClassUsuario $cadastrarUsuario) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "insert into usuario (nome, email) values (?,?)";
            $stmt = $pdo -> prepare($sql);
            $stmt -> bindValue(1, $cadastrarUsuario -> getNome());
            $stmt -> bindValue(2, $cadastrarUsuario -> getEmail());
            $stmt -> execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc -> getMessage();
        }
    }
}