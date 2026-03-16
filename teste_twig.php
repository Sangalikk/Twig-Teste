<?php 
// teste_twig.php
require_once('carregar_twig.php');

$nome = 'Fulaninho';
$disciplinas = [
    'Programação',
    'Banco de Dados',
    'Interface Web',
    'Desenvolvimento de Sistemas',
];

echo $twig->render('teste_twig.html', [
    'nome'=> $nome,
    'legal'=> true,
    'disciplinas'=> $disciplinas,
]);

