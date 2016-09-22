<?php namespace Anomaly\TaxesModule\Tax;

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
     * Return if the zone matches the rate.
     *
     * @param RateInterface $rate
     * @param null          $country
     * @param null          $state
     * @param null          $postal
     * @return bool
     */
    public function matches(RateInterface $rate, array $parameters = [])
    {
        $country = array_get($parameters, 'country');

        if ($country && $rate->getCountry() && $rate->getCountry() != $country) {
            return false;
        }

        $state = array_get($parameters, 'state');

        if ($state && $rate->getState() && $rate->getState() != $state) {
            return false;
        }

        $postal = array_get($parameters, 'postal_code');

        if ($postal && $rate->getPostalCode() && $rate->getPostalCode() != $postal) {
            return false;
        }

        $city = array_get($parameters, 'city');

        if ($city && $rate->getCity() && $rate->getCity() != $city) {
            return false;
        }

        return true;
    }
}
