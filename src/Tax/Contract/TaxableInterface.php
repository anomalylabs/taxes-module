<?php namespace Anomaly\TaxesModule\Tax\Contract;

use Anomaly\TaxesModule\Category\Contract\CategoryInterface;

/**
 * Interface TaxableInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface TaxableInterface
{

    /**
     * Return if taxable or not.
     *
     * @return bool
     */
    public function isTaxable();

    /**
     * Return the tax class.
     *
     * @return CategoryInterface
     */
    public function getTaxableCategory();

}
