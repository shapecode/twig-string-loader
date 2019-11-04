<?php

declare(strict_types=1);

namespace Shapecode\Twig\Loader;

use Twig\Loader\LoaderInterface;
use Twig\Source;
use function preg_match;

class StringLoader implements LoaderInterface
{
    /**
     * @inheritDoc
     */
    public function getSourceContext($name)
    {
        return new Source($name, $name);
    }

    /**
     * @inheritdoc
     */
    public function getCacheKey($name)
    {
        return $name;
    }

    /**
     * @inheritdoc
     */
    public function isFresh($name, $time)
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function exists($name)
    {
        return (bool) preg_match('/\s/', $name);
    }
}
