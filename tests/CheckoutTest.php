<?php

namespace My;

use Faker\Factory;
use Faker\Generator;
use My\Page\ProductDetailPage;

class CheckoutTest extends AbstractTestCase
{
    /** @var Generator */
    protected $faker;

    /** @before */
    public function init()
    {
        $this->faker = Factory::create('en_GB');
    }

    /** @test */
    public function shouldSubmitOrder()
    {
        $productDetailPage = new ProductDetailPage($this);

        $productDetailPage->openProductWithSlug('sticker-laborum');
        $cartPage = $productDetailPage->addToCart();

        // TODO: go to checkout page

        /* TODO: fill all required shipping address fields:
            - Email
            - FirstName
            - LastName
            - Street
            - Country
            - City
            - Postcode
        */

        // TODO: submit form with shipping address
    }
}
