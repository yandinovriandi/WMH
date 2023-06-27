<?php

namespace App\Http\Controllers\Ppp;

use App\Http\Controllers\Controller;
use App\Models\Mikrotik;
use App\Services\Routerboard\HotspotService;
use App\Services\Routerboard\PppService;
use Illuminate\Http\Request;
use RouterOS\Exceptions\BadCredentialsException;
use RouterOS\Exceptions\ClientException;
use RouterOS\Exceptions\ConfigException;
use RouterOS\Exceptions\ConnectException;
use RouterOS\Exceptions\QueryException;

class GetPppController extends Controller
{
    private PppService $pppService;

    public function __construct(PppService $pppService)
    {
        $this->pppService = $pppService;
    }

    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws BadCredentialsException
     * @throws QueryException
     * @throws ConfigException
     */
    public function getAllPppSecrets(Mikrotik $mikrotik)
    {
        $router = $mikrotik;
        $allPppSecrets = $this->pppService->getPppSecrests($router);
        $allPppSecretsCount = count($allPppSecrets);

        return response()->json([
            'allPppSecretsCount' => $allPppSecretsCount,
        ]);
    }

    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws BadCredentialsException
     * @throws QueryException
     * @throws ConfigException
     */
    public function getAllPppActive(Mikrotik $mikrotik)
    {
        $router = $mikrotik;
        $allPppActive = $this->pppService->getPppActive($router);
        $allPppActiveCount = count($allPppActive);

        return response()->json([
            'allPppActiveCount' => $allPppActiveCount,
        ]);
    }
}
