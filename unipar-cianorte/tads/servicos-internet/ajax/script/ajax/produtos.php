<?php

require '../config.php';

$con = Conexao::getInstance();

$sql = "Select
    idproduto,produto,preco
    From produto";

$resultado = $con->query($sql);

$produtos = $resultado->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($produtos);