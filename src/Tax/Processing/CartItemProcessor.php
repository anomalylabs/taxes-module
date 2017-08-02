<?php namespace Anomaly\TaxesModule\Tax\Processing;

use Anomaly\CartsModule\Item\Contract\ItemInterface;

/**
 * Class CartItemProcessor
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CartItemProcessor
{

    /**
     * Process the item.
     *
     * @param ItemInterface $item
     */
    public function process(ItemInterface $item)
    {
        $item->setAttribute('tax', $item->getSubtotal() * .07025);
    }
}
