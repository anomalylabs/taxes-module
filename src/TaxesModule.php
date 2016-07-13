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
        'taxes' => [
            'buttons'  => [
                'add_tax'
            ],
            'sections' => [
                'rates' => [
                    'href'    => 'admin/taxes/rates/{request.route.parameters.class}',
                    'buttons' => [
                        'add_rate'
                    ]
                ]
            ]
        ],
    ];

}
