<?php require_once("../controller/BeneficioController.php");?>

<!DOCTYPE html>
<html lang="pt-br">
   <?php include("head.php"); ?>
    <body>
        <div class="row">
            <div class="col-md-12">
                <?php if($_GET['status'] == 1) : ?>
                    <div class="alert alert-success text-center" role="alert">
                        <?= $_GET['msg'] ?>
                    </div>
                <?php endif; ?>
                <?php if($_GET['status'] == 2) : ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <?= $_GET['msg'] ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-12">
                <a href="cadastro.php" class="btn float-r margin btn-success">Cadastar</a>
            </div>         
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nome Beneficio</th>
                            <th>COD Beneficio</th>
                            <th>Operadora</th>
                            <th>Tipo Beneficio</th>
                            <th>Valor Beneficio</th>
                            <th>Data Vencimento Contrato</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $beneficio = new beneficioController();  

                        $beneficio->listarBeneficio();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
