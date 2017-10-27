<?php

namespace My;

abstract class AbstractTestCase extends \Lmc\Steward\Test\AbstractTestCase
{
    /**
     * @return string
     */
    public static function getBaseUrl()
    {
        return 'https://phpce-gz65nia-mxk4rjvb4la6e.eu.platform.sh/';
    }
}
