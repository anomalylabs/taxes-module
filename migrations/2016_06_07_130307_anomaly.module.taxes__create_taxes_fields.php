<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleTaxesCreateTaxesFields
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleTaxesCreateTaxesFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'name'        => 'anomaly.field_type.text',
        'country'     => 'anomaly.field_type.country',
        'state'       => 'anomaly.field_type.state',
        'postal_code' => 'anomaly.field_type.text',
        'suffix'      => 'anomaly.field_type.text',
        'item'        => 'anomaly.field_type.polymorphic',
        'taxable'     => 'anomaly.field_type.boolean',
        'amount'      => [
            'type'   => 'anomaly.field_type.decimal',
            'config' => [
                'decimals' => 3,
            ],
        ],
        'description' => 'anomaly.field_type.textarea',
        'inclusive'   => [
            'type'   => 'anomaly.field_type.boolean',
            'config' => [
                'mode'  => 'checkbox',
                'label' => 'anomaly.module.taxes::field.inclusive.option',
            ],
        ],
        'compound'    => [
            'type'   => 'anomaly.field_type.boolean',
            'config' => [
                'mode'  => 'checkbox',
                'label' => 'anomaly.module.taxes::field.compound.value',
            ],
        ],
        'tax'         => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\TaxesModule\Tax\TaxModel',
            ],
        ],
    ];

}
