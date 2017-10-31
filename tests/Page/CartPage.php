<?php

namespace My\Page;

use Lmc\Steward\Component\AbstractComponent;

class CartPage extends AbstractComponent
{
    const PRODUCTS_IN_CART_NAME_SELECTOR = '#sylius-cart-items .sylius-product-name';
    const PRODUCTS_IN_CART_UNIT_PRICE_SELECTOR = '#sylius-cart-items .sylius-unit-price';

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

        // TODO

        return $productNames;
    }
}
