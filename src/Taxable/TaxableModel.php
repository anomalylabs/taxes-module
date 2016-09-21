<?php namespace Anomaly\TaxesModule\Taxable;

use Anomaly\Streams\Platform\Model\EloquentModel;
use Anomaly\Streams\Platform\Model\Taxes\TaxesTaxablesEntryModel;
use Anomaly\TaxesModule\Rate\RateCollection;
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
     * Get the taxable country.
     *
     * @return string|null
     */
    public function getCountry()
    {
        $item = $this->getItem();

        // Route to the hook / method.
        return $item->getTaxableCountry();
    }

    /**
     * Get the taxable state.
     *
     * @return string|null
     */
    public function getState()
    {
        $item = $this->getItem();

        // Route to the hook / method.
        return $item->getTaxableState();
    }

    /**
     * Get the taxable postal code.
     *
     * @return string|null
     */
    public function getPostalCode()
    {
        $item = $this->getItem();

        // Route to the hook / method.
        return $item->getTaxablePostalCode();
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

    /**
     * Get the related tax ID.
     *
     * @return int
     */
    public function getTaxId()
    {
        return $this->tax_id;
    }

    /**
     * Get the related tax rates.
     *
     * @return RateCollection
     */
    public function getTaxRates()
    {
        $tax = $this->getTax();

        return $tax->getRates();
    }

    /**
     * Get the related item.
     *
     * @return EloquentModel
     */
    public function getItem()
    {
        return $this->item;
    }
}
