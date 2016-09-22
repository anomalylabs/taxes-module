<?php namespace Anomaly\TaxesModule\Rate;

use Anomaly\Streams\Platform\Entry\EntryRepository;
use Anomaly\TaxesModule\Rate\Contract\RateRepositoryInterface;

/**
 * Class RateRepository
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class RateRepository extends EntryRepository implements RateRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var RateModel
     */
    protected $model;

    /**
     * Create a new RateRepository instance.
     *
     * @param RateModel $model
     */
    public function __construct(RateModel $model)
    {
        $this->model = $model;
    }
}
