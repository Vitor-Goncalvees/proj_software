<!DOCTYPE html>
<html>
<head>
    <title>CRUD de PEDIDOS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <a href="home.php">HOME</a>
    <br>
    <h1>Lista de Pedidos</h1>
    <a href="cadastropedi.php">Adicionar Novo Pedido</a>
    <?php
        require ('conexao.php');

        // Função para listar todos os registros do banco de dados
        function listarRegistros($pdo) {
        $sql = "SELECT * FROM pedidos";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        // Listar registros
       
            // Exibindo os dados em uma tabela
          /*  echo "<table border='1'>
                <tr>
                    <th>Nome</th>
                    <th>Numero</th>
                    <th>Empresa</th>
                    <th>Email</th>
                     
                </tr>";
                */
    ?>

    <div>

        <table class="table">
            <thead>
                <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Numero</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Email</th>
                </tr>
            </thead>
        <tbody>

            <?php
             $registros = listarRegistros($pdo);
             foreach ($registros as $registro) {
                echo "<tr>";
                echo "<td>" . $registro['id_pedido'] . "</td>";
                echo "<td>" . $registro['nome'] . "</td>";
                echo "<td>" . $registro['numero'] . "</td>";
                echo "<td>" . $registro['empresa'] . "</td>";
                echo "<td>" . $registro['email'] . "</td>";
                echo "<td>
                    <a href='edit2.php?id=" . $registro['id_pedido'] . "'>Editar</a>
                    <a href='deletepedi.php?id=" . $registro['id_pedido'] . "'>Excluir</a>
                </td>";
                }
                echo "</tr>";
            echo "</table>";
            ?>

        </tbody>
        
        </table>
    </div>
</body>
</html>