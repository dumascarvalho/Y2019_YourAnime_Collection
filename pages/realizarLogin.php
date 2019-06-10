<article>
    <?php if (isset($_POST['submit'])) {
        include("./includes/database.php");
        $conexao = abrirConexao();

        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        if (empty($usuario) or empty($senha)) {
            echo "<script type='text/javascript'>retornarPagina();</script>";
        }

        $query = " SELECT * FROM usuario WHERE usuario = '$usuario' and senha = '$senha'";

        $dados = mysqli_query($conexao, $query);
        $linhas = mysqli_num_rows($dados);

        if ($linhas == true) {
            echo "Usuário autenticado com sucesso!";
        } else {
            echo "Usuário ou senha inválidos.";
        }
        fecharConexao($conexao);
    } else {
        ?>
        Certo! Por favor, informe os seus dados abaixo:
        <br><br>
        <form method="POST">
            <table>
                <tr>
                    <td style="width: 150px">Usuário: </td>
                    <td><input type="text" name="usuario" size="30" value=""></td>
                </tr>
                <tr>
                    <td>Senha: </td>
                    <td><input type="password" name="senha" size="30" value=""></td>
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
        echo "<br><a href='index.php'>Clique aqui para poder voltar a tela principal.</a></li>";
    }
    ?>
</article>