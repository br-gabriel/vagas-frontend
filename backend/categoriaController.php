<?php
require 'db.php';

function criarCategoria($nome) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO categorias (nome) VALUES (?)");
    $stmt->execute([$nome]);
}

function listarCategorias() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM categorias");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function atualizarCategoria($id, $nome) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE categorias SET nome = ? WHERE id = ?");
    $stmt->execute([$nome, $id]);
}

function deletarCategoria($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM categorias WHERE id = ?");
    $stmt->execute([$id]);
}
?>
