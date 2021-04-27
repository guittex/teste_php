<?php
class Banco{
    protected $mysqli;

    public function __construct()
    {
        $this->conexao();
    }

    private function conexao()
    {
        $servidor = 'localholt';
        $usuario = "root";
        $senha = "root";
        $dbname = "teste";

        $this->mysqli = new mysqli($servidor, $usuario, $senha, $dbname);
    }

    public function getBeneficio()
    {
        $result = $this->mysqli->query("SELECT * FROM beneficio_teste");

        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }

        return $array;
    }

    public function incluirBeneficio($nome_beneficio, $cod_beneficio, $operadora, $tipo_beneficio, $valor_beneficio, $data_vencimento_contrato)
    {
        $con = $this->mysqli->prepare("INSERT INTO beneficio_teste (`nome_beneficio`, `cod_beneficio`, `operadora`, `tipo_beneficio`, `valor_beneficio`, `data_vencimento_contrato`) VALUES (?,?,?,?,?,?)");
       
        $con->bind_param("ssssss",$nome_beneficio, $cod_beneficio, $operadora, $tipo_beneficio, $valor_beneficio, $data_vencimento_contrato);
        
        if($con->execute() == TRUE){
            return true;

        }else{
            return false;

        }
    }

    public function getBeneficioById($id)
    {
        $result = $this->mysqli->query("SELECT * FROM beneficio_teste where id = $id");

        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }

        return $array;
    }

    public function updateBeneficioById($id, $nome_beneficio, $cod_beneficio, $operadora, $tipo_beneficio, $valor_beneficio, $data_vencimento_contrato)
    {
        $con = $this->mysqli->prepare("UPDATE `beneficio_teste` SET `nome_beneficio` = ?, `cod_beneficio`=?, `operadora`=?, `tipo_beneficio`=?, `valor_beneficio`=?,`data_vencimento_contrato` = ? WHERE `id` = ?");
        
        $con->bind_param("sssssss",$nome_beneficio, $cod_beneficio, $operadora, $tipo_beneficio, $valor_beneficio, $data_vencimento_contrato,$id);

        if($con->execute() == TRUE){
            return true;

        }else{
            return false;

        }
    }

    public function deleteBeneficioById($id)
    {
      
        if($this->mysqli->query("DELETE FROM `beneficio_teste` WHERE `id` = '".$id."' ") == TRUE){
            return true;

        }else{
            return false;

        }
    }
}

