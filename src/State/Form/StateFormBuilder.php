<?php namespace Anomaly\TaxesModule\State\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\TaxesModule\State\Contract\StateInterface;

/**
 * Class StateFormBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TaxesModule\State\Form
 */
class StateFormBuilder extends FormBuilder
{

    /**
     * The country to
     * limit states to.
     *
     * @var null|string
     */
    protected $country = null;

    /**
     * The skipped fields.
     *
     * @var array
     */
    protected $skips = [
        'country'
    ];

    /**
     * Fired after form is built.
     */
    public function onBuilt()
    {
        /* @var StateInterface $state */
        if ($this->getFormMode() == 'edit' && $state = $this->getFormEntry()) {
            $this->setCountry($state->getCountry());
        }

        $field = $this->getFormField('state');

        // TODO: need something better than merge! addConfig($key, $value);
        $field->mergeConfig(['country' => $this->getCountry()]);
    }

    /**
     * Get the country.
     *
     * @return null|string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the country.
     *
     * @param $country
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Fired just before saving.
     */
    public function onSaving()
    {
        $state = $this->getFormEntry();

        if ($country = $this->getCountry()) {
            $state->setAttribute('country', $country);
        }
    }

}
