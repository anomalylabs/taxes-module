<?php namespace Anomaly\TaxesModule\Taxable\Command;

use Anomaly\TaxesModule\Tax\TaxProcessor;
use Anomaly\TaxesModule\Tax\TaxResolver;
use Anomaly\TaxesModule\Taxable\Contract\TaxableInterface;

/**
 * Class ApplyTaxes
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ApplyTaxes
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
     * Create a new ApplyTaxes instance.
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
        return $processor->apply($resolver->resolve($this->taxable, $this->parameters), $this->amount);
    }
}
