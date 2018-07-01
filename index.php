<?php
//                                 Пятое занятие PHP

$arrays = [
    'Gazprom'=>[
        'pombur',
        'geolog',
        'technolog',
    ],
    'Rosneft'=>[
        'operator',
        'master',
        'supervisor',
    ],
    'Lukoil'=>[
        'voditel',
        'kipovets',
        'electric',
    ],
];

//                                           Функции


function sum_znach($a, $b){
    return $a+$b;
};
$polov_sum = sum_znach(7,3)/2;
_echo ($polov_sum, 'p');
_echo ();

function _echo ($text='Нет данных для вывода', $tag= 'div'){
    $text = '<'.$tag.'>'.$text.'</'.$tag.'>';
    echo $text;
};

function print_data ($arrays) {
foreach ($arrays as $company=>$professions){
    _echo ($company,'h2');
    $out=[];
    foreach ($professions as $value){
        $out[]=$value;
    };
    $out = implode(', ',$out);
    _echo ($out,'p');
};
};
print_data($arrays);
print_data([
    'Автоваз'=>[
        'Granta',
        'Priora',
        'Vesta',
    ],
    'ГАЗ'=>[
        'Волга',
        'ТИГР',
        'Чайка',
    ],
    'УАЗ'=>[
        'Хантер',
        'Патриот',
        'Буханка',
    ],
]);

//
