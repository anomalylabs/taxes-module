<?php

return [
    'name'        => [
        'name'         => 'Name',
        'instructions' => [
            'taxes' => 'Specify a short descriptive name for this tax class.',
            'rates' => 'Specify a short descriptive name for this tax rate.',
        ],
        'placeholder'  => [
            'taxes' => 'Products',
            'rates' => 'State Tax',
        ],
    ],
    'description' => [
        'name'         => 'Description',
        'instructions' => 'Briefly describe this tax class.',
    ],
    'country'     => [
        'name'         => 'Country',
        'instructions' => 'Specify the country in which this tax applies.',
        'warning'      => 'If not specified the country will be skipped when matching rates.',
    ],
    'state'       => [
        'name'         => 'Region',
        'label'        => 'State / Province',
        'instructions' => 'You are required to charge taxes for regions your business has a physical presence in.',
        'warning'      => 'If not specified the state/province will be skipped when matching rates.',
    ],
    'rate'        => [
        'name'         => 'Tax Rate',
        'instructions' => 'Specify the tax rate for the defined country, state, postal code.',
    ],
    'compound'    => [
        'name'         => 'Compound',
        'value'        => 'Compound on top lower priority taxes',
        'instructions' => 'How is this tax calculated in conjunction with other matching rates?',
    ],
    'postal_code' => [
        'name'         => 'ZIP/Postal Code',
        'instructions' => 'Specify the tax rate for your local municipal.',
        'warning'      => 'If not specified the ZIP/Postal Code will be skipped when matching rates.',
    ],
    'inclusive'   => [
        'name'   => 'Included in Price',
        'option' => 'Taxes for this class are included in product prices.',
    ],
    'suffix'      => [
        'name'        => 'Suffix',
        'option'      => 'Specify the suffix to display after tax amounts.',
        'placeholder' => 'VAT',
    ],
];
