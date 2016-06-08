<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleTaxesCreateStatesStream
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleTaxesCreateStatesStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'states',
        'title_column' => 'country',
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'country' => [
            'required' => true,
        ],
        'state'   => [
            'required' => true,
            'unique'   => true,
        ],
        'name'    => [
            'required' => true,
        ],
        'rate',
        'type'    => [
            'required' => true,
        ],
    ];

}
