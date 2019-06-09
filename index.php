<?php

$pagina = "principal.php";
$titulo = "YourAnime Collection";

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

include("./includes/sidebar.php");

if (isset($_GET["pagina"])) {
    echo $_GET["pagina"];
}

include("./pages/" . $pagina);

include("./includes/footer.php");
