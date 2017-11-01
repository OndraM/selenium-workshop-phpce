<?php

namespace My;

use Facebook\WebDriver\Remote\LocalFileDetector;
use Lmc\Steward\Test\AbstractTestCase;

class FileUploadTest extends AbstractTestCase
{
    /** @test */
    public function shouldUploadFile()
    {
        $this->wd->get('https://simple-u6rzw4q-mxk4rjvb4la6e.eu.platform.sh/upload-simple.html');

        $fileElement = $this->findByName('upload');

        $fileElement
            ->setFileDetector(new LocalFileDetector())
            ->sendKeys(__DIR__ . '/Fixtures/image.jpg')
            ->submit();

        $this->waitForTitle('File upload endpoint');
        $header = $this->findByCss('h2')->getText();

        sleep(5); // just to see what happened
        $this->assertSame('Received 1 uploaded file(s)', $header);
    }
}
