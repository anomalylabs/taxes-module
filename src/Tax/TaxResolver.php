<?php namespace Anomaly\TaxesModule\Tax;

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
     * Resolve the applicable tax rate.
     *
     * @param TaxableInterface $taxable
     * @param null             $country
     * @param null             $state
     * @param null             $postal
     */
    public function resolve(TaxableInterface $taxable, array $parameters = [])
    {
        $rates = $taxable->getTaxRates();

        return $rates->resolve($parameters);
    }
}
