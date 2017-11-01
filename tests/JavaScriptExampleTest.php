<?php

namespace My;

use Lmc\Steward\Test\AbstractTestCase;

class JavaScriptExampleTest extends AbstractTestCase
{
    /** @test */
    public function changeValueOfHiddenInput()
    {
        $this->wd->get('https://simple-u6rzw4q-mxk4rjvb4la6e.eu.platform.sh/hidden.html');

        $hiddenInput = $this->findById('input-hidden');
        $hiddenInput->clear()
            ->sendKeys('New value of hidden input');

        $this->findById('submit')
            ->click();

        $this->waitForTitle('Form submit endpoint');

        $submittedValue = $this->findByCss('li[data-key=hidden] .value')
            ->getText();

        $this->assertSame('New value of hidden input', $submittedValue);
    }
}
