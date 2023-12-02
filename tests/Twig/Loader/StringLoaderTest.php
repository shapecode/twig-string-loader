<?php

declare(strict_types=1);

namespace Shapecode\Tests\Twig\Loader;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Shapecode\Twig\Loader\StringLoader;
use Twig\Error\LoaderError;

use function time;

#[CoversClass(StringLoader::class)]
class StringLoaderTest extends TestCase
{
    public function testGetSourceContextWhenTemplateDoesNotExist(): void
    {
        $this->expectException(LoaderError::class);
        $loader = new StringLoader();
        $loader->getSourceContext('foo');
    }

    public function testGetCacheKey(): void
    {
        $loader = new StringLoader();
        self::assertEquals('327b6f07435811239bc47e1544353273', $loader->getCacheKey('foo bar'));
    }

    public function testGetCacheKeyWhenTemplateDoesNotExist(): void
    {
        $this->expectException(LoaderError::class);
        $loader = new StringLoader();
        $loader->getCacheKey('foo');
    }

    public function testIsFresh(): void
    {
        $loader = new StringLoader();
        self::assertTrue($loader->isFresh('foo bar', time()));
    }

    public function testIsFreshWhenTemplateDoesNotExist(): void
    {
        $this->expectException(LoaderError::class);

        $loader = new StringLoader();
        $loader->isFresh('foo', time());
    }

    public function testExists(): void
    {
        $loader = new StringLoader();
        self::assertTrue($loader->exists('foo bar'));
    }

    public function testExistsFails(): void
    {
        $loader = new StringLoader();
        self::assertFalse($loader->exists('foo'));
    }
}
