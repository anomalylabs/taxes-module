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
     * Return if the rate matches the parameters.
     *
     * @param RateInterface $rate
     * @param array         $parameters
     * @return bool
     */
    public function matches(RateInterface $rate, array $parameters = [])
    {
        if (!$this->applies(array_get($parameters, 'country'), $rate->getCountry())) {
            return false;
        }

        if (!$this->applies(array_get($parameters, 'state'), $rate->getState())) {
            return false;
        }

        if (!$this->applies(array_get($parameters, 'postal_code'), $rate->getPostalCode())) {
            return false;
        }

        if (!$this->applies(array_get($parameters, 'city'), $rate->getCity())) {
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
