<?php

namespace My;

use My\Page\ProductDetailPage;

class ProductDetailTest extends AbstractTestCase
{
    /** @var ProductDetailPage */
    private $productDetailPage;

    /** @before */
    public function init()
    {
        $this->productDetailPage = new ProductDetailPage($this);
    }

    /**
     * @test
     */
    public function shouldDisplayBasicProductInformation()
    {
        $this->productDetailPage->openProductWithSlug('t-shirt-minus');

        $header = $this->productDetailPage->getHeader();
        $this->assertSame('T-Shirt "minus"', $header);

        $this->debug('Product detail header was: ' . $header);

        $price = $this->productDetailPage->getPrice();
        $this->assertSame('€1.48', $price);

        $this->debug('Product detail header was: ' . $price);
    }

    /** @test */
    public function shouldAddProductToCart()
    {
        $this->productDetailPage->openProductWithSlug('t-shirt-minus');

        $priceOnProductDetail = $this->productDetailPage->getPrice();

        $cartPage = $this->productDetailPage->addToCart();

        // Make sure the product in the cart is the one we added previously
        $productInCartName = $cartPage->getNameOfFirstProductInCart();
        $this->assertContains('"minus"', $productInCartName);

        // Also check the price is the same as the one shown on product detail
        $productInCartPrice = $cartPage->getUnitPriceOfFirstProductInCart();
        $this->assertSame($productInCartPrice, $priceOnProductDetail);
    }
}
