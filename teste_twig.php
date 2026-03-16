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

$poema = '
    Um dia, há seis anos, 
    um arco-íris delicado e esmaecido desenhou-se no meu peito, 
    e muito embora não se tratasse nem de amor nem de bem-querer, 
    à medida que passavam os meses e os anos, esse arco-íris foi 
    carregando as suas cores com grande beleza, e, até agora, 
    jamais o perdi de vista. O arco-íris que surge no céu limpo 
    depois de uma chuva tem existência efêmera e logo se apaga, 
    mas o que nasce no coração da gente parece que não. 
    Por favor, peço-lhe que o interpele. O que acha realmente de mim?
    Será que me tem em conta de um arco-íris depois da chuva? Que se apagou já há muito tempo?

    Se assim for, eu também tenho que apagar o meu arco-íris. 
    Mas sinto que ele não quer sumir-se antes de eu mesma terminar com minha vida.
    ';

echo $twig->render('teste_twig.html', [
    'nome'=> $nome,
    'legal'=> true,
    'disciplinas'=> $disciplinas,
    'poema'=> $poema,
]);

