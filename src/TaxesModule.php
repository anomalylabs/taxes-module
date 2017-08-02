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
     * The addon icon.
     *
     * @var string
     */
    protected $icon = 'fa fa-percent';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'categories' => [
            'buttons'  => [
                'add_category',
            ],
            'sections' => [
                'rates' => [
                    'hidden'  => 'hidden',
                    'href'    => 'admin/taxes/rates/{request.route.parameters.category}',
                    'buttons' => [
                        'add_rate',
                    ],
                ],
            ],
        ],
    ];

}
