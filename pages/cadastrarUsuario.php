<article>
    <?php if (isset($_POST['submit'])) {
        include("./includes/database.php");
        $conexao = abrirConexao();

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $nivel = $_POST['nivel'];

        $query = "INSERT INTO usuario (id_usuario, nome, email, usuario, senha, nivel_acesso)
        VALUES (null, '$nome', '$email', '$usuario', '$senha', '$nivel')";

        if (mysqli_query($conexao, $query)) {
            echo "Seu cadastro foi realizado com sucesso!";
            fecharConexao($conexao);

            echo "<br><br><a href='index.php?pagina=autenticar'>Clique aqui para poder realizar login.</a></li>";
        } else {
            echo "Não foi possível realizar o cadastro, favor tentar novamente.";
            fecharConexao($conexao);

            echo "<br><br><a href='index.php?pagina=cadastrar'>Clique aqui para poder voltar a tela de cadastro.</a></li>";
        }
    } else {
        ?>
        Muito bem! Para realizarmos o seu cadastro, favor preencha os campos abaixo:
        <br><br>
        <form method="POST">
            <table>
                <tr>
                    <td style="width: 150px">Nome: </td>
                    <td><input type="text" name="nome" size="30" value=""></td>
                </tr>
                <tr>
                    <td>Usuário: </td>
                    <td><input type="text" name="usuario" size="30" value=""></td>
                </tr>
                <tr>
                    <td>Senha: </td>
                    <td><input type="password" name="senha" size="30" value=""></td>
                </tr>
                <tr>
                    <td>E-mail: </td>
                    <td><input type="text" name="email" size="30" value=""></td>
                </tr>
                <tr>
                    <td>Nível de Acesso: </td>
                    <td>
                        <select name="nivel" style="width: 150px">
                            <option value="comum">Comum</option>
                            <option value="administrador">Administrador</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 10px">
                        <input type="reset" value="Limpar" style="width: 80px">
                    </td>
                    <td style="padding-top: 10px">
                        <input type="submit" value="Enviar" name="submit" style="width: 80px; float: right">
                    </td>
                </tr>
            </table>
        </form>

    <?php
}
?>
</article>