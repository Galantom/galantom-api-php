<?php

namespace GalantomApi\Description;

/**
 * Class PhpLoader
 * @package GalantomApi\Description
 */
class PhpLoader extends FileLoader
{
    /**
     * {@inheritdoc}
     */
    public function loadResource($resource)
    {
        /** @noinspection PhpIncludeInspection */
        return require $resource;
    }

    /**
     * Returns whether this class supports the given resource.
     *
     * @param mixed $resource A resource
     * @param string|null $type The resource type or null if unknown
     *
     * @return bool True if this class supports the given resource, false otherwise
     */
    public function supports($resource, $type = null)
    {
        return is_string($resource) && 'php' === pathinfo($resource, PATHINFO_EXTENSION);
    }
}
