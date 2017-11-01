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

        $checkoutPage = $cartPage->goToCheckout();

        $checkoutPage
            ->fillEmail($this->faker->email)
            ->fillFirstName($this->faker->firstName)
            ->fillLastName($this->faker->lastName)
            ->fillStreet($this->faker->streetName)
            ->fillCountry('United Kingdom')
            ->fillCity($this->faker->city)
            ->fillPostcode($this->faker->postcode);

        $checkoutPage->submitAndWaitUntilSend();

        // ... other steps not implemented to make the example short
    }

    /** @test */
    public function shouldLoginExistingUserDuringCheckout()
    {
        $productDetailPage = new ProductDetailPage($this);

        $productDetailPage->openProductWithSlug('sticker-laborum');
        $cartPage = $productDetailPage->addToCart();

        $checkoutPage = $cartPage->goToCheckout();

        $checkoutPage->fillEmail('user@example.com');

        // TODO: wait until login form is shown

        // TODO: fill password to the newly shown form (password is "sylius")

        // TODO: submit form (use $checkoutPage->submitLoginFormAndWaitForLogin())

        // TODO: assert $checkoutPage->getNameOfLoggedUser() contains John Doe
    }
}
