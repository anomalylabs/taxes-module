<?php namespace Anomaly\TaxesModule\Rate;

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
     * Return matching rates.
     *
     * @param null $country
     * @param null $state
     * @param null $postal
     * @return RateCollection
     */
    public function resolve(array $parameters = [])
    {
        $rates = [];

        foreach ($this->priorities() as $priority) {
            foreach ($this->priority($priority) as $rate) {
                if ((new TaxMatcher())->matches($rate, $parameters)) {

                    $rates[] = $rate;

                    break;
                }
            }
        }

        return $this->make($rates);
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
}
