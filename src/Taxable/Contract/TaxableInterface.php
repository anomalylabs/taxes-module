<?php namespace Anomaly\TaxesModule\Taxable\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Model\EloquentModel;
use Anomaly\TaxesModule\Rate\RateCollection;
use Anomaly\TaxesModule\Tax\Contract\TaxInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Interface TaxableInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TaxesModule\Taxable\Contract
 */
interface TaxableInterface extends EntryInterface
{

    /**
     * Apply taxes to the amount.
     *
     * @param       $amount
     * @param array $parameters
     * @return float
     */
    public function apply($amount, array $parameters = []);

    /**
     * Calculate taxes for the amount.
     *
     * @param       $amount
     * @param array $parameters
     * @return float
     */
    public function calculate($amount, array $parameters = []);

    /**
     * Get the taxable country.
     *
     * @return string|null
     */
    public function getCountry();

    /**
     * Get the taxable state.
     *
     * @return string|null
     */
    public function getState();

    /**
     * Get the taxable postal code.
     *
     * @return string|null
     */
    public function getPostalCode();

    /**
     * Get the related tax.
     *
     * @return TaxInterface
     */
    public function getTax();

    /**
     * Get the related tax rates.
     *
     * @return RateCollection
     */
    public function getTaxRates();

    /**
     * Return the tax relation.
     *
     * @return BelongsTo
     */
    public function tax();

    /**
     * Get the related item.
     *
     * @return EloquentModel
     */
    public function getItem();

    /**
     * Return the item relation.
     *
     * @return MorphTo
     */
    public function item();
}
