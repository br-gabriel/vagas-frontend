<?php
require 'db.php';

function criarUsuario($username, $senha, $isAdmin) {
    global $pdo;
    $hash = password_hash($senha, PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT INTO usuarios (username, senha, is_admin) VALUES (?, ?, ?)");
    $stmt->execute([$username, $hash, $isAdmin]);
}

function listarUsuarios() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM usuarios");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function atualizarUsuario($id, $username, $isAdmin) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE usuarios SET username = ?, is_admin = ? WHERE id = ?");
    $stmt->execute([$username, $isAdmin, $id]);
}

function deletarUsuario($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);
}
?>
