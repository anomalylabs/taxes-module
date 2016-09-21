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
     * Get the amount.
     *
     * @return float
     */
    public function getAmount();
}
