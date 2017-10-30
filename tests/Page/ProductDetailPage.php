<?php

namespace My\Page;

use Lmc\Steward\Component\AbstractComponent;
use My\AbstractTestCase;

class ProductDetailPage extends AbstractComponent
{
    const HEADER_SELECTOR = 'h1';
    const PRICE_SELECTOR = '#product-price';
    const ADD_TO_CART_BUTTON_SELECTOR = '#sylius-product-adding-to-cart button.primary';

    /**
     * @param string $slug
     */
    public function openProductWithSlug($slug)
    {
        $this->wd->get(AbstractTestCase::getBaseUrl() . 'products/' . $slug);
    }

    /**
     * @return string
     */
    public function getHeader()
    {
        return $this->findByCss(self::HEADER_SELECTOR)->getText();
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->findByCss(self::PRICE_SELECTOR)->getText();
    }

    /**
     * @return CartPage
     */
    public function addToCart()
    {
        $this->findByCss(self::ADD_TO_CART_BUTTON_SELECTOR)->click();

        $cartPage = new CartPage($this->tc);
        $cartPage->waitUnitLoaded();

        return $cartPage;
    }
}
