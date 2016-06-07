<?php namespace Anomaly\TaxesModule\Country;

use Anomaly\TaxesModule\Country\Contract\CountryRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class CountryRepository extends EntryRepository implements CountryRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var CountryModel
     */
    protected $model;

    /**
     * Create a new CountryRepository instance.
     *
     * @param CountryModel $model
     */
    public function __construct(CountryModel $model)
    {
        $this->model = $model;
    }
}
