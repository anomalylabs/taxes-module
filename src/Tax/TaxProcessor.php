<?php namespace Anomaly\TaxesModule\Tax;

use Anomaly\CartsModule\Cart\Contract\CartInterface;
use Anomaly\CartsModule\Item\Contract\ItemInterface;
use Anomaly\CartsModule\Modifier\ModifierModel;
use Anomaly\CustomersModule\Customer\Contract\CustomerInterface;
use Anomaly\Streams\Platform\Support\Currency;
use Anomaly\TaxesModule\Rate\Contract\RateInterface;
use Anomaly\TaxesModule\Rate\RateCollection;

/**
 * Class TaxProcessor
 *
 * @link    http://pyrocms.com/
 * @author  PyroCMS, Inc. <support@pyrocms.com>
 * @author  Ryan Thompson <ryan@pyrocms.com>
 */
class TaxProcessor
{

    /**
     * The currency utility.
     *
     * @var Currency
     */
    protected $currency;

    /**
     * The tax processor.
     *
     * @var TaxApplicator
     */
    protected $applicator;

    /**
     * Create a new TaxApplicator instance.
     *
     * @param Currency $currency
     * @param TaxApplicator $applicator
     */
    public function __construct(Currency $currency, TaxApplicator $applicator)
    {
        $this->currency   = $currency;
        $this->applicator = $applicator;
    }

    /**
     * Apply taxes to a value.
     *
     * @param RateCollection $rates
     * @param float $value
     * @return float
     */
    public function apply(RateCollection $rates, $value)
    {
        return $this->currency->normalize(
            $this->applicator->compound($rates, $this->applicator->primary($rates, $value))
        );
    }

    /**
     * Calculate taxes on a value.
     *
     * @param RateCollection $rates
     * @param float $value
     * @return float
     */
    public function calculate(RateCollection $rates, $value)
    {
        return $this->currency->normalize(
            $this->applicator->compound($rates, $this->applicator->primary($rates, $value)) - $value
        );
    }

    /**
     * Apply the tax to the target.
     *
     * @param $target
     */
    public function process(CartInterface $target)
    {
        if (!$user = $target->getUser()) {
            return;
        }

        /* @var CustomerInterface $customer */
        if (!$customer = $user->call('get_customer')) {
            return;
        }

        if (!$address = $customer->getBillingAddress()) {
            return;
        }

        /* @var TaxResolver $resolver */
        $resolver = app(TaxResolver::class);

        /* @var TaxCalculator $calculator */
        $calculator = app(TaxCalculator::class);

        /* @var ItemInterface $item */
        foreach ($target->getItems() as $item) {

            if (!$rates = $resolver->resolve($item->getEntry(), $address)) {
                continue;
            }

            /* @var RateInterface $rate */
            foreach ($rates as $rate) {

                foreach ($item->getModifiers() as $modifier) {

                    if ($modifier->entry->toArray() == $rate->toArray()) {
                        return;
                    }
                }

                (new ModifierModel(
                    [
                        'type'  => 'tax',
                        'cart'  => ($item instanceof CartInterface) ? $item : $item->cart,
                        'item'  => ($item instanceof CartInterface) ? null : $item,
                        'value' => $calculator->calculate($rate, $item->getSubtotal()),
                        'entry' => $rate,
                    ]
                ))->save();
            }
        }
    }
}
