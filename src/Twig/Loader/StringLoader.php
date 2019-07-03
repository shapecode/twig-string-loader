<?php

namespace Shapecode\Twig\Loader;

use Twig\Loader\LoaderInterface;
use Twig\Source;

/**
 * Class StringLoader
 *
 * @package Shapecode\Bundle\TwigStringLoaderBundle\Twig\Loader
 * @author  Nikita Loges
 */
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
        return preg_match('/\s/', $name);
    }
}
