<?php

namespace App\Services\Routerboard;

use Exception;
use RouterOS\Client;
use RouterOS\Config;
use RouterOS\Exceptions\BadCredentialsException;
use RouterOS\Exceptions\ClientException;
use RouterOS\Exceptions\ConfigException;
use RouterOS\Exceptions\ConnectException;
use RouterOS\Exceptions\QueryException;
use RouterOS\Query;

class PppService
{
    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws BadCredentialsException
     * @throws QueryException
     * @throws ConfigException
     * @throws Exception
     */
    public function getMikrotik($router): Client
    {
        $mikrotik = $router;
        if (! $mikrotik) {
            throw new Exception('Mikrotik not found.');
        }

        $config = (new Config())
            ->set('host', $mikrotik->host)
            ->set('port', (int) $mikrotik->port)
            ->set('pass', $mikrotik->password)
            ->set('user', $mikrotik->username);

        return new Client($config);
    }

    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
     * @throws ConfigException
     */
    public function getPppSecrests($router)
    {
        $client = $this->getMikrotik($router);
        $query = new Query('/ppp/secret/print');
        return $client->query($query)->read();
    }

    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
     * @throws ConfigException
     */
    public function getPppActive($router)
    {
        $client = $this->getMikrotik($router);
        $query = new Query('/ppp/active/print');
        return $client->query($query)->read();
    }

}
