<?php

namespace Sportakal\RevenuecatV1ApiPhp\V2;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

/**
 * v2 GET istemcisi. Bearer (sk_) auth + accept json. Path base URL'e (.../v2/) görelidir.
 */
class Request
{
    public function __construct(protected Options $options)
    {
    }

    /**
     * @throws \Exception
     */
    public function get(string $path, array $query = [], bool $tolerate_not_found = false): array
    {
        $url = $this->options->getBaseUrl() . ltrim($path, '/');

        $client = new Client();

        try {
            $response = $client->request('GET', $url, [
                'headers' => [
                    'accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $this->options->getSecretKey(),
                ],
                'query' => $query,
            ]);
        } catch (ClientException $e) {
            // Bilinmeyen customer/kayıt → 404. tolerate_not_found ise "kayıt yok" = boş (v1 get-or-create yerine).
            if ($tolerate_not_found && $e->getResponse()?->getStatusCode() === 404) {
                return [];
            }
            throw new \Exception($e->getMessage(), (int) $e->getCode(), $e);
        } catch (RequestException $e) {
            throw new \Exception($e->getMessage(), (int) $e->getCode(), $e);
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage(), (int) $e->getCode(), $e);
        }

        return json_decode($response->getBody()->getContents(), true) ?? [];
    }
}
