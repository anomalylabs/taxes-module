<?php namespace Anomaly\TaxesModule\Http\Controller\Admin;

use Anomaly\TaxesModule\State\Form\StateFormBuilder;
use Anomaly\TaxesModule\State\Table\StateTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class StatesController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param StateTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(StateTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param StateFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(StateFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param StateFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(StateFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
