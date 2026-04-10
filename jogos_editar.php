<?php
// jogos_editar.php
require("carregar_pdo.php");
require ("carregar_twig.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = (int) $_POST["id"] ?? false;
    $nome = $_POST["nome"] ?? false;
    $estilo = $_POST["estilo"] ?? false;

    if(!$_FILES['capa']['error']){
        //Descobre nome do arquivo
        $dados = $pdo->prepare('SELECT capa FROM jogos WHERE id = :id');
        $dados->execute( [":id" => $id] );
        $capa_velha = $dados->fetch(PDO::FETCH_ASSOC)['capa'];
        //Apagar a capa
        $capa_velha = __DIR__ . "/img/" . $capa_velha;
        if(file_exists($capa_velha)){
            unlink($capa_velha);
        }
        //Salvar a nova capa
        $ext = pathinfo($_FILES['capa']['name'], PATHINFO_EXTENSION);
        $capa = uniqid() . "." . $ext;
        move_uploaded_file($_FILES['capa']['tmp_name'], "img/{$capa}");
    }
    $sql = 'UPDATE jogos SET nome = :nome, estilo = :estilo' . (isset($capa) ? ', capa = :capa' : '') . ', lancamento = :lancamento WHERE id = :id';
    $dados = $pdo->prepare($sql);
    $params = [
        ':id' => $id,
        ':nome' => $nome,
        ':estilo' => $estilo,
        ':lancamento' => $_POST['lancamento'] ?? null,
    ];
    if (isset($capa)) {
        $params[':capa'] = $capa;
    }
    $dados->execute($params);

    header("Location: jogos.php");
    die;
}
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