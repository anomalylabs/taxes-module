<?php namespace Anomaly\TaxesModule\State\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class StateTableBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TaxesModule\State\Table
 */
class StateTableBuilder extends TableBuilder
{

    /**
     * The table filters.
     *
     * @var array|string
     */
    protected $filters = [
        'search' => [
            'fields' => [
                'state',
                'name',
            ]
        ],
        'country'
    ];

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'country',
        'state',
        'name',
        'rate' => [
            'wrapper' => '{value}%'
        ]
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit'
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
