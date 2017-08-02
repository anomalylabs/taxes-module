<?php namespace Anomaly\TaxesModule\Tax;

use Anomaly\StoreModule\Contract\AddressInterface;
use Anomaly\TaxesModule\Rate\Contract\RateInterface;

/**
 * Class TaxMatcher
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TaxMatcher
{

    /**
     * Return if the rate matches the parameters.
     *
     * @param RateInterface    $rate
     * @param AddressInterface $address
     * @return bool
     */
    public function matches(RateInterface $rate, AddressInterface $address)
    {
        if (!$this->applies($address->getCountry(), $rate->getCountry())) {
            return false;
        }

        if (!$this->applies($address->getState(), $rate->getState())) {
            return false;
        }

        if (!$this->applies($address->getPostalCode(), $rate->getPostalCode())) {
            return false;
        }

        if (!$this->applies($address->getCity(), $rate->getCity())) {
            return false;
        }

        return true;
    }

    /**
     * Return if a zone applies
     * based on a parameter value.
     *
     * @param $parameter
     * @param $rate
     * @return bool
     */
    protected function applies($parameter, $rate)
    {
        if (!$parameter && !$rate) {
            return true;
        }

        if (!$parameter && $rate) {
            return false;
        }

        if (is_string($rate) && $parameter && $rate && $parameter != $rate) {
            return false;
        }

        return true;
    }
}
