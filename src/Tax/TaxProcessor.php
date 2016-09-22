<?php namespace Anomaly\TaxesModule\Tax;

use Anomaly\TaxesModule\Rate\RateCollection;

/**
 * Class TaxProcessor
 *
 * @link    http://pyrocms.com/
 * @author  PyroCMS, Inc. <support@pyrocms.com>
 * @author  Ryan Thompson <ryan@pyrocms.com>
 */
class TaxProcessor
{

    /**
     * The tax processor.
     *
     * @var TaxApplicator
     */
    protected $applicator;

    /**
     * Create a new TaxApplicator instance.
     *
     * @param TaxApplicator $applicator
     */
    public function __construct(TaxApplicator $applicator)
    {
        $this->applicator = $applicator;
    }

    /**
     * Apply taxes to a value.
     *
     * @param RateCollection $rates
     * @param float          $value
     * @return float
     */
    public function apply(RateCollection $rates, $value)
    {
        return $this->applicator->compound($rates, $this->applicator->primary($rates, $value));
    }

    /**
     * Calculate taxes on a value.
     *
     * @param RateCollection $rates
     * @param float          $value
     * @return float
     */
    public function calculate(RateCollection $rates, $value)
    {
        return $this->applicator->compound($rates, $this->applicator->primary($rates, $value)) - $value;
    }
}
