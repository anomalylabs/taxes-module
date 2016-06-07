<?php namespace Anomaly\TaxesModule\State;

use Anomaly\TaxesModule\State\Contract\StateRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class StateRepository extends EntryRepository implements StateRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var StateModel
     */
    protected $model;

    /**
     * Create a new StateRepository instance.
     *
     * @param StateModel $model
     */
    public function __construct(StateModel $model)
    {
        $this->model = $model;
    }
}
