<?php namespace Anomaly\TaxesModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Model\Taxes\TaxesCategoriesEntryModel;
use Anomaly\Streams\Platform\Model\Taxes\TaxesRatesEntryModel;
use Anomaly\TaxesModule\Category\CategoryModel;
use Anomaly\TaxesModule\Category\CategoryRepository;
use Anomaly\TaxesModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\TaxesModule\Rate\Contract\RateRepositoryInterface;
use Anomaly\TaxesModule\Rate\RateModel;
use Anomaly\TaxesModule\Rate\RateRepository;

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
     * The addon bindings.
     *
     * @var array
     */
    protected $bindings = [
        TaxesRatesEntryModel::class      => RateModel::class,
        TaxesCategoriesEntryModel::class => CategoryModel::class,
    ];

    /**
     * The addon singletons.
     *
     * @var array
     */
    protected $singletons = [
        RateRepositoryInterface::class     => RateRepository::class,
        CategoryRepositoryInterface::class => CategoryRepository::class,
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/taxes'                            => 'Anomaly\TaxesModule\Http\Controller\Admin\CategoryController@index',
        'admin/taxes/create'                     => 'Anomaly\TaxesModule\Http\Controller\Admin\CategoryController@create',
        'admin/taxes/edit/{id}'                  => 'Anomaly\TaxesModule\Http\Controller\Admin\CategoryController@edit',
        'admin/taxes/rates/{category}'           => 'Anomaly\TaxesModule\Http\Controller\Admin\RatesController@index',
        'admin/taxes/rates/{category}/create'    => 'Anomaly\TaxesModule\Http\Controller\Admin\RatesController@create',
        'admin/taxes/rates/{category}/edit/{id}' => 'Anomaly\TaxesModule\Http\Controller\Admin\RatesController@edit',
    ];
}
