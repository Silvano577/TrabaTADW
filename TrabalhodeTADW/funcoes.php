<?php


function criar_usuario($conexao, $id, $nome_usuario, $email, $senha) {
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuarios (id, nome_usuario, email, senha) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'isss', $id, $nome_usuario, $email, $senha_hash);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $resultado;
}
function buscar_usuario($conexao, $idusuario, $nome) {
    $sql = "SELECT * FROM usuarios WHERE id = ? OR nome_usuario LIKE ?";
    $stmt = mysqli_prepare($conexao, $sql);
    $nome = "%$nome%";
    mysqli_stmt_bind_param($stmt, 'is', $idusuario, $nome);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $usuarios = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);
    return $usuarios;
}
function atualizar_usuario($conexao, $idusuario , $nome_usuario, $email , $senha) {}
function deletar_usuario($conexao, $idusuario) {}
function listar_usuarios($conexao) {}

function criar_cliente($conexao, $id, $nome, $idade, $endereco, $fone) {
    $sql = "INSERT INTO clientes (id, nome, idade, endereco, fone) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'issss', $id, $nome, $idade, $endereco, $fone);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $resultado;
}
function buscar_cliente($conexao, $idcliente, $nome) {
    $sql = "SELECT * FROM clientes WHERE id = ? OR nome LIKE ?";
    $stmt = mysqli_prepare($conexao, $sql);
    $nome = "%$nome%";
    mysqli_stmt_bind_param($stmt, 'is', $idcliente, $nome);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $clientes = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);
    return $clientes;
}
function atualizar_cliente($conexao, $idcliente, $nome, $idade, $indereco, $fone ) {}
function deletar_cliente($conexao, $idcliente) {}
function listar_clientes($conexao) {}

function criar_pedido($conexao, $id, $id_cliente, $id_pizza, $id_bebida) {
    $sql = "INSERT INTO pedidos (id, id_cliente, id_pizza, id_bebida) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'iiii', $id, $id_cliente, $id_pizza, $id_bebida);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $resultado;
}
function buscar_pedido($conexao, $id_pedido) {
    $sql = "SELECT * FROM pedidos WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id_pedido);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $pedido = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($stmt);
    return $pedido;
}
function atualizar_pedido($conexao, $id_pedido, $id_cliente, $id_pizza, $id_bebida ) {}
function deletar_pedido($conexao, $id_pedido) {}
function listar_pedidos($conexao) {}

function registrar_pagamento($conexao, $id, $form_pagamento, $valor) {
    $sql = "INSERT INTO pagamentos (id, forma_pagamento, valor) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'isd', $id, $form_pagamento, $valor);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $resultado;
}
function buscar_pagamento($conexao, $idpagamento) {
    $sql = "SELECT * FROM pagamentos WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $idpagamento);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $pagamento = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($stmt);
    return $pagamento;
}
function atualizar_pagamento($conexao, $id, $form_pagamento, $valor) {}
function cancelar_pagamento_estorno($conexao, $idpagamento, $idpedido) {}
function listar_pagamentos($conexao) {}

function registrar_feedback($conexao, $id, $assunto, $comentario) {
    $sql = "INSERT INTO feedbacks (id, assunto, comentario) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'iss', $id, $assunto, $comentario);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $resultado;
}
function buscar_feedback($conexao, $idfeedback) {
    $sql = "SELECT * FROM feedbacks WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $idfeedback);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $feedback = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($stmt);
    return $feedback;
}
function atualizar_feedback($conexao, $id, $assunto, $comentario ) {}
function deletar_feedback($conexao, $idfeedback) {}
function listar_feedbacks($conexao) {}

function adi_ingrediente($conexao, $id, $nome, $quantidade) {
    $sql = "INSERT INTO ingredientes (id, nome, quantidade) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'isi', $id, $nome, $quantidade);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $resultado;
}
function buscar_ingredientes($conexao, $idingredientes, $nome) {
    $sql = "SELECT * FROM ingredientes WHERE id = ? OR nome LIKE ?";
    $stmt = mysqli_prepare($conexao, $sql);
    $nome = "%$nome%";
    mysqli_stmt_bind_param($stmt, 'is', $idingredientes, $nome);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $ingredientes = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);
    return $ingredientes;
}
function atualizar_ingrediente($conexao, $id, $nome, $quantidade) {}
function remover_ingrediente($conexao, $idingredientes) {}
function listar_ingredientes($conexao) {}

function associar_ingrediente_pizza($conexao, $ingre_idingre, $pizza_idpizza) {}
function buscar_ingredientes_pizza($conexao, $pizza_idpizza) {}
function remover_ingrediente_pizza($conexao, $ingre_idingre, $pizza_idpizza) {}
function listar_ingredientes_pizza($conexao) {}

