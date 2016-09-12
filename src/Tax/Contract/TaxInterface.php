<?php namespace Anomaly\TaxesModule\Tax\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\TaxesModule\Rate\RateCollection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Interface TaxInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TaxesModule\Tax\Contract
 */
interface TaxInterface extends EntryInterface
{

    /**
     * Get the related rates.
     *
     * @return RateCollection
     */
    public function getRates();

    /**
     * Return the pages relationship.
     *
     * @return HasMany
     */
    public function rates();
}
