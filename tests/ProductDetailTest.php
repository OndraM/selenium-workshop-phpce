<?php

namespace My;

class ProductDetailTest extends AbstractTestCase
{
    /**
     * @test
     */
    public function shouldDisplayBasicProductInformation()
    {
        $this->wd->get(static::getBaseUrl() . 'products/t-shirt-minus');

        sleep(5);
    }
}
