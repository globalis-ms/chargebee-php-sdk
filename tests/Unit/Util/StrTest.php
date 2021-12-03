<?php

namespace Tests\Unit;

use Globalis\Chargebee\Util\Str;
use Tests\TestCase;

class StrTest extends TestCase
{
    /** @test */
    public function should_turn_string_into_studly_case()
    {
        $string = 'Invalid Request Exception';

        $this->assertEquals('InvalidRequestException', Str::studly($string));
    }
}
