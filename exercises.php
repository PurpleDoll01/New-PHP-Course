<?php

//Ejercicio 1

$arreglo = [

'keyStr1' => 'lado',
0 => 'ledo',

'keyStr2' => 'lido',
1 => 'lodo',
2 => 'ludo'

];

echo '<h2>Ejercicio 1</h2>';
echo $arreglo['keyStr1'] . ', ' . $arreglo[0] . ', ' . $arreglo['keyStr2'] . ', ' . $arreglo[1] . ', ' . $arreglo[2] . ', ' ;
echo '<br>decirlo al revés lo dudo.';
echo '<br>' . $arreglo[2] . ', ' . $arreglo[1] . ', ' . $arreglo['keyStr2'] . ', ' . $arreglo[0] . ', ' . $arreglo['keyStr1'] . ', ' ;
echo '<br>¡Qué trabajo me ha costado!';

echo '<br>';
echo '<br>';


// Ejercicio 2

$paises = [
    'Colombia' => [
        'Pereira',
        'Cartagena',
        'Bogota',
    ],
    'Argentina' => [
        'Matheu',
        'Patagonia',
        'Buenos Aires',
    ],
    'Mexico' => [
        'Monterrey',
        'Guadalajara',
        'Merida',
    ],
];

foreach ($paises as $pais => $ciudades) {
    echo '<b>' . $pais . ': </b>';
    foreach ($ciudades as $ciudad) {
       echo $ciudad . ', ';
    };
    echo '<br>';
}

echo '<br>';
echo '<br>';

//Ejercicio 3


$valores = [23, 54, 32, 67, 34, 78, 98, 56, 21, 34, 57, 92, 12, 5, 61];
//sort($valores);

//for ($i = 0; $i <=2; $i++) {
//    echo $valores[$i] . '<br>';
//}
//
//rsort($valores);
//
//for ($i = 0; $i <=2; $i++) {
//    echo $valores[$i] . '<br>';
//}

$new = 0;
$new1 = 0;
$new2 = 0;
$new3 = 0;

foreach ($valores as $key => $valor) {
    if ($valor <= $valores[0]) {
        $new = $valores[0];
        $valores[0] = $valor;
        $valores[$key] = $new;
    }
    var_dump($valores[0]);
};

foreach ($valores as $key => $valor) {
    if ($valor <= $valores[1] && $valor != $valores[0]) {
        $new1 = $valores[1];
        $valores[1] = $valor;
        $valores[$key] = $new1;
    };

    var_dump($valores[1]);
};

var_dump($valores);

foreach ($valores as $key => $valor) {
    if ($valor <= $valores[2] && $valor != $valores[0] && $valor != $valores[1]) {
        $new2 = $valores[2];
        $valores[2] = $valor;
        $valores[$key] = $new2;
    };

    var_dump($valores[2]);
}

foreach ($valores as $key => $valor) {
    if ($valor >= $valores[14]) {
        $new = $valores[14];
        $valores[14] = $valor;
        $valores[$key] = $new;
    }
    var_dump($valores[14]);
};



var_dump($valores);