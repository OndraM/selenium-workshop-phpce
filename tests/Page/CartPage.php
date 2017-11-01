<?php

namespace My\Page;

use Lmc\Steward\Component\AbstractComponent;

class CartPage extends AbstractComponent
{
    const PRODUCTS_IN_CART_NAME_SELECTOR = '#sylius-cart-items .sylius-product-name';
    const PRODUCTS_IN_CART_UNIT_PRICE_SELECTOR = '#sylius-cart-items .sylius-unit-price';
    const CHECKOUT_BUTTON_SELECTOR = 'a.primary.labeled.button';

    public function waitUnitLoaded()
    {
        $this->waitForPartialTitle('Your shopping cart');
    }

    /**
     * @return string
     */
    public function getNameOfFirstProductInCart()
    {
        return $this->findByCss(self::PRODUCTS_IN_CART_NAME_SELECTOR)->getText();
    }

    /**
     * @return string
     */
    public function getUnitPriceOfFirstProductInCart()
    {
        return $this->findByCss(self::PRODUCTS_IN_CART_UNIT_PRICE_SELECTOR)->getText();
    }

    /**
     * @return string[]
     */
    public function getNamesOfProductsInCart()
    {
        $productNames = [];

        $productNamesElements = $this->findMultipleByCss(self::PRODUCTS_IN_CART_NAME_SELECTOR);

        foreach ($productNamesElements as $element) {
            $productNames[] = $element->getText();
            $this->log($element->getText());
        }

        return $productNames;
    }

    /**
     * @return CheckoutPage
     */
    public function goToCheckout()
    {
        $this->findByCss(self::CHECKOUT_BUTTON_SELECTOR)->click();

        $checkoutPage = new CheckoutPage($this->tc);
        $checkoutPage->waitUnitLoaded();

        return $checkoutPage;
    }
}
