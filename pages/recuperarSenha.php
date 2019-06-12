<article>
    <?php if (isset($_POST['submit'])) {
        include("./includes/database.php");

        $mysqli = abrirConexao();

        $query = 'SELECT senha FROM usuario 
        WHERE usuario = ? and email = ?';

        $stmt = $mysqli->prepare($query);

        $stmt->bind_param(
            'ss',
            $_POST['usuario'],
            $_POST['email'],
        );

        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($senha);

        if ($stmt->num_rows) {
            echo "Os dados informados estão corretos, sua senha é: ";
            while ($stmt->fetch()) {
                echo $senha;
            }
            fecharConexao($stmt, $mysqli);
            echo "<br><br><a href='index.php'>Clique aqui para poder voltar a tela principal.</a>";
        } else {
            echo "Usuário ou e-mail inválidos.";
            fecharConexao($stmt, $mysqli);
            echo "<br><br><a href='index.php?pagina=autenticar' onclick='retornarPagina(); return false;'>Clique aqui para poder voltar a tela de login.</a>";
        }
    } else {
        ?>
        Para recuperar sua senha, basta preencher os campos abaixo:
        <br><br>
        <form method="POST">
            <table>
                <tr>
                    <td style="width: 150px">Usuário: </td>
                    <td><input type="text" name="usuario" size="30" value="" required></td>
                </tr>
                <tr>
                    <td>E-mail: </td>
                    <td><input type="text" name="email" size="30" value="" required></td>
                </tr>
                <tr>
                    <td style="padding-top: 10px">
                        <input type="reset" value="Limpar" style="width: 80px">
                    </td>
                    <td style="padding-top: 10px">
                        <input type="submit" value="Recuperar" name="submit" style="width: 80px; float: right">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        echo "<br><a href='index.php'>Clique aqui para poder voltar a tela principal.</a>";
    }
    ?>
</article>