<?php namespace Anomaly\TaxesModule\Tax;

use Anomaly\Streams\Platform\Model\Taxes\TaxesTaxesEntryModel;
use Anomaly\TaxesModule\Rate\RateCollection;
use Anomaly\TaxesModule\Rate\RateModel;
use Anomaly\TaxesModule\Tax\Contract\TaxInterface;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class TaxModel
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TaxesModule\Tax
 */
class TaxModel extends TaxesTaxesEntryModel implements TaxInterface
{

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
     * Return the pages relationship.
     *
     * @return HasMany
     */
    public function rates()
    {
        return $this->hasMany(RateModel::class, 'tax_id');
    }
}
