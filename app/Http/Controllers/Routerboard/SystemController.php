<?php

namespace App\Http\Controllers\Routerboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\RouterboardResource;
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
        return $resources = RouterboardResource::collection($spec);
    }
}
