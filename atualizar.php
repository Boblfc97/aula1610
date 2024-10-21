<?php
    include "conexao.php";
    $codigo = $_POST['cod'];
    $desc = $_POST['desc_nova'];
    $cat = $_POST['cat_nova'];
    $setor = $_POST['setor_novo'];

    //1º Passo - Comando SQL
    $sql = "UPDATE tb_inventarios SET descricao='$desc',
            categoria= '$cat', setor='$setor'
            WHERE codigo='$codigo'";

    //2º Passo - Preparar Conexão
    $atualizar = $pdo->prepare($sql);

    //3º Passo - Tentar Executar
    try{
        $atualizar->execute();
        if($atualizar->rowCount()>=1){
            echo "Atualizado com Sucesso!";
        }else{
            echo "Nenhuma Alteração foi feita!";
        }
    }catch(PDOException $erro){
        echo "Falha ao Atualizar!".$erro->getMessage();
    }
?>