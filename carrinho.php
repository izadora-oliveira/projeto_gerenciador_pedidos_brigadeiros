<!DOCTYPE html>
<html lang="en">

<?php include("header.php"); ?>

<body>
<?php 
include("navbar.php");
require("getItensCarrinho.php"); 
?>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">Itens</h5>
      <table class="table">
        <thead class="table-light">
            <tr>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">Preço</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $cont = 0;
          $total = 0;
          foreach ($itenscarrinho as $item)
          {
            $itenscarrinho = explode('#', $item);
            ?>
            <tr>
            <form method="post" action="excluir.php">
              <?php
              echo "<td name ='codigo' class='table-Default'>";
              echo "<input type='hidden' name='codigo' id='codigo' value='$itenscarrinho[0]'/>$itenscarrinho[0]";
              echo "</td>";
              echo "<td name='nome' class='table-Default'>";
              echo "<input type='hidden' name='nome' id='nome' value='$itenscarrinho[1]'/>$itenscarrinho[1]";
              echo "</td>";
              echo "<td name='preco' class='table-Default'>";
              echo "<input type='hidden' name='preco' id='preco' />$itenscarrinho[2]";
              echo "</td>";
              echo "<td name='quantidade' class='table-Default'>";
              echo "<input type='hidden' name='quantidade' id='quantidade'value='$itenscarrinho[3]'/>$itenscarrinho[3]";
              echo "</td>";
              echo "<td name='subtotal' class='table-Default'>";
              echo "<input type='hidden' name='subtotal' id='subtotal'value='$itenscarrinho[4]'/>$itenscarrinho[4]";
              echo "</td>";
              echo "<td name='excluir' class='table-Default'>";
              echo "<button type='submit' class='btn btn-danger btn-sm'>Excluir</button>";
              echo "</td>";
              $total += $itenscarrinho[4];
              ?> 
            </form>
            </tr>
            <?php
          }
          ?>
          </thead>
        </tbody>
      </table>
      <div>
        <h5 class="card-title">Total <?php echo $total ?></h5>
        <p class="card-text"></p>
      </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Informações Pedido</h5>
        <form method="post" action="cadastroPedido.php">
          <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name='nome' class="form-control" id="nome">
          </div>
          <div class="mb-3">
            <label for="endereco" class="form-label">Endereço de Entrega</label>
            <input type="text" name='endereco' class="form-control" id="endereco">
          </div>
          <div class="mb-3">
            <label for="dataentrega" class="form-label">Data da Entrega</label>
            <input type="date" name='dataentrega' class="form-control" id="dataentrega">
          </div>
          <div class="mb-3">
            <label for="hora" class="form-label">Horário da Entrega</label>
            <input type="time" name='hora' class="form-control" id="hora">
          </div>
          <div class="mb-3">
            <label for="observacao" class="form-label">Observação</label>
            <input type="text" name='observacao' class="form-control" id="observacao" rows="3"></input>
          </div>
          <button type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>