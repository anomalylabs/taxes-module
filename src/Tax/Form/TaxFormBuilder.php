<?php namespace Anomaly\TaxesModule\Tax\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class TaxFormBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TaxesModule\Tax\Form
 */
class TaxFormBuilder extends FormBuilder
{

    /**
     * The form buttons.
     *
     * @var array
     */
    protected $buttons = [
        'cancel',
        'rates' => [
            'icon'    => 'percent',
            'type'    => 'primary',
            'enabled' => 'edit',
            'text'    => 'anomaly.module.taxes::button.rates',
        ],
    ];
}
