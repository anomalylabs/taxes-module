<?php

return [
    'name'    => [
        'name'         => 'Name',
        'instructions' => 'Specify the name of tax.',
        'placeholder'  => 'State Tax'
    ],
    'country' => [
        'name'      => 'Country',
        'countries' => 'Specify the country in which this tax applies.',
    ],
    'state'   => [
        'name'         => 'Region',
        'label'        => 'State / Province',
        'instructions' => 'You are required to charge taxes for regions your business has a physical presence in.',
    ],
    'rate'    => [
        'name'         => 'Tax Rate',
        'label'        => [
            'countries' => 'Country Tax'
        ],
        'instructions' => [
            'countries' => 'Specify the tax rate for this country.',
            'states'    => 'Specify the tax rate for this state / province.',
        ]
    ],
    'type'    => [
        'name'         => 'Tax Type',
        'instructions' => 'How is this tax calculated in conjunction with it\'s federal tax?',
        'option'       => [
            'normal'     => 'Added to the federal tax',
            'harmonized' => 'Instead of the federal tax',
            'compounded' => 'Compounded on top of the federal tax',
        ]
    ]
];
