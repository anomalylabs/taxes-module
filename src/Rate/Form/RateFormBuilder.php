<?php namespace Anomaly\TaxesModule\Rate\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\TaxesModule\Category\Contract\CategoryInterface;

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
     * The tax category.
     *
     * @var null|CategoryInterface
     */
    protected $category = null;

    /**
     * The skipped fields.
     *
     * @var array
     */
    protected $skips = [
        'category',
    ];

    /**
     * The form sections.
     *
     * @var array
     */
    protected $sections = [
        [
            'fields' => [
                'name',
                'rate',
                'priority',
                'compound',
            ],
        ],
        [
            'fields' => [
                'country',
                'state',
                'postal_code',
                'city',
            ],
        ],
    ];

    /**
     * Fired just before saving.
     */
    public function onSaving()
    {
        /* @var CategoryInterface $category */
        if ($category = $this->getCategory()) {

            $entry = $this->getFormEntry();

            $entry->setAttribute('category', $category);
        }
    }

    /**
     * Get the tax.
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
     * @param CategoryInterface $category
     * @return $this
     */
    public function setCategory(CategoryInterface $category)
    {
        $this->category = $category;

        return $this;
    }
}
