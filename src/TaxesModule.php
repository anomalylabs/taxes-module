<?php namespace Anomaly\TaxesModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class TaxesModule
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TaxesModule
 */
class TaxesModule extends Module
{

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'countries' => [
            'buttons'  => [
                'add_country'
            ],
        ],
        'states' => [
            'buttons' => [
                'add_state' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/taxes/states/choose'
                ]
            ]
        ]
    ];

}
