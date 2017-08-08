<?php namespace Anomaly\TaxesModule\Rate;

use Anomaly\StoreModule\Contract\AddressInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\TaxesModule\Rate\Contract\RateInterface;
use Anomaly\TaxesModule\Tax\TaxMatcher;

/**
 * Class RateCollection
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class RateCollection extends EntryCollection
{

    /**
     * Collect matching rates.
     *
     * @param AddressInterface $address
     * @return RateCollection
     */
    public function collect(AddressInterface $address)
    {
        $rates = [];

        $matcher = new TaxMatcher();

        foreach ($this->priorities() as $priority) {
            foreach ($this->priority($priority) as $rate) {

                if ($matcher->matches($rate, $address)) {

                    $rates[] = $rate;

                    break;
                }
            }
        }

        return $this->make($rates);
    }

    /**
     * Return the priorities.
     *
     * @return array
     */
    protected function priorities()
    {
        $priorities = $this->map(
            function ($rate) {

                /* @var RateInterface $rate */
                return $rate->getPriority();
            }
        )->all();

        asort($priorities);

        return array_unique($priorities);
    }

    /**
     * Return rates of a certain priority.
     *
     * @param $level
     * @return RateCollection
     */
    public function priority($priority)
    {
        return $this->filter(
            function ($rate) use ($priority) {

                /* @var RateInterface $rate */
                return $rate->getPriority() == $priority;
            }
        );
    }

    /**
     * Return only primary taxes.
     *
     * @return RateCollection
     */
    public function primary()
    {
        return $this->filter(
            function ($rate) {

                /* @var RateInterface $rate */
                return !$rate->isCompound();
            }
        );
    }

    /**
     * Return only compound taxes.
     *
     * @return RateCollection
     */
    public function compound()
    {
        return $this->filter(
            function ($rate) {

                /* @var RateInterface $rate */
                return $rate->isCompound();
            }
        );
    }
}
