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
     * @inheritDoc
     */
    public function getSourceContext($name) : Source
    {
        if (! $this->exists($name)) {
            throw new LoaderError(sprintf('Template "%s" is not defined.', $name));
        }

        return new Source($name, $name);
    }

    /**
     * @inheritdoc
     */
    public function getCacheKey($name) : string
    {
        if (! $this->exists($name)) {
            throw new LoaderError(sprintf('Template "%s" is not defined.', $name));
        }

        return md5($name);
    }

    /**
     * @inheritdoc
     */
    public function isFresh($name, $time) : bool
    {
        if (! $this->exists($name)) {
            throw new LoaderError(sprintf('Template "%s" is not defined.', $name));
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function exists($name) : bool
    {
        return (bool) preg_match('/\s/', $name);
    }
}
