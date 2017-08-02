<?php namespace Anomaly\TaxesModule\Rate\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Anomaly\TaxesModule\Category\CategoryModel;
use Anomaly\TaxesModule\Category\Contract\CategoryInterface;
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
     * The tax category.
     *
     * @var null|CategoryModel
     */
    protected $category = null;

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'name',
        'entry.country.value ?: "*"',
        'entry.state.value ?: "*"',
        'entry.postal_code.value ?: "*"',
        'rate' => [
            'wrapper' => '{value}%',
        ],
        'priority',
        'entry.compound.istrue ? entry.compound.label',
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
        'heading' => 'module::admin/rates/heading',
    ];

    /**
     * Fired just before querying.
     *
     * @param Builder $query
     */
    public function onQuerying(Builder $query)
    {
        if ($category = $this->getCategory()) {
            $query->where('category_id', $category->getId());
        }
    }

    /**
     * Get the category.
     *
     * @return CategoryInterface|null
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the category.
     *
     * @param CategoryInterface $tax
     * @return $this
     */
    public function setCategory(CategoryInterface $tax)
    {
        $this->tax = $tax;

        return $this;
    }
}
