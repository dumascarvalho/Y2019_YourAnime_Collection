<article>
    <?php if (isset($_POST['submit'])) {
        include("./includes/database.php");

        $mysqli = abrirConexao();

        $query = 'SELECT * FROM usuario 
        WHERE usuario = ? and senha = ?';

        $stmt = $mysqli->prepare($query);

        $stmt->bind_param(
            'ss',
            $_POST['usuario'],
            $_POST['senha'],
        );

        $stmt->execute();
        $stmt->store_result();

        $usuario = $_POST['usuario'];

        if ($stmt->num_rows) {
            fecharConexao($stmt, $mysqli);
            setcookie('usuario', $usuario, null, '/');
            header("Location:index.php");
            exit;
        } else {
            echo "Usuário ou senha inválidos.";
            fecharConexao($stmt, $mysqli);
            echo "<br><br><a href='index.php?pagina=autenticar' onclick='retornarPagina(); return false;'>Clique aqui para poder voltar a tela de login.</a>";
        }
    } else {
        ?>
        Certo! Por favor, informe os seus dados abaixo:
        <br><br>
        <form method="POST">
            <table>
                <tr>
                    <td style="width: 150px">Usuário: </td>
                    <td><input type="text" name="usuario" size="30" value="" required></td>
                </tr>
                <tr>
                    <td>Senha: </td>
                    <td><input type="password" name="senha" size="30" value="" required></td>
                </tr>
                <tr>
                    <td style="padding-top: 10px">
                        <input type="reset" value="Limpar" style="width: 80px">
                    </td>
                    <td style="paddin g- top: 10px">
                        <input type="submit" value="Autenticar" name="submit" style="width: 80px; float: right">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        echo "<br><a href='index.php'>Clique aqui para poder voltar a tela principal.</a>";
    }
    ?>
</article>