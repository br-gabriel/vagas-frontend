<?php
require 'db.php';

function criarVaga($titulo, $descricao, $estado, $cidade, $categoria_id, $link_cadastro) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO vagas (titulo, descricao, estado, cidade, categoria_id, link_cadastro) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$titulo, $descricao, $estado, $cidade, $categoria_id, $link_cadastro]);
}

function listarVagas() {
    global $pdo;
    $stmt = $pdo->query("SELECT v.*, c.nome AS categoria_nome FROM vagas v INNER JOIN categorias c ON v.categoria_id = c.id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function atualizarVaga($id, $titulo, $descricao, $estado, $cidade, $categoria_id, $link_cadastro) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE vagas SET titulo = ?, descricao = ?, estado = ?, cidade = ?, categoria_id = ?, link_cadastro = ? WHERE id = ?");
    $stmt->execute([$titulo, $descricao, $estado, $cidade, $categoria_id, $link_cadastro, $id]);
}

function deletarVaga($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM vagas WHERE id = ?");
    $stmt->execute([$id]);
}
?>
