<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$periodo = (int) $_GET['periodo'];

$ativo = isset($_GET['ativo']) ? 1 : 0;
$agrupar = isset($_GET['agrupar']) ? 1 : 0;

$sql = "Select
  v.idvenda,
  c.idcliente,
  c.nome cliente,
  vi.precopago, vi.qtd
From venda v
Inner Join cliente c
  On c.idCliente = v.idCliente
Inner Join vendaitem vi
  On vi.idvenda = v.idvenda";

// Where
$where = array();
$where[] = "(v.status = '" . VENDA_FECHADA . "')";

# http://php.net/manual/en/function.strtotime.php
# http://php.net/manual/en/datetime.formats.relative.php
// $periodo = 1;
// $where[] = "(v.data >='" . date('Y-m-d', $periodo) . "')";


$sql .= "\nWhere ".join(' and ',$where);

// Group By

echo '<pre>' . $sql . '</pre>';

exit;

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compras por cliente</title>

    <?php headCss(); ?>
  </head>
  <body>

<?php include 'nav.php'; ?>

<div class="container">

<div class="page-header">
  <h1><i class="fa fa-reorder"></i> Compras por cliente</h1>
</div>

<div class="panel panel-default">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Cliente</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $consulta = mysqli_query($con,$sql);
        while($resultado = mysqli_fetch_assoc($consulta)){
      ?>
      <tr>
        <td><?php echo $resultado['idvenda']; ?></td>
        <td><?php echo $resultado['clienteNome']; ?></td>
        <td>R$ <?php echo number_format($resultado['precoTotal'], 2, ",", "."); ?></td>
      </tr>
        <?php } ?>
    </tbody>
  </table>
</div>

</div>

<script src="./lib/jquery.js"></script>
<script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>