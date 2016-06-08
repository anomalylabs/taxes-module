<?php namespace Anomaly\TaxesModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\TaxesModule\State\Form\StateFormBuilder;
use Anomaly\TaxesModule\State\Table\StateTableBuilder;
use Illuminate\Contracts\Config\Repository;

/**
 * Class StatesController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TaxesModule\Http\Controller\Admin
 */
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
     * Choose a country.
     *
     * @param Repository $config
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function choose(Repository $config)
    {
        $common    = $config->get('streams::countries.common');
        $countries = $config->get('streams::countries.available');

        return $this->view->make('module::admin/states/choose', compact('common', 'countries'));
    }

    /**
     * Create a new entry.
     *
     * @param StateFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(StateFormBuilder $form)
    {
        return $form
            ->setCountry($this->request->get('country'))
            ->render();
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
