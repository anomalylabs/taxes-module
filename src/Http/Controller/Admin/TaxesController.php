<?php namespace Anomaly\TaxesModule\Http\Controller\Admin;

use Anomaly\TaxesModule\Tax\Form\TaxFormBuilder;
use Anomaly\TaxesModule\Tax\Table\TaxTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class TaxesController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param TaxTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(TaxTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param TaxFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(TaxFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param TaxFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(TaxFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
