<?php
// jogos_editar.php
require("carregar_pdo.php");
require ("carregar_twig.php");

$id = (int) $_GET["id"] ?? false;

if (!$id) {
    header("Location: jogos.php");
    die;
}else{
    $dados = $pdo->prepare("SELECT * FROM jogos where id = :id");
    $dados->execute(["id" => $id]);
    $jogo = $dados->fetch(PDO::FETCH_ASSOC);

}

echo $twig->render("jogos_editar.html", [
    'jogo' => $jogo, 
]);