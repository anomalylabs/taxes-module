<?php namespace Anomaly\TaxesModule\State\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\TaxesModule\Country\Contract\CountryInterface;

/**
 * Interface StateInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TaxesModule\State\Contract
 */
interface StateInterface extends EntryInterface
{

    /**
     * Get the country.
     *
     * @return CountryInterface
     */
    public function getCountry();
}
