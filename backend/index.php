<?php
require 'usuarioController.php';
require 'vagaController.php';
require 'categoriaController.php';

// Exemplo de criação
criarUsuario('admin', 'admin', true);
criarCategoria('Tecnologia');
criarVaga('Desenvolvedor PHP', 'Descrição da vaga', 'Paraná', 'Curitiba', 1, 'https://exemplo.com');

// Listar tudo
print_r(listarUsuarios());
print_r(listarCategorias());
print_r(listarVagas());
?>