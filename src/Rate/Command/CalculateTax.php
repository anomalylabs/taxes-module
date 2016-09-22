<?php namespace Anomaly\TaxesModule\Rate\Command;

use Anomaly\TaxesModule\Rate\Contract\RateInterface;
use Anomaly\TaxesModule\Tax\TaxCalculator;

/**
 * Class CalculateTax
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CalculateTax
{

    /**
     * The tax rate.
     *
     * @var RateInterface
     */
    protected $rate;

    /**
     * The taxable value.
     *
     * @var float
     */
    protected $value;

    /**
     * Create a new CalculateTax instance.
     *
     * @param RateInterface $rate
     * @param float         $value
     */
    public function __construct(RateInterface $rate, $value)
    {
        $this->rate  = $rate;
        $this->value = $value;
    }

    /**
     * Handle the command.
     *
     * @param TaxCalculator $calculator
     * @return float
     */
    public function handle(TaxCalculator $calculator)
    {
        return $calculator->calculate($this->rate, $this->value);
    }
}
