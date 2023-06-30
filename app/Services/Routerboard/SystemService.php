<?php

namespace App\Services\Routerboard;

use App\Http\Resources\TrafficInterfaceResource;
use App\Models\Mikrotik;
use Exception;
use RouterOS\Client;
use RouterOS\Config;
use RouterOS\Exceptions\BadCredentialsException;
use RouterOS\Exceptions\ClientException;
use RouterOS\Exceptions\ConfigException;
use RouterOS\Exceptions\ConnectException;
use RouterOS\Exceptions\QueryException;
use RouterOS\Query;

class SystemService
{
    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
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
    public function getAllResources($router)
    {
        $client = $this->getMikrotik($router);
        $query = new Query('/system/resource/print');

        return $client->query($query)->read();
    }

    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws BadCredentialsException
     * @throws QueryException
     * @throws ConfigException
     */
    public function getTime($router)
    {
        $client = $this->getMikrotik($router);
        $query = new Query('/system/clock/print');

        return $client->query($query)->read();
    }

    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
     * @throws ConfigException
     */
    public function monitoringTraffic(Mikrotik $mikrotik)
    {
        $router = $mikrotik;
        $interface = request()->interface;
        $client = $this->getMikrotik($router);
        $eth = (new Query('/interface/monitor-traffic'))
            ->equal('interface', $interface)
            ->equal('once');
        $tf = $client->query($eth)->read();
        $traffic = TrafficInterfaceResource::collection($tf);

        return response()->json($traffic);
    }

    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
     * @throws ConfigException
     */
    public function mikrotikInterface(Mikrotik $mikrotik)
    {
        $router = $mikrotik;
        $client = $this->getMikrotik($router);
        $inf = new Query('/interface/print');

        return $client->query($inf)->read();
    }
}
