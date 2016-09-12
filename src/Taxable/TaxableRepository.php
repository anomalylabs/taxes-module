<?php namespace Anomaly\TaxesModule\Taxable;

use Anomaly\TaxesModule\Taxable\Contract\TaxableRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class TaxableRepository extends EntryRepository implements TaxableRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var TaxableModel
     */
    protected $model;

    /**
     * Create a new TaxableRepository instance.
     *
     * @param TaxableModel $model
     */
    public function __construct(TaxableModel $model)
    {
        $this->model = $model;
    }
}
