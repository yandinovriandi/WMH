<?php

namespace App\Http\Controllers\Routerboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\RouterboardResource;
use App\Http\Resources\RouterboardTimeResource;
use App\Http\Resources\TrafficInterfaceResource;
use App\Models\Mikrotik;
use App\Services\Routerboard\SystemService;
use Illuminate\Http\Request;
use RouterOS\Exceptions\BadCredentialsException;
use RouterOS\Exceptions\ClientException;
use RouterOS\Exceptions\ConfigException;
use RouterOS\Exceptions\ConnectException;
use RouterOS\Exceptions\QueryException;

class SystemController extends Controller
{
    private SystemService $systemService;

    public function __construct(SystemService $systemService)
    {
        $this->systemService = $systemService;
    }

    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws BadCredentialsException
     * @throws QueryException
     * @throws ConfigException
     */
    public function routerResource(Mikrotik $mikrotik)
    {
        $router = $mikrotik;
        $spec = $this->systemService->getAllResources($router);
        $resources = RouterboardResource::collection($spec);

       $tm = $this->systemService->getTime($router);
       $time = RouterboardTimeResource::collection($tm);
        return response()->json([
            'resources' => $resources,
            'time' => $time,
        ]);
    }

    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws BadCredentialsException
     * @throws QueryException
     * @throws ConfigException
     */
    public function mikrotikTrafficInterface(Mikrotik $mikrotik)
    {
        return $this->systemService->monitoringTraffic($mikrotik);
    }
}
