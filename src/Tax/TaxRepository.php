<?php namespace Anomaly\TaxesModule\Tax;

use Anomaly\TaxesModule\Tax\Contract\TaxRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class TaxRepository extends EntryRepository implements TaxRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var TaxModel
     */
    protected $model;

    /**
     * Create a new TaxRepository instance.
     *
     * @param TaxModel $model
     */
    public function __construct(TaxModel $model)
    {
        $this->model = $model;
    }
}
