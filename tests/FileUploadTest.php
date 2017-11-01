<?php

namespace My;

use Lmc\Steward\Test\AbstractTestCase;

class FileUploadTest extends AbstractTestCase
{
    /** @test */
    public function shouldUploadFile()
    {
        $this->wd->get('https://simple-u6rzw4q-mxk4rjvb4la6e.eu.platform.sh/upload-simple.html');

        // TODO: submit file Fixtures/image.jpg via 'upload' element

        $this->waitForTitle('File upload endpoint');
        $header = $this->findByCss('h2')->getText();

        sleep(5); // just to see what happened
        $this->assertSame('Received 1 uploaded file(s)', $header);
    }
}
