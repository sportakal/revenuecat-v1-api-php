<?php

namespace Sportakal\RevenuecatV1ApiPhp;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Sportakal\RevenuecatV1ApiPhp\Requests\RequestBase;

class Request
{
    protected Options $options;

    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    /**
     * @throws GuzzleException
     * @throws \Exception
     */
    public function make(string $endpoint, string $method, array $body = [])
    {
        $url = $this->options->getBaseUrl() . $endpoint;

        $client = new Client();

        $request_options = [];
        $request_options['headers'] = [
            'accept' => 'application/json',
            'Authorization' => 'Bearer ' . $this->options->getBearerToken(),
            'Content-Type' => 'application/json',
        ];
        if ($method === 'POST') {
            $request_options['body'] = json_encode($body);
        }
        try {
            $request = $client->request(
                $method,
                $url,
                $request_options,
            );
        } catch (RequestException $e) {
            throw new \Exception($e->getMessage());
        }

        return json_decode($request->getBody()->getContents(), true);
    }
}
