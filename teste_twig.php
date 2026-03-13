<?php 
// teste_twig.php
require_once('carregar_twig.php');

$nome = 'Fulaninho';

echo $twig->render('teste_twig.html', [
    'nome'=> $nome
]);

