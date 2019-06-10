<?php

$pagina = "main.php";
$titulo = "YourAnime Store";

if (isset($_GET["pagina"])) {
    if ($_GET["pagina"] == "sobre") {
        $pagina = "sobre.php";
        $titulo = "Sobre";
    }
    if ($_GET["pagina"] == "contatos") {
        $pagina = "contatos.php";
        $titulo = "Contatos";
    }
}

include("./includes/header.php");

echo "<section>";

include("./includes/sidebar.php");

include("./pages/" . $pagina);

echo "</section>";

include("./includes/footer.php");
