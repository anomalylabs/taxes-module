<?php namespace Anomaly\TaxesModule\Rate\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

/**
 * Interface RateInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface RateInterface extends EntryInterface
{

    /**
     * Apply the tax rate to the value.
     *
     * @param float $value
     * @return float
     */
    public function apply($value);

    /**
     * Deduct the tax rate from the value.
     *
     * @param float $value
     * @return float
     */
    public function deduct($value);

    /**
     * Calculate the tax rate for the value.
     *
     * @param float $value
     * @return float
     */
    public function calculate($value);

    /**
     * Get the rate.
     *
     * @return float
     */
    public function getRate();

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the priority.
     *
     * @return int
     */
    public function getPriority();

    /**
     * Return the compound flag.
     *
     * @return bool
     */
    public function isCompound();

    /**
     * Get the country.
     *
     * @return string|null
     */
    public function getCountry();

    /**
     * Get the state.
     *
     * @return string|null
     */
    public function getState();

    /**
     * Get the postal code.
     *
     * @return string|null
     */
    public function getPostalCode();

    /**
     * Get the city.
     *
     * @return string|null
     */
    public function getCity();
}
