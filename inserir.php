<?php
include "conexao.php";

$desc = $_POST['descricao_digitada'];
$setor = $_POST['setor_selecionado'];
$cat = $_POST['categoria'];
// 1º Passo - Comando SQL
$sql = "INSERT INTO tb_inventarios
        (descricao, setor, categoria) VALUES
        ('$desc', '$setor', '$cat')";
// 2º Passo- Preparar a conexão
$inserir = $pdo->prepare($sql);
// 3º Passo - Tentar executar
try{
    $inserir->execute();
    echo "
        <script>
            alert('Cadastrado com sucesso');
        </script>
    ";
} catch(PDOException $erro){
    echo "Falha ao inserir!".$erro->getMesage();
}
?>