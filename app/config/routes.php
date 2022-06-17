<?php
return [
    '' => [
        'controller' => 'main',
        'action' => 'index'
    ],
    'catalogue' => [
        'controller' => 'catalogue',
        'action' => 'index']
    ,
    'catalogue/microphone' => [
        'controller' => 'catalogue',
        'action' => 'microphone'
    ],
    'catalogue/guitar' => [
        'controller' => 'catalogue',
        'action' => 'guitar'
    ],

    'catalogue/drum' => [
        'controller' => 'catalogue',
        'action' => 'drum'
    ],

    'catalogue/add_to_cart' => [
        'controller' => 'catalogue',
        'action' => 'add_to_cart'
    ],
    'catalogue/registration' => [
        'controller' => 'catalogue',
        'action' => 'registration'
    ],
    'catalogue/delete_from_cart' => [
        'controller' => 'catalogue',
        'action' => 'delete_from_cart'
    ],
    'catalogue/get_client_cart' => [
        'controller' => 'catalogue',
        'action' => 'get_client_cart'
    ],
    'catalogue/checkout' => [
        'controller' => 'catalogue',
        'action' => 'checkout'
    ],
    'test' => [
        'controller' => 'test',
        'action' => 'index'],
        
        'catalogue/get_client_orders' => [
            'controller' => 'catalogue',
            'action' => 'get_client_orders'
        ]

];
