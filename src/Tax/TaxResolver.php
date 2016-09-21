<?php namespace Anomaly\TaxesModule\Tax;

use Anomaly\TaxesModule\Rate\Contract\RateRepositoryInterface;
use Anomaly\TaxesModule\Taxable\Contract\TaxableInterface;

/**
 * Class TaxResolver
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TaxResolver
{

    /**
     * The rate repository.
     *
     * @var RateRepositoryInterface
     */
    protected $rates;

    /**
     * Create a new TaxResolver instance.
     *
     * @param RateRepositoryInterface $rates
     */
    public function __construct(RateRepositoryInterface $rates)
    {
        $this->rates = $rates;
    }

    /**
     * Resolve the applicable tax rate.
     *
     * @param TaxableInterface $taxable
     */
    public function resolve(TaxableInterface $taxable)
    {
        return $this->rates->findByTaxable($taxable);
    }
}
