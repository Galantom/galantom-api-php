<?php

namespace GalantomApi\Description;

use Symfony\Component\Config\Loader\FileLoader as BaseFileLoader;

/**
 * Class FileLoader
 * @package GalantomApi\Description
 */
abstract class FileLoader extends BaseFileLoader
{

    /**
     * Loads a resource.
     *
     * @param mixed $resource The resource
     * @param string|null $type The resource type or null if unknown
     *
     * @throws \Exception If something went wrong
     */
    public function load($resource, $type = null)
    {
        if (!stream_is_local($resource)) {
            throw new \Exception(sprintf('This is not a local file "%s".', $resource));
        }
        if (!file_exists($resource)) {
            throw new \Exception(sprintf('File "%s" not found.', $resource));
        }

        $configValues = $this->loadResource($resource);

        if (isset($configValues["imports"])) {
            foreach ($configValues["imports"] as $file) {
                $configValues = array_merge_recursive($configValues, $this->import($this->locator->locate($file)));
            }
        }

        unset($configValues["imports"]);

        return $configValues;
    }

    /**
     * @param $resource
     * @return array
     * @throws InvalidResourceException If stream content has an invalid format.
     */
    abstract protected function loadResource($resource);
}