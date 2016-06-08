<?php namespace Anomaly\TaxesModule\State;

use Anomaly\TaxesModule\Country\Contract\CountryInterface;
use Anomaly\TaxesModule\State\Contract\StateInterface;
use Anomaly\Streams\Platform\Model\Taxes\TaxesStatesEntryModel;

/**
 * Class StateModel
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TaxesModule\State
 */
class StateModel extends TaxesStatesEntryModel implements StateInterface
{

    /**
     * Get the country.
     *
     * @return CountryInterface
     */
    public function getCountry()
    {
        return $this->country;
    }
}