function adicionar_estoque($conexao, $id, $nome, $quantidade, $limite) {
    $sql = "INSERT INTO estoque (id, nome, quantidade, limite) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'isii', $id, $nome, $quantidade, $limite);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $resultado;
}
function buscar_estoque($conexao, $idestoque, $nome) {
    $sql = "SELECT * FROM estoque WHERE id = ? OR nome LIKE ?";
    $stmt = mysqli_prepare($conexao, $sql);
    $nome = "%$nome%";
    mysqli_stmt_bind_param($stmt, 'is', $idestoque, $nome);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $estoques = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);
    return $estoques;
}
function atualizar_estoque($conexao, $id, $nome, $quantidade, $limite) {}
function remover_estoque($conexao, $idestoque) {}
function listar_estoques($conexao) {}

function criar_pizza($conexao, $id, $variedade, $tamanho, $peso, $quantidade, $preco) {
    $sql = "INSERT INTO pizzas (id, variedade, tamanho, peso, quantidade, preco) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'issdii', $id, $variedade, $tamanho, $peso, $quantidade, $preco);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $resultado;
}
function buscar_pizza($conexao, $id_pizza, $variedade) {
    $sql = "SELECT * FROM pizzas WHERE id = ? OR variedade LIKE ?";
    $stmt = mysqli_prepare($conexao, $sql);
    $variedade = "%$variedade%";
    mysqli_stmt_bind_param($stmt, 'is', $id_pizza, $variedade);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $pizzas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);
    return $pizzas;
}
function atualizar_pizza($conexao, $id, $variedade, $tamanho, $peso, $quantidade, $preco) {}
function deletar_pizza($conexao, $id_pizza) {}
function listar_pizzas($conexao) {}

function criar_promocao($conexao, $id, $nome, $desconto, $vantagem) {
    $sql = "INSERT INTO promocoes (id, nome, desconto, vantagem) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'isds', $id, $nome, $desconto, $vantagem);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $resultado;
}
function buscar_promocao($conexao, $id_promocao, $nome) {
    $sql = "SELECT * FROM promocoes WHERE id = ? OR nome LIKE ?";
    $stmt = mysqli_prepare($conexao, $sql);
    $nome = "%$nome%";
    mysqli_stmt_bind_param($stmt, 'is', $id_promocao, $nome);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $promocoes = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);
    return $promocoes;
}
function atualizar_promocao($conexao, $id, $nome, $desconto, $vantagem) {}
function remover_promocao($conexao, $id_promocao) {}
function listar_promocoes($conexao) {}

function cadastrar_bebida($conexao, $id, $variedade, $tamanho, $preco, $quantidade) {
    $sql = "INSERT INTO bebidas (id, variedade, tamanho, preco, quantidade) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'issdi', $id, $variedade, $tamanho, $preco, $quantidade);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $resultado;
}
function buscar_bebidas($conexao, $idbebida, $variedade) {
    $sql = "SELECT * FROM bebidas WHERE id = ? OR variedade LIKE ?";
    $stmt = mysqli_prepare($conexao, $sql);
    $variedade = "%$variedade%";
    mysqli_stmt_bind_param($stmt, 'is', $idbebida, $variedade);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $bebidas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);
    return $bebidas;
}
function atualizar_bebida($conexao, $id, $variedade, $tamanho, $preco, $quantidade) {}
function deletar_bebida($conexao, $id_bebida) {}
function listar_bebidas($conexao) {}

function cadastrar_entregador($conexao, $id, $nome, $cpf, $numero, $marca_moto) {
    $sql = "INSERT INTO entregadores (id, nome, cpf, numero, marca_moto) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'issss', $id, $nome, $cpf, $numero, $marca_moto);
    $resultado = mysqli_stmt_execute($stmt); 
    mysqli_stmt_close($stmt);  
    return $resultado; 
}
function buscar_entregador($conexao, $id_entregador, $nome) {
    $sql = "SELECT * FROM entregadores WHERE id = ? OR nome LIKE ?";
    $stmt = mysqli_prepare($conexao, $sql);
    $nome = "%$nome%";
    mysqli_stmt_bind_param($stmt, 'is', $id_entregador, $nome);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $entregadores = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);
    return $entregadores;
}
function atualizar_entregador($conexao, $id, $nome, $cpf, $numero, $marca_moto) {}
function remover_entregador($conexao, $id_entregador) {}
function listar_entregadores($conexao) {}

function criar_delivery($conexao, $id, $endereco_entrega, $tempo_entrega, $id_pedido, $id_entregador) {}
function buscar_delivery($conexao, $id_delivery) {
    $sql = "SELECT * FROM deliveries WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id_delivery);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $delivery = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($stmt);
    return $delivery;
}
function atualizar_delivery($conexao, $id, $endereco_entrega, $tempo_entrega, $id_pedido, $id_entregador ) {}
function cancelar_delivery($conexao, $id_delivery) {}
function listar_deliveries($conexao) {}

?>

