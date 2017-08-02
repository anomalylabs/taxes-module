<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;
use Anomaly\TaxesModule\Category\CategoryModel;

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
        'city'        => 'anomaly.field_type.text',
        'item'        => 'anomaly.field_type.polymorphic',
        'description' => 'anomaly.field_type.textarea',
        'rate'        => [
            'type'   => 'anomaly.field_type.decimal',
            'config' => [
                'decimals' => 3,
            ],
        ],
        'priority'    => [
            'type'   => 'anomaly.field_type.integer',
            'config' => [
                'default_value' => 1,
                'min'           => 1,
            ],
        ],
        'compound'    => [
            'type'   => 'anomaly.field_type.boolean',
            'config' => [
                'mode'  => 'checkbox',
                'label' => 'anomaly.module.taxes::field.compound.value',
            ],
        ],
        'category'    => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => CategoryModel::class,
            ],
        ],
    ];

}
