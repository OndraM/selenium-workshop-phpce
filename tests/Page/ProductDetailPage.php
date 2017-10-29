<?php

namespace My\Page;

use Lmc\Steward\Component\AbstractComponent;
use My\AbstractTestCase;

class ProductDetailPage extends AbstractComponent
{
    const HEADER_SELECTOR = 'h1';
    const PRICE_SELECTOR = '#product-price';

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
}
