<?php

namespace App\Http\Controllers\Hotspot;

use App\Http\Controllers\Controller;
use App\Models\Mikrotik;
use App\Services\Routerboard\HotspotService;
use RouterOS\Exceptions\BadCredentialsException;
use RouterOS\Exceptions\ClientException;
use RouterOS\Exceptions\ConfigException;
use RouterOS\Exceptions\ConnectException;
use RouterOS\Exceptions\QueryException;

class GetHotspotController extends Controller
{
    private HotspotService $hotspotService;

    public function __construct(HotspotService $hotspotService)
    {
        $this->hotspotService = $hotspotService;
    }

    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
     * @throws ConfigException
     */
    public function getCountActive(Mikrotik $mikrotik)
    {
        $router = $mikrotik;
        $allHotspotActive = $this->hotspotService->getHotspotActive($router);
        $activeCount = count($allHotspotActive);

        return response()->json([
            'activeCount' => $activeCount,
        ]);
    }

    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
     * @throws ConfigException
     */
    public function getAllUsers(Mikrotik $mikrotik)
    {
        $router = $mikrotik;
        $allHotspotUsers = $this->hotspotService->getHotspotUsers($router);
        $allUsers = count($allHotspotUsers);

        return response()->json([
            'allUsers' => $allUsers,
        ]);
    }
}
