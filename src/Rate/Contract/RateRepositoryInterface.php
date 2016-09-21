<?php namespace Anomaly\TaxesModule\Rate\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;
use Anomaly\TaxesModule\Rate\RateCollection;
use Anomaly\TaxesModule\Taxable\Contract\TaxableInterface;

/**
 * Interface RateRepositoryInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface RateRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Find a tax rate by a taxable interface.
     *
     * @param TaxableInterface $taxable
     * @return RateCollection
     */
    public function findByTaxable(TaxableInterface $taxable);
}
