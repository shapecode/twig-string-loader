<?php

declare(strict_types=1);

namespace Shapecode\Twig\Loader;

use Twig\Error\LoaderError;
use Twig\Loader\LoaderInterface;
use Twig\Source;

use function md5;
use function preg_match;
use function sprintf;

class StringLoader implements LoaderInterface
{
    /**
     * @phpstan-param string $name
     */
    public function getSourceContext($name): Source
    {
        if (! $this->exists($name)) {
            throw new LoaderError(sprintf('Template "%s" is not defined.', $name));
        }

        return new Source($name, $name);
    }

    /**
     * @phpstan-param string $name
     */
    public function getCacheKey($name): string
    {
        if (! $this->exists($name)) {
            throw new LoaderError(sprintf('Template "%s" is not defined.', $name));
        }

        return md5($name);
    }

    /**
     * @phpstan-param string $name
     * @phpstan-param int $time
     */
    public function isFresh($name, $time): bool
    {
        if (! $this->exists($name)) {
            throw new LoaderError(sprintf('Template "%s" is not defined.', $name));
        }

        return true;
    }

    /**
     * @phpstan-param string $name
     */
    public function exists($name): bool
    {
        return (bool) preg_match('/\s/', $name);
    }
}
