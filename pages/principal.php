<article>
    <?php

    if (!isset($_SESSION['usuario'])) {
        ?>
        Seja bem-vindo(a), como podemos te ajudar?
        <ul>
            <li><a href="index.php?pagina=autenticar">Já possuo um usuário cadastrado;</a></li>
            <li><a href="index.php?pagina=cadastrar">Ainda não realizei meu cadastro;</a></li>
            <li><a href="index.php?pagina=recuperar">Possuo cadastro, mas esqueci minha senha.</a></li>
        </ul>
    <?php
} else {
    ?>
        <?php
        echo "Seja bem-vindo(a): " . $_SESSION['usuario'];
    }
    ?>
</article>