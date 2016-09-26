<?php namespace Anomaly\TaxesModule\Taxable\Command;

use Anomaly\TaxesModule\Rate\Contract\RateInterface;
use Anomaly\TaxesModule\Tax\TaxProcessor;
use Anomaly\TaxesModule\Tax\TaxResolver;
use Anomaly\TaxesModule\Taxable\Contract\TaxableInterface;

/**
 * Class GatherTaxes
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class GatherTaxes
{

    /**
     * The taxable amount.
     *
     * @var float
     */
    protected $amount;

    /**
     * The taxable interface.
     *
     * @var TaxableInterface
     */
    protected $taxable;

    /**
     * The tax parameters.
     *
     * @var array
     */
    protected $parameters;

    /**
     * Create a new GatherTaxes instance.
     *
     * @param TaxableInterface $taxable
     * @param float            $amount
     * @param array            $parameters
     */
    public function __construct(TaxableInterface $taxable, $amount, array $parameters = [])
    {
        $this->amount     = $amount;
        $this->taxable    = $taxable;
        $this->parameters = $parameters;
    }

    /**
     * Handle the command.
     *
     * @param TaxResolver  $resolver
     * @param TaxProcessor $processor
     */
    public function handle(TaxResolver $resolver, TaxProcessor $processor)
    {
        $rates = $resolver->resolve($this->taxable, $this->parameters);

        $primary = $rates->primary()->map(
            function ($rate) {

                /* @var RateInterface $rate */
                $amount = $rate->calculate($this->amount);

                return array_merge($rate->toArray(), compact('amount'));
            }
        )->all();

        $amount = $processor->apply($rates->primary(), $this->amount);

        $compound = $rates->compound()->map(
            function ($rate) use ($amount) {

                /* @var RateInterface $rate */
                $amount = $rate->calculate($amount);

                return array_merge($rate->toArray(), compact('amount'));
            }
        )->all();

        return $primary + $compound;
    }
}
