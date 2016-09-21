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
        'tax'    => [
            'required' => true,
        ],
        'name'   => [
            'translatable' => true,
            'required'     => true,
        ],
        'country',
        'state',
        'postal_code',
        'amount' => [
            'required' => true,
        ],
        'compound',
    ];

}
