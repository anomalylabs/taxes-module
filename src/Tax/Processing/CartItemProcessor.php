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
        if ($item->getModifiers()->findBy('type', 'tax')) {
            return;
        }

        $item->modifiers()->create(
            [
                'name'  => 'State Tax',
                'type'  => 'tax',
                'value' => '7.025%',
                'cart'  => $item->getCart(),
            ]
        );
    }
}
