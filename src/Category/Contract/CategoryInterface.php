<?php namespace Anomaly\TaxesModule\Category\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\TaxesModule\Rate\RateCollection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Interface CategoryInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface CategoryInterface extends EntryInterface
{

    /**
     * Get the related rates.
     *
     * @return RateCollection
     */
    public function getRates();

    /**
     * Get the rates relation.
     *
     * @return HasMany
     */
    public function rates();
}
