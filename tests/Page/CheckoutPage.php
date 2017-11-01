<?php

namespace My\Page;

use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverSelect;
use Lmc\Steward\Component\AbstractComponent;

class CheckoutPage extends AbstractComponent
{
    const SHIPPING_FORM_SELECTOR = '#sylius-shipping-address';
    const EMAIL_NAME = 'sylius_checkout_address[customer][email]';
    const ADDRESS_PREFIX = 'sylius_checkout_address[shippingAddress]';
    const FIRST_NAME_NAME = self::ADDRESS_PREFIX . '[firstName]';
    const LAST_NAME_NAME = self::ADDRESS_PREFIX . '[lastName]';
    const STREET_NAME = self::ADDRESS_PREFIX . '[street]';
    const COUNTRY_NAME = self::ADDRESS_PREFIX . '[countryCode]';
    const CITY_NAME = self::ADDRESS_PREFIX . '[city]';
    const POSTCODE_NAME = self::ADDRESS_PREFIX . '[postcode]';
    const NEXT_BUTTON_SELECTOR = '#next-step';

    public function waitUnitLoaded()
    {
        $this->waitForCss(self::SHIPPING_FORM_SELECTOR);
    }

    /**
     * @param string $value
     * @return $this
     */
    public function fillEmail($value)
    {
        $this->findByName(self::EMAIL_NAME)->sendKeys($value);

        return $this;
    }

    /**
     * @param string $firstName
     * @return $this
     */
    public function fillFirstName($firstName)
    {
        $this->findByName(self::FIRST_NAME_NAME)->sendKeys($firstName);

        return $this;
    }

    /**
     * @param string $lastName
     * @return $this
     */
    public function fillLastName($lastName)
    {
        $this->findByName(self::LAST_NAME_NAME)->sendKeys($lastName);

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function fillStreet($value)
    {
        $this->findByName(self::STREET_NAME)->sendKeys($value);

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function fillCountry($value)
    {
        $selectElement = $this->findByName(self::COUNTRY_NAME);

        $select = new WebDriverSelect($selectElement);

        $select->selectByVisibleText($value);

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function fillCity($value)
    {
        $this->findByName(self::CITY_NAME)->sendKeys($value);

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function fillPostcode($value)
    {
        $this->findByName(self::POSTCODE_NAME)->sendKeys($value);

        return $this;
    }

    public function submitAndWaitUntilSend()
    {
        $nextButton = $this->findByCss(self::NEXT_BUTTON_SELECTOR);

        $nextButton->click();

        // Note this should be part of ShippingPage page object, it is placed here only for simplicity of the example
        $this->wd->wait(15)->until(
            WebDriverExpectedCondition::urlContains('checkout/select-shipping')
        );
    }
}
