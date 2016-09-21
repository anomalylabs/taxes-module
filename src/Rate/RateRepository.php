<?php namespace Anomaly\TaxesModule\Rate;

use Anomaly\Streams\Platform\Entry\EntryRepository;
use Anomaly\TaxesModule\Rate\Contract\RateInterface;
use Anomaly\TaxesModule\Rate\Contract\RateRepositoryInterface;
use Anomaly\TaxesModule\Taxable\Contract\TaxableInterface;
use Illuminate\Database\Eloquent\Builder;

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

    /**
     * Find a tax rate by a taxable interface.
     *
     * @param TaxableInterface $taxable
     * @return RateCollection
     */
    public function findByTaxable(TaxableInterface $taxable)
    {
        $query = $this->model->where('tax_id', $taxable->getTaxId());

        if ($country = $taxable->getCountry()) {
            $query->where(
                function (Builder $query) use ($country) {
                    $query
                        ->where('country', $country)
                        ->orWhereNull('country');
                }
            );
        }

        if ($state = $taxable->getState()) {
            $query->where(
                function (Builder $query) use ($state) {
                    $query
                        ->where('state', $state)
                        ->orWhereNull('state');
                }
            );
        }

        if ($postalCode = $taxable->getPostalCode()) {
            $query->where(
                function (Builder $query) use ($postalCode) {
                    $query
                        ->where('postal_code', $postalCode)
                        ->orWhereNull('postal_code');
                }
            );
        }

        return $query->get();
    }
}
