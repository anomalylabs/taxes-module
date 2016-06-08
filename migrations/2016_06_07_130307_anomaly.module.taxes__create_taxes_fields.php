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
        'name'    => 'anomaly.field_type.text',
        'country' => 'anomaly.field_type.country',
        'state'   => 'anomaly.field_type.state',
        'rate'    => 'anomaly.field_type.decimal',
        'type'    => [
            'type'   => 'anomaly.field_type.select',
            'config' => [
                'default_value' => 'normal',
                'options'       => [
                    'normal'     => 'anomaly.module.taxes::field.type.option.normal',
                    'harmonized' => 'anomaly.module.taxes::field.type.option.harmonized',
                    'compounded' => 'anomaly.module.taxes::field.type.option.compounded',
                ]
            ]
        ],
    ];

}
