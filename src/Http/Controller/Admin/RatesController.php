<?php namespace Anomaly\TaxesModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\TaxesModule\Category\Contract\CategoryInterface;
use Anomaly\TaxesModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\TaxesModule\Rate\Form\RateFormBuilder;
use Anomaly\TaxesModule\Rate\Table\RateTableBuilder;

/**
 * Class RatesController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TaxesModule\Http\Controller\Admin
 */
class RatesController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param RateTableBuilder $table
     * @param CategoryRepositoryInterface $categories
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(RateTableBuilder $table, CategoryRepositoryInterface $categories)
    {
        /* @var CategoryInterface $category */
        if ($category = $categories->find($this->route->parameter('tax'))) {

            $this->template->set('category', $category);

            $table->setCategory($category);
        }

        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param RateFormBuilder $form
     * @param CategoryRepositoryInterface $categories
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(RateFormBuilder $form, CategoryRepositoryInterface $categories)
    {
        /* @var CategoryInterface $category */
        if ($category = $categories->find($this->route->parameter('tax'))) {
            $form->setCategory($category);
        }

        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param RateFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(RateFormBuilder $form)
    {
        return $form->render($this->route->parameter('id'));
    }
}
