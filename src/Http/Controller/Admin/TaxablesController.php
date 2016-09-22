<?php namespace Anomaly\TaxesModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\TaxesModule\Taxable\Form\TaxableFormBuilder;
use Anomaly\TaxesModule\Taxable\Table\TaxableTableBuilder;

class TaxablesController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param TaxableTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(TaxableTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param TaxableFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(TaxableFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param TaxableFormBuilder $form
     * @param                    $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(TaxableFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
