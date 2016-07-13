<?php

return [
    'name'        => [
        'name'         => 'Name',
        'instructions' => 'Specify the name of tax.',
        'placeholder'  => 'State Tax'
    ],
    'country'     => [
        'name'      => 'Country',
        'countries' => 'Specify the country in which this tax applies.',
    ],
    'state'       => [
        'name'         => 'Region',
        'label'        => 'State / Province',
        'instructions' => 'You are required to charge taxes for regions your business has a physical presence in.',
    ],
    'rate'        => [
        'name'         => 'Tax Rate',
        'label'        => [
            'countries' => 'Country Tax'
        ],
        'instructions' => [
            'countries' => 'Specify the tax rate for this country.',
            'states'    => 'Specify the tax rate for this state / province.',
        ]
    ],
    'compound'    => [
        'name'         => 'Compound',
        'value'        => 'Compound on top lower priority taxes',
        'instructions' => 'How is this tax calculated in conjunction with other matching rates?',
    ],
    'postal_code' => [
        'name' => 'ZIP/Postal Code',
    ]
];
