<?php namespace Anomaly\TaxesModule\Tax;

use Anomaly\Streams\Platform\Support\Currency;
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
     * The currency utility.
     *
     * @var Currency
     */
    protected $currency;

    /**
     * The tax processor.
     *
     * @var TaxApplicator
     */
    protected $applicator;

    /**
     * Create a new TaxApplicator instance.
     *
     * @param Currency      $currency
     * @param TaxApplicator $applicator
     */
    public function __construct(Currency $currency, TaxApplicator $applicator)
    {
        $this->currency   = $currency;
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
        return $this->currency->normalize(
            $this->applicator->compound($rates, $this->applicator->primary($rates, $value))
        );
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
        return $this->currency->normalize(
            $this->applicator->compound($rates, $this->applicator->primary($rates, $value)) - $value
        );
    }
}
