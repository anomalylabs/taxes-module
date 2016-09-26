<?php namespace Anomaly\TaxesModule\Taxable;

use Anomaly\Streams\Platform\Model\EloquentModel;
use Anomaly\Streams\Platform\Model\Taxes\TaxesTaxablesEntryModel;
use Anomaly\TaxesModule\Rate\RateCollection;
use Anomaly\TaxesModule\Tax\Contract\TaxInterface;
use Anomaly\TaxesModule\Taxable\Command\ApplyTaxes;
use Anomaly\TaxesModule\Taxable\Command\CalculateTaxes;
use Anomaly\TaxesModule\Taxable\Command\GatherTaxes;
use Anomaly\TaxesModule\Taxable\Contract\TaxableInterface;

/**
 * Class TaxableModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TaxableModel extends TaxesTaxablesEntryModel implements TaxableInterface
{

    /**
     * Apply taxes to the amount.
     *
     * @param       $amount
     * @param array $parameters
     * @return float
     */
    public function apply($amount, array $parameters = [])
    {
        return $this->dispatch(new ApplyTaxes($this, $amount, $parameters));
    }

    /**
     * Calculate taxes for the amount.
     *
     * @param       $amount
     * @param array $parameters
     * @return float
     */
    public function calculate($amount, array $parameters = [])
    {
        return $this->dispatch(new CalculateTaxes($this, $amount, $parameters));
    }

    /**
     * Gather all applied taxes.
     *
     * @param       $amount
     * @param array $parameters
     * @return array
     */
    public function taxes($amount, array $parameters = [])
    {
        return $this->dispatch(new GatherTaxes($this, $amount, $parameters));
    }

    /**
     * Get the related tax.
     *
     * @return TaxInterface
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Get the related tax rates.
     *
     * @return RateCollection
     */
    public function getTaxRates()
    {
        $tax = $this->getTax();

        return $tax->getRates();
    }

    /**
     * Get the related item.
     *
     * @return EloquentModel
     */
    public function getItem()
    {
        return $this->item;
    }
}
