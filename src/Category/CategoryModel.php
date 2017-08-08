<?php namespace Anomaly\TaxesModule\Category;

use Anomaly\Streams\Platform\Model\Taxes\TaxesCategoriesEntryModel;
use Anomaly\TaxesModule\Category\Contract\CategoryInterface;
use Anomaly\TaxesModule\Rate\RateCollection;
use Anomaly\TaxesModule\Rate\RateModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class CategoryModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CategoryModel extends TaxesCategoriesEntryModel implements CategoryInterface
{

    /**
     * The cascading deletes.
     *
     * @var array
     */
    protected $cascades = [
        'rates',
    ];

    /**
     * Get the related rates.
     *
     * @return RateCollection
     */
    public function getRates()
    {
        return $this->rates;
    }

    /**
     * Get the rates relation.
     *
     * @return HasMany
     */
    public function rates()
    {
        return $this->hasMany(RateModel::class, 'category_id');
    }
}
