<?php namespace Anomaly\TaxesModule\Taxable;

use Anomaly\Streams\Platform\Model\Taxes\TaxesTaxablesEntryModel;
use Anomaly\TaxesModule\Tax\Contract\TaxInterface;
use Anomaly\TaxesModule\Taxable\Contract\TaxableInterface;

/**
 * Class TaxableModel
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TaxesModule\Taxable
 */
class TaxableModel extends TaxesTaxablesEntryModel implements TaxableInterface
{

    /**
     * Get the taxable flag.
     *
     * @return bool
     */
    public function isTaxable()
    {
        return $this->taxable;
    }

    /**
     * Get the related tax.
     *
     * @return TaxInterface
     */
    public function getTax()
    {
        return $this->tax;
    }
}
