<?php

/*     
    para chamar a constantes
    use Illuminate\Support\Facades\Config;
    Config::get('constantes.paginate.normal')
    Config::get('constantes.statusCarrinho.reservado')
*/

    return [
        'paginacao' => [
            'padrao' => 3,
        ],
        'statusCarrinho' => [
            'reservado' => 'RE',
        ]
    ];

?>