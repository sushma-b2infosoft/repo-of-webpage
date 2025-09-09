<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Helpers\UserHelper;

class HelperTest extends TestCase
{
   /** @test */
    public function it_formats_user_name_correctly()
    {
        $this->assertEquals('Renu Baror', UserHelper::formatUserName('renu baror'));
        $this->assertEquals('', UserHelper::formatUserName(''));
    } 
}
