<?php

require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TecInfo Unipar</title>

    <?php headCss(); ?>
    
    <style type="text/css">
        body {
            background-color: #efefef;
            padding-top: 40px;
            padding-bottom: 40px;
          }

          .container {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
          }
    </style>
  </head>
  <body>

      <div class="container">
          
          <h2 class="form-signin-heading">Faça seu login</h2>

          <form class="form-signin" role="form" method="post" action="login.php">
              <div class="form-group">
                  <label for="femail" class="sr-only">Email: </label>
                  <input type="email" class="form-control" id="femail" name="email" placeholder="Endereço de e-mail">
              </div>

              <div class="form-group">
                  <label for="fsenha" class="sr-only">Senha: </label>
                  <input type="password" class="form-control" id="fsenha" name="senha" placeholder="Senha">
              </div>

              <button type="submit" class="btn btn-primary btn-block">Fazer login</button>
          </form>

      </div>

      <script src="./lib/jquery.js"></script>
      <script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>