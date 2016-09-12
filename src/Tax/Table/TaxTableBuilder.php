<?php namespace Anomaly\TaxesModule\Tax\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class TaxTableBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TaxesModule\Tax\Table
 */
class TaxTableBuilder extends TableBuilder
{

    /**
     * The table filters.
     *
     * @var array|string
     */
    protected $filters = [
        'search' => [
            'fields' => [
                'name',
                'description',
            ],
        ],
    ];

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'name',
        'description',
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit',
        'rates' => [
            'icon' => 'percent',
            'type' => 'primary',
            'text' => 'anomaly.module.taxes::button.rates',
        ],
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete',
    ];
}
