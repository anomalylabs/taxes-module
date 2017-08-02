<?php namespace Anomaly\TaxesModule\Tax;

use Anomaly\StoreModule\Contract\AddressInterface;
use Anomaly\StoreModule\Contract\TaxableInterface;
use Anomaly\TaxesModule\Rate\RateCollection;

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
     * @param AddressInterface $address
     * @return RateCollection
     */
    public function resolve(TaxableInterface $taxable, AddressInterface $address)
    {
        $category = $taxable->getTaxableCategory();

        return $category
            ->getRates()
            ->collect($address);
    }
}
