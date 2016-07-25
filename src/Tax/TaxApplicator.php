<?php namespace Anomaly\TaxesModule\Tax;

use Anomaly\OrdersModule\Order\Contract\OrderInterface;

/**
 * Class TaxApplicator
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TaxesModule\Tax
 */
class TaxApplicator
{

    /**
     * Apply taxes to an order.
     *
     * @param OrderInterface $order
     */
    public function apply(OrderInterface $order)
    {
        $order->setAttribute('tax', $order->subtotal() * 0.0675);
    }
}
