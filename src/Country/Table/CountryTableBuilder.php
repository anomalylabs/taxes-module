<?php namespace Anomaly\TaxesModule\Country\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class CountryTableBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TaxesModule\Country\Table
 */
class CountryTableBuilder extends TableBuilder
{

    /**
     * The table filters.
     *
     * @var array|string
     */
    protected $filters = [
        'search' => [
            'fields' => [
                'country'
            ]
        ]
    ];

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit',
        'states' => [
            'type' => 'info',
            'icon' => 'flag',
            'text' => 'Regions'
        ]
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete'
    ];

}
