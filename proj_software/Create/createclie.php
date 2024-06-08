<?php
require('conexao.php');




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $tel = $_POST["telefone"];
    $username = $_POST["usuario"];
    $password = $_POST["senha"];

    

    if (inserirRegistro($nome, $cpf, $email, $tel, $username, $password)) {
        echo " <br><br>Registro inserido com sucesso! <br><a href='login.php'>Login</a>";
    } else {
        echo 'Erro ao inserir o registro.';
    }
}

function inserirRegistro($nome, $cpf, $email, $tel,$username, $password) {
    global $pdo;
    try {
        $sql = "INSERT INTO clientes (nome, cpf, email, telefone, username, password) VALUES (:nome, :cpf, :email, :telefone, :username, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);  
    $stmt->bindParam(':telefone', $tel, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);  
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    } catch (\Throwable $th) {
        //throw $th;
    }
   
    return $stmt->execute();
}

?>