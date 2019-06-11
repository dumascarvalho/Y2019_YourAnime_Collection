<article>
    <?php if (isset($_POST['submit'])) {
        include("./includes/database.php");

        $mysqli = abrirConexao();

        $query = 'INSERT INTO usuario (nome, email, usuario, senha, nivel_acesso)
        VALUES (?, ?, ?, ?, ?)';

        $stmt = $mysqli->prepare($query);

        $stmt->bind_param(
            'sssss',
            $_POST['nome'],
            $_POST['email'],
            $_POST['usuario'],
            $_POST['senha'],
            $_POST['nivel']
        );

        if ($stmt->execute()) {
            echo "Seu cadastro foi realizado com sucesso!";
            fecharConexao($stmt, $mysqli);
            echo "<br><br><a href='index.php?pagina=autenticar'>Clique aqui para poder realizar login.</a></li>";
        } else {
            echo ("Não foi possível realizar o cadastro, favor tentar novamente: " . mysqli_error($mysqli));
            fecharConexao($stmt, $mysqli);
            echo "<br><br><a href='index.php?pagina=cadastrar' onclick='retornarPagina(); return false;'>Clique aqui para poder voltar a tela de cadastro.</a></li>";
        }
    } else {
        ?>
        Muito bem! Para realizarmos o seu cadastro, favor preencha os campos abaixo:
        <br><br>
        <form method="POST">
            <table>
                <tr>
                    <td style="width: 150px">Nome: </td>
                    <td><input type="text" name="nome" size="30" value="" required></td>
                </tr>
                <tr>
                    <td>Usuário: </td>
                    <td><input type="text" name="usuario" size="30" value="" required></td>
                </tr>
                <tr>
                    <td>Senha: </td>
                    <td><input type="password" name="senha" size="30" value="" required></td>
                </tr>
                <tr>
                    <td>E-mail: </td>
                    <td><input type="text" name="email" size="30" value="" required></td>
                </tr>
                <tr>
                    <td>Nível de Acesso: </td>
                    <td>
                        <select name="nivel" style="width: 150px" onchange="validarAdministrador(this)">
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
        echo "<br><a href='index.php'>Clique aqui para poder voltar a tela principal.</a></li>";
    }
    ?>
</article>