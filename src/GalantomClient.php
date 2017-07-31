<?php

namespace GalantomApi;

use GalantomApi\Description\PhpLoader;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\Description;
use Symfony\Component\Config\FileLocator;

/**
 * Class GalantomClient
 * @package GalantomApi
 *
 * @method array getPageDonations(array $args = []) {@command GalantomClient getPageDonations}
 */
class GalantomClient extends GuzzleClient
{
    /**
     * Version for this library
     *
     * @const string
     */
    const VERSION = '1.0.1';


    /**
     * GalantomClient constructor.
     * @param Client $client
     * @param array $config
     */
    public function __construct(Client $client, $config = [])
    {
        $description = $this->generateDescription();
        $config = [
            'defaults' => [
                'api_token' => (isset($config['api_token']) ? $config['api_token'] : '')
            ]
        ];
        parent::__construct($client, $description, null, null, null, $config);
    }

    /**
     * @param array $config
     * @return GalantomClient
     */
    public static function factory($config = [])
    {
        $client = new Client($config);
        return new self($client, $config);
    }

    /**
     * Load configuration file(s) and parse resources.
     *
     * @return Description
     */
    protected function generateDescription()
    {
        $locator = new FileLocator(realpath(__DIR__ . '/Resources/v1.0'));

        $phpLoader = new PhpLoader($locator);
        $description = $phpLoader->load($locator->locate('service-description.php'));

        return new Description($description);
    }
}
