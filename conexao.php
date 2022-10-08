<?php
$servidor='127.0.0.1'; 
$usuario='root';
$senha="sebrae123";
$banco='Script_BD_etec';

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if (isset($_GET['nome'])){

    if($conexao->connect_error){
        echo "Não foi possivel conectar";
        
    }else if(isset($_GET['id-convidado']) && ($_GET['id-convidado'] != "" ) ){
        $id = $_GET['id-convidado'];
        
        $sqlUpdate = "UPDATE tb_convidados SET nome='$_GET[nome]', acompanhantes=$_GET[acompanhante] WHERE id_convidado='$id'";
        $conexao->query ($sqlUpdate);
        $resultado = $conexao->query("SELECT * FROM tb_convidados");
    
    }else{

    $sqlGravar = "INSERT INTO tb_convidados (nome, acompanhantes) VALUES ($_GET[nome]',$_GET[acompanhantes])";    // Boa Partica: Nome dos Comandos em CAIXA ALTA
    $conexao->query ($sqlGravar);
    $resultado = $conexao->query("SELECT * FROM tb_convidados");
    
    }
}else{
    $resultado = $conexao->query("SELECT * FROM tb_convidados");
    // $convidado = array('nome' => "");
}

?>