<?php namespace Anomaly\TaxesModule\Taxable\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\TaxesModule\Tax\Contract\TaxInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Interface TaxableInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TaxesModule\Taxable\Contract
 */
interface TaxableInterface extends EntryInterface
{

    /**
     * Get the taxable flag.
     *
     * @return bool
     */
    public function isTaxable();

    /**
     * Get the related tax.
     *
     * @return TaxInterface
     */
    public function getTax();

    /**
     * Return the tax relation.
     *
     * @return BelongsTo
     */
    public function tax();
}
