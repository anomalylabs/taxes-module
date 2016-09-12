<?php namespace Anomaly\TaxesModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Model\EloquentModel;
use Anomaly\TaxesModule\Taxable\TaxableModel;

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
        'admin/taxes'                       => 'Anomaly\TaxesModule\Http\Controller\Admin\TaxesController@index',
        'admin/taxes/create'                => 'Anomaly\TaxesModule\Http\Controller\Admin\TaxesController@create',
        'admin/taxes/edit/{id}'             => 'Anomaly\TaxesModule\Http\Controller\Admin\TaxesController@edit',
        'admin/taxes/rates/{tax}'           => 'Anomaly\TaxesModule\Http\Controller\Admin\RatesController@index',
        'admin/taxes/rates/{tax}/create'    => 'Anomaly\TaxesModule\Http\Controller\Admin\RatesController@create',
        'admin/taxes/rates/{tax}/edit/{id}' => 'Anomaly\TaxesModule\Http\Controller\Admin\RatesController@edit',
    ];

    /**
     * The addon singletons.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\TaxesModule\Tax\Contract\TaxRepositoryInterface'         => 'Anomaly\TaxesModule\Tax\TaxRepository',
        'Anomaly\TaxesModule\Rate\Contract\RateRepositoryInterface'       => 'Anomaly\TaxesModule\Rate\RateRepository',
        'Anomaly\TaxesModule\Taxable\Contract\TaxableRepositoryInterface' => 'Anomaly\TaxesModule\Taxable\TaxableRepository',
    ];

    /**
     * Register the addon.
     *
     * @param EloquentModel $model
     */
    public function register(EloquentModel $model)
    {
        $model->bind(
            'taxable',
            function () {
                /* @var EloquentModel $this */
                return $this->morphOne(TaxableModel::class, 'item', 'item_type');
            }
        );
        $model->bind(
            'get_taxable',
            function () {
                /* @var EloquentModel $this */
                return $this->taxable()->first();
            }
        );
    }
}
