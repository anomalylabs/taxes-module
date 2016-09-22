<?php namespace Anomaly\TaxesModule\Tax;

use Anomaly\TaxesModule\Rate\Contract\RateInterface;
use Anomaly\TaxesModule\Rate\RateCollection;

/**
 * Class TaxApplicator
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TaxApplicator
{

    /**
     * The tax calculator.
     *
     * @var TaxCalculator
     */
    protected $calculator;

    /**
     * Create a new TaxProcessor instance.
     *
     * @param TaxCalculator $calculator
     */
    public function __construct(TaxCalculator $calculator)
    {
        $this->calculator = $calculator;
    }

    /**
     * Process primary taxes.
     *
     * @param RateCollection $rates
     * @param                $value
     */
    public function primary(RateCollection $rates, $value)
    {
        $tax = 0.0;

        /* @var RateInterface $rate */
        foreach ($rates->primary() as $rate) {
            $tax = $tax + $this->calculator->calculate($rate, $value);
        }

        return $value + $tax;
    }

    /**
     * Process compound taxes.
     *
     * @param RateCollection $rates
     * @param                $value
     */
    public function compound(RateCollection $rates, $value)
    {
        /* @var RateInterface $rate */
        foreach ($rates->compound() as $rate) {
            $value = $this->calculator->apply($rate, $value);
        }

        return $value;
    }
}
