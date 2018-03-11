<?php

namespace LVR\Subdomain\Tests\Feature;

use LVR\Subdomain\Subdomain;
use PHPUnit\Framework\Assert;
use Validator;
use LVR\Subdomain\Tests\TestCase;

/**
 * Class SubdomainTest
 *
 * @package \LVR\Subdomain\Tests\Feature
 */
class SubdomainTest extends TestCase
{
    /**
     * @param $value
     *
     * @return \Illuminate\Validation\Validator
     */
    public function validate($value)
    {
        return Validator::make(['slug' => $value], ['slug' => new Subdomain]);
    }

    /**
     * @param $value
     *
     * @return string
     */
    public function message($value)
    {
        return $this->validate($value)->messages()->first('slug');
    }

    /**
     * @test
     */
    public function it_must_start_and_end_with_an_alpha_numeric_character()
    {
        Assert::assertTrue($this->validate('testing')->passes());

        Assert::assertFalse($this->validate('-testing')->passes());
        Assert::assertFalse($this->validate('.testing')->passes());
        Assert::assertFalse($this->validate('testing-')->passes());
        Assert::assertFalse($this->validate('testing-')->passes());
    }

    /**
     * @test
     */
    public function it_can_contain_dashes()
    {
        Assert::assertFalse($this->validate('-testing')->passes());
        Assert::assertFalse($this->validate('testing-')->passes());

        Assert::assertTrue($this->validate('this-is-a-test')->passes());
    }

    /**
     * @test
     */
    public function it_checks_against_a_list_of_reserved_subdomains()
    {
        Assert::assertTrue($this->validate('mycompany')->passes());

        Assert::assertFalse($this->validate('www')->passes());
        Assert::assertFalse($this->validate('mail')->passes());
        Assert::assertFalse($this->validate('assets')->passes());
        Assert::assertFalse($this->validate('ftp')->passes());
        Assert::assertFalse($this->validate('billing')->passes());
    }
}
