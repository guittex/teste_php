<?php
require_once("../model/banco.php");
class beneficioController{

    private $beneficios;

    public function __construct(){
        $this->beneficios = new Banco();
    }

    public function listarBeneficio(){
        $row = $this->beneficios->getBeneficio();

        foreach ($row as $value){
            echo "<tr>";
            echo "<td>".$value['nome_beneficio'] ."</td>";
            echo "<td>".$value['cod_beneficio'] ."</td>";
            echo "<td>".$value['operadora'] ."</td>";
            echo "<td>".$value['tipo_beneficio'] ."</td>";
            echo "<td>".$value['valor_beneficio'] ."</td>";
            echo "<td>".$value['data_vencimento_contrato']."</td>";
            echo "<td><a class='btn btn-warning m-r-5' href='editar.php?id=".$value['id']."'>Editar</a><a class='btn btn-danger' href='../controller/BeneficioController.php?id=".$value['id']."'>Excluir</a></td>";
            echo "</tr>";
        }
    }

    public function incluirBeneficio($post)
    {
        $nome_beneficio = $post['nome_beneficio'];

        $cod_beneficio = $post['cod_beneficio'];

        $operadora = $post['operadora'];

        $tipo_beneficio = $post['tipo_beneficio'];

        $valor_beneficio = $post['valor_beneficio'];

        $data_vencimento_contrato = $post['data_vencimento_contrato'];

        $result = $this->beneficios->incluirBeneficio($nome_beneficio, $cod_beneficio, $operadora, $tipo_beneficio, $valor_beneficio, $data_vencimento_contrato);

        if($result >= 1){
            echo "<script>document.location='../view/index.php?status=1&msg=Salvo com sucesso'</script>";

        }else{
            echo "<script>document.location='../view/index.php?status=2&msg=Erro ao salvar</script>";

        }
    }

    public function getBeneficio($id)
    {
        $result = $this->beneficios->getBeneficioById($id);

        return $result[0];
    }

    public function editarBeneficio($post)
    {
        $id = $post['id'];

        $nome_beneficio = $post['nome_beneficio'];

        $cod_beneficio = $post['cod_beneficio'];

        $operadora = $post['operadora'];

        $tipo_beneficio = $post['tipo_beneficio'];

        $valor_beneficio = $post['valor_beneficio'];

        $data_vencimento_contrato = $post['data_vencimento_contrato'];

        $result = $this->beneficios->updateBeneficioById($id, $nome_beneficio, $cod_beneficio, $operadora, $tipo_beneficio, $valor_beneficio, $data_vencimento_contrato);

        if($result >= 1){
            echo "<script>document.location='../view/index.php?status=1&msg=Editado com sucesso'</script>";

        }else{
            echo "<script>document.location='../view/index.php?status=2&msg=Erro ao editar</script>";

        }
    }

    public function deletarBeneficio($id)
    {
        $result = $this->beneficios->deleteBeneficioById($id);

        if($result == true){
           
            echo "<script>document.location='../view/index.php?status=1&msg=Deletado com sucesso'</script>";

        }else{
            echo "<script>document.location='../view/index.php?status=2&msg=Deletado ao editar</script>";

        }
    }
}

$beneficio = new beneficioController();

if($_POST['method'] == 'add'){
    $beneficio->incluirBeneficio($_POST);
}
if($_POST['method'] == 'edit'){
    $beneficio->editarBeneficio($_POST);
}
if(isset($_GET['id'])){
    $beneficio->deletarBeneficio($_GET['id']);
}


