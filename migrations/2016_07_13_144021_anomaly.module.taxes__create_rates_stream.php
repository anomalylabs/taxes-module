<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleTaxesCreateRatesStream
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleTaxesCreateRatesStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'rates',
        'translatable' => true,
        'sortable'     => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'category' => [
            'required' => true,
        ],
        'name'     => [
            'translatable' => true,
            'required'     => true,
        ],
        'country',
        'state',
        'postal_code',
        'city',
        'compound',
        'rate'     => [
            'required' => true,
        ],
        'priority' => [
            'required' => true,
        ],
    ];

}
