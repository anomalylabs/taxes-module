<?php namespace Anomaly\TaxesModule\Rate;

use Anomaly\Streams\Platform\Model\Taxes\TaxesRatesEntryModel;
use Anomaly\TaxesModule\Rate\Command\ApplyTax;
use Anomaly\TaxesModule\Rate\Command\CalculateTax;
use Anomaly\TaxesModule\Rate\Command\DeductTax;
use Anomaly\TaxesModule\Rate\Contract\RateInterface;

/**
 * Class RateModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class RateModel extends TaxesRatesEntryModel implements RateInterface
{

    /**
     * Apply the tax rate to the value.
     *
     * @param float $value
     * @return float
     */
    public function apply($value)
    {
        return $this->dispatch(new ApplyTax($this, $value));
    }

    /**
     * Deduct the tax rate from the value.
     *
     * @param float $value
     * @return float
     */
    public function deduct($value)
    {
        return $this->dispatch(new DeductTax($this, $value));
    }

    /**
     * Calculate the tax rate for the value.
     *
     * @param float $value
     * @return float
     */
    public function calculate($value)
    {
        return $this->dispatch(new CalculateTax($this, $value));
    }

    /**
     * Get the rate.
     *
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }
}
