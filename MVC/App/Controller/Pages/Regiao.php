<?php
session_start(); // Inicia a sessão

// Função para obter as variáveis POST
function getPostVars() {
    global $_POST;
    return $_POST;  // Retorna todas as variáveis POST
}

// Captura a variável 'regiao' do POST
$regiao = getPostVars()['regiao'] ?? '';

// Armazena a variável 'regiao' na sessão
if (!empty($regiao)) {
    $_SESSION['Regiao'] = $regiao; // Armazena apenas se não estiver vazia
}
?>