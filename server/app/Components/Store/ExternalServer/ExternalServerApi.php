<?php

namespace App\Components\Store\ExternalServer;

use App\Components\Store\Exceptions\ExternalServerApiException;
use App\Components\Store\Exceptions\ExternalServerStoreException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\Facades\Log;

class ExternalServerApi
{
    private $timeoutSeconds = 40;

    public function getStore(int $id)
    {
        return $this->get("/api/store/$id");
    }

    protected function get($url, $query = [])
    {
        return $this->request('GET', $url, ['query' => $query]);
    }

    protected function request($method, $url, $payload)
    {
        Log::debug('external server request: ' . $url . ' ' . json_encode($payload));
        return $this->formatResponseOrFail(
            $this->sendRequest($method, $url, $payload)
        );
    }

    protected function formatResponseOrFail($response)
    {
        Log::debug('external server response: ' . $response);
        if ($jsonDecodedResponse = json_decode($response)) {
            if (($jsonDecodedResponse->status ?? null) != 'failed') {
                return $jsonDecodedResponse;
            }
            throw new ExternalServerStoreException($jsonDecodedResponse);
        }
        throw ExternalServerApiException::unexpectedResponse($response);
    }

    protected function sendRequest($method, $url, $payload, $attempt = 1)
    {
        try {
            return $this->client()
                ->request($method, $url, $payload)
                ->getBody()
                ->getContents();
        } catch (ConnectException $e) {
            Log::warning("External Server Connection Exception: Attempt " . $attempt);
            Log::warning($e->getMessage());
        } catch (\Throwable $e) {
            throw new ExternalServerApiException($e->getMessage());
        }
    }

    private function client(): Client
    {
        return new Client(
            [
                'base_uri' => env('EXTERNAL_STORE_SERVER_URL'),
                'headers'  => ['Accept' => 'application/json'],
                'timeout'  => $this->timeoutSeconds,
            ]
        );
    }
}
