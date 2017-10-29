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
}
