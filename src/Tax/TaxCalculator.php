<?php namespace Anomaly\TaxesModule\Tax;

use Anomaly\Streams\Platform\Support\Currency;
use Anomaly\TaxesModule\Rate\Contract\RateInterface;

/**
 * Class TaxCalculator
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TaxCalculator
{

    /**
     * The currency utility.
     *
     * @var Currency
     */
    protected $currency;

    /**
     * Create a new TaxCalculator instance.
     *
     * @param Currency $currency
     */
    public function __construct(Currency $currency)
    {
        $this->currency = $currency;
    }

    /**
     * Calculate the tax amount.
     *
     * @param RateInterface $rate
     * @param               $value
     * @return float
     */
    public function calculate(RateInterface $rate, $value)
    {
        return $this->currency->normalize(floatval($value * ($rate->getRate() / 100)));
    }

    /**
     * Apply the tax amount.
     *
     * @param RateInterface $rate
     * @param               $value
     * @return float
     */
    public function apply(RateInterface $rate, $value)
    {
        return $this->currency->normalize(floatval($value + ($value * ($rate->getRate() / 100))));
    }

    /**
     * Deduct the tax amount.
     *
     * @param RateInterface $rate
     * @param               $value
     * @return float
     */
    public function deduct(RateInterface $rate, $value)
    {
        return $this->currency->normalize(floatval($value / (1 + ($rate->getRate() / 100))));
    }
}
