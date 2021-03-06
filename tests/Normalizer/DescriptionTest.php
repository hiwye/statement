<?php

class DescriptionTest extends \PHPUnit\Framework\TestCase
{
    public function testReturnsNormalStringUnmodified()
    {
        $output = $this->normalizer()->description("The quick brown fox jumps over the lazy dog");
        $this->assertEquals("The quick brown fox jumps over the lazy dog", $output);
    }

    public function testRemovesUnnecessaryWhitespace()
    {
        $output = $this->normalizer()->description("The quick    brown fox jumps  over the           lazy dog.");
        $this->assertEquals("The quick brown fox jumps over the lazy dog.", $output);
    }

    public function testRemovesTrailingWhitespace()
    {
        $output = $this->normalizer()->description("The quick brown fox jumps over the lazy dog. ");
        $this->assertEquals("The quick brown fox jumps over the lazy dog.", $output);
    }

    public function testNullsEmptyString()
    {
        $output = $this->normalizer()->description("");
        $this->assertNull($output);
    }

    public function testNullsNull()
    {
        $output = $this->normalizer()->description(null);
        $this->assertNull($output);
    }

    private function normalizer()
    {
        return new \SebastianWalker\Statement\Normalizers\DefaultNormalizer();
    }
}