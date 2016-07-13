<?php namespace Anomaly\TaxesModule\Rate\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Anomaly\TaxesModule\Tax\Contract\TaxInterface;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class RateTableBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TaxesModule\Rate\Table
 */
class RateTableBuilder extends TableBuilder
{

    /**
     * The tax instance.
     *
     * @var null|TaxInterface
     */
    protected $tax = null;

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'name',
        'country',
        'state',
        'postal_code',
        'rate',
        'entry.compound.label',
    ];

    /**
     * The table buttons.
     *
     * @var array
     */
    protected $buttons = [
        'edit',
    ];

    /**
     * The table actions.
     *
     * @var array
     */
    protected $actions = [
        'delete',
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [
        'heading' => 'module::admin/rates/heading'
    ];

    /**
     * Fired just before querying.
     *
     * @param Builder $query
     */
    public function onQuerying(Builder $query)
    {
        if ($tax = $this->getTax()) {
            $query->where('tax_id', $tax->getId());
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
