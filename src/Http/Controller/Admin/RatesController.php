<?php namespace Anomaly\TaxesModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\TaxesModule\Rate\Form\RateFormBuilder;
use Anomaly\TaxesModule\Rate\Table\RateTableBuilder;
use Anomaly\TaxesModule\Tax\Contract\TaxInterface;
use Anomaly\TaxesModule\Tax\Contract\TaxRepositoryInterface;

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
     * @param RateTableBuilder       $table
     * @param TaxRepositoryInterface $taxes
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(RateTableBuilder $table, TaxRepositoryInterface $taxes)
    {
        /* @var TaxInterface $tax */
        if ($tax = $taxes->find($this->route->getParameter('tax'))) {

            $this->template->set('tax', $tax);

            $table->setTax($tax);
        }

        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param RateFormBuilder        $form
     * @param TaxRepositoryInterface $taxes
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(RateFormBuilder $form, TaxRepositoryInterface $taxes)
    {dd($taxes->find($this->route->getParameter('tax')));
        /* @var TaxInterface $tax */
        if ($tax = $taxes->find($this->route->getParameter('tax'))) {
            dd($tax);
            $form->setTax($tax);
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
        return $form->render($this->route->getParameter('id'));
    }
}
