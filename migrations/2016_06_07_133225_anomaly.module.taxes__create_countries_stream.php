<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleTaxesCreateCountriesStream
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleTaxesCreateCountriesStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'countries',
        'title_column' => 'country'
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'country' => [
            'required' => true,
            'unique'   => true
        ],
        'rate'
    ];

}
