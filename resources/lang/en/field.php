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
        'warning'      => 'Leave blank to apply to all countries.',
        'placeholder'  => '*',
    ],
    'state'       => [
        'name'         => 'Region',
        'label'        => 'State / Province',
        'instructions' => 'You are required to charge taxes for regions your business has a physical presence in.',
        'warning'      => 'Leave blank to apply to all states.',
        'placeholder'  => '*',
    ],
    'postal_code' => [
        'name'         => 'ZIP/Postal Code',
        'instructions' => 'Specify the tax rate for your local municipal.',
        'warning'      => 'Leave blank to apply to all ZIP/postal codes.',
        'placeholder'  => '*',
    ],
    'city'        => [
        'name'         => 'City',
        'instructions' => 'Specify the tax rate for a specific city.',
        'warning'      => 'Leave blank to apply to all cities.',
        'placeholder'  => '*',
    ],
    'rate'        => [
        'name'         => 'Tax Rate',
        'instructions' => 'Specify the tax rate for the defined country, state, postal code.',
        'placeholder'  => '6.025',
    ],
    'compound'    => [
        'name'         => 'Compound',
        'value'        => 'Compound on top of next lower priority tax.',
        'instructions' => 'How is this tax calculated in conjunction with other matching rates?',
    ],
    'tax'         => [
        'name'         => 'Tax Class',
        'instructions' => 'Specify the tax class for this item.',
    ],
    'priority'    => [
        'name'         => 'Priority',
        'instructions' => 'Specify a priority for this tax rate.',
        'warning'      => 'Only 1 matching rate per priority will be used.',
    ],
];
