<?php namespace Anomaly\TaxesModule\Rate\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\TaxesModule\Tax\Contract\TaxInterface;

/**
 * Class RateFormBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TaxesModule\Rate\Form
 */
class RateFormBuilder extends FormBuilder
{

    /**
     * The tax interface.
     *
     * @var null|TaxInterface
     */
    protected $tax = null;

    /**
     * The skipped fields.
     *
     * @var array
     */
    protected $skips = [
        'tax',
    ];

    /**
     * Fired just before saving.
     */
    public function onSaving()
    {
        /* @var TaxInterface $tax */
        if ($tax = $this->getTax()) {

            $entry = $this->getFormEntry();

            $entry->setAttribute('tax', $tax);
        }
    }

    /**
     * Get the tax.
     *
     * @return TaxInterface|null
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set the tax.
     *
     * @param TaxInterface $tax
     * @return $this
     */
    public function setTax(TaxInterface $tax)
    {
        $this->tax = $tax;

        return $this;
    }
}
