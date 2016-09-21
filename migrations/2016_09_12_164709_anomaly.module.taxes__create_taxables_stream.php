<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class AnomalyModuleTaxesCreateTaxablesStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'      => 'taxables',
        'trashable' => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'item' => [
            'required' => true,
        ],
        'tax'  => [
            'required' => true,
        ],
    ];

}
