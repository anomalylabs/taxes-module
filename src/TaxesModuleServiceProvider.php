<?php namespace Anomaly\TaxesModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class TaxesModuleServiceProvider
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TaxesModule
 */
class TaxesModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/taxes'                         => 'Anomaly\TaxesModule\Http\Controller\Admin\TaxesController@index',
        'admin/taxes/create'                  => 'Anomaly\TaxesModule\Http\Controller\Admin\TaxesController@create',
        'admin/taxes/edit/{id}'               => 'Anomaly\TaxesModule\Http\Controller\Admin\TaxesController@edit',
        'admin/taxes/rates/{class}'           => 'Anomaly\TaxesModule\Http\Controller\Admin\RatesController@index',
        'admin/taxes/rates/{class}/create'    => 'Anomaly\TaxesModule\Http\Controller\Admin\RatesController@create',
        'admin/taxes/rates/{class}/edit/{id}' => 'Anomaly\TaxesModule\Http\Controller\Admin\RatesController@edit',
    ];

    /**
     * The addon singletons.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\TaxesModule\Tax\Contract\TaxRepositoryInterface'   => 'Anomaly\TaxesModule\Tax\TaxRepository',
        'Anomaly\TaxesModule\Rate\Contract\RateRepositoryInterface' => 'Anomaly\TaxesModule\Rate\RateRepository',
    ];

}
