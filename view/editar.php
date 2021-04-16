<?php 
require_once("../controller/BeneficioController.php");
$beneficio = new beneficioController();  

$result = $beneficio->getBeneficio($_GET['id']);
?>

<!DOCTYPE html>
<html>
    <?php include("head.php") ?>
    <body>
        <div class="row">
            <div class="col-md-12">
                <a href="index.php" class="btn float-r margin btn-primary">Voltar</a>
            </div>
            <div class="col-md-12">
                <form  method="post" action="../controller/BeneficioController.php">
                    <div class="form-group">
                        <input type="hidden" name="method" value="edit">
                        <input type="hidden" name="id" value="<?= $result['id'] ?>">
                        <input class="form-control" type="text" value='<?= $result['nome_beneficio'] ?>' id="nome_beneficio" name="nome_beneficio" placeholder="Nome do Beneficio" required>
                        <input class="form-control" type="number" value=<?= $result['cod_beneficio'] ?> id="cod_beneficio" name="cod_beneficio" placeholder="Código do Beneficio">
                        <input class="form-control" type="text" value='<?= $result['operadora'] ?> 'id="operadora" name="operadora" placeholder="Operadora">
                        <input class="form-control" type="text" value='<?= $result['tipo_beneficio'] ?>' id="tipo_beneficio" name="tipo_beneficio" placeholder="Tipo de Beneficio">
                        <input class="form-control" type="number" value=<?= $result['valor_beneficio'] ?> id="valor_beneficio" name="valor_beneficio" placeholder="Valor do Beneficio">
                        <input class="form-control" type="date" value=<?= $result['data_vencimento_contrato'] ?> id="data_vencimento_contrato" name="data_vencimento_contrato" placeholder="Data do Vencimento do Contrato">
                    </div>
                    <div class="form-group margin">
                        <button type="submit" class="btn btn-success float-r">Editar</button>
                    </div>
                </form>
            </div>
        </div>     
    </body>
</html>