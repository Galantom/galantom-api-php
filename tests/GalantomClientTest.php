<?php

namespace GalantomApi\Tests;

use GalantomApi\GalantomClient;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

/**
 * Class GalantomClientTest
 * @package GalantomApi\Tests
 */
class GalantomClientTest extends AbstractTest
{
    public function testEmptyFactory()
    {
        $galantom = GalantomClient::factory();

        static::assertInstanceOf(GuzzleClient::class, $galantom);
        static::assertInstanceOf(GalantomClient::class, $galantom);

        self::assertEquals('https://galantom.ro/api/', $galantom->getDescription()->getBaseUri()->__toString());
    }

    /**
     * @dataProvider providerServiceCommands
     * @param $method
     * @param $params
     */
    public function testServiceCommands($method, $params)
    {
        $queue = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], '{"response": true}')
        ]);
        $handler = HandlerStack::create($queue);

        $client = $this->getClient($handler);

        $command = $client->getCommand($method, $params);
        $client->execute($command);

        $request = $queue->getLastRequest();

        $params['api_token'] = 999;

        //Resource Url
        $url = parse_url($request->getUri());

        $operation = $client->getDescription()->getOperation($method);
        //Make sure the url has the right method
        static::assertContains($operation->getUri(), $url['path']);

        $parameters = $operation->getParams();
        parse_str($url['query'], $uriParams);

        foreach ($parameters as $parameter) {
            $paramName = $parameter->getName();
            $paramValue = isset($params[$paramName]) ? $params[$paramName] : null;
            $uriValue = isset($uriParams[$paramName]) ? $uriParams[$paramName] : null;
            switch ($parameter->getLocation()) {
                case 'query':
                    static::assertEquals($paramValue, $uriValue);
                    break;

            }
        }
    }

    /**
     * Data for service calls
     */
    public function providerServiceCommands()
    {
        return [
            ['getPageDonations', ['id' => 159]],
        ];
    }

    /**
     * @param null $handler
     * @return GalantomClient
     */
    protected function getClient($handler = null)
    {
        return GalantomClient::factory([
            'api_token' => isset($_ENV['api_token']) ? $_ENV['api_token'] : 999,
            'handler' => $handler
        ]);
    }
}
