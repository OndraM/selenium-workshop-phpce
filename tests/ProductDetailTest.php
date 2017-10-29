<?php

namespace My;

use Facebook\WebDriver\WebDriverBy;

class ProductDetailTest extends AbstractTestCase
{
    /**
     * @test
     */
    public function shouldDisplayBasicProductInformation()
    {
        $this->wd->get(static::getBaseUrl() . 'products/t-shirt-minus');

        $header = $this->wd->findElement(WebDriverBy::cssSelector('h1'))
            ->getText();
        // Or use syntax sugar: $header = $this->findByCss('h1')->getText();
        $this->assertSame('T-Shirt "minus"', $header);

        $this->debug('Product detail header was: ' . $header);

        $price = $this->wd->findElement(WebDriverBy::cssSelector('#product-price'))
            ->getText();
        // Or use syntax sugar: $price = $this->findByCss('#product-price')->getText();
        $this->assertSame('€1.48', $price);

        $this->debug('Product detail header was: ' . $price);
    }
}
