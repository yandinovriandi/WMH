<?php

namespace App\Http\Controllers\Hotspot;

use App\Http\Controllers\Controller;
use App\Jobs\DeleteHotspotJob;
use App\Jobs\DisableHotspotJob;
use App\Jobs\EnableHotspotJob;
use App\Models\Mikrotik;
use App\Services\Routerboard\VoucherActionService;
use Illuminate\Http\Request;
use RouterOS\Exceptions\BadCredentialsException;
use RouterOS\Exceptions\ClientException;
use RouterOS\Exceptions\ConfigException;
use RouterOS\Exceptions\ConnectException;
use RouterOS\Exceptions\QueryException;

class VoucherActionController extends Controller
{
    private VoucherActionService $voucherActionService;

    public function __construct(VoucherActionService $voucherActionService)
    {
        $this->voucherActionService = $voucherActionService;
    }

    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
     * @throws ConfigException
     */
    public function disableOne(Mikrotik $mikrotik)
    {
        $router = $mikrotik;
        $username = request()->input('username');
        dispatch(new DisableHotspotJob($router, $username))->onQueue('hotspot');
        return back();
    }

    public function enableOne(Mikrotik $mikrotik)
    {
        $router = $mikrotik;
        $username = request()->input('username');

        dispatch(new EnableHotspotJob($router, $username))->onQueue('hotspot');
        return back();
    }

    public function deleteOne(Mikrotik $mikrotik)
    {
        $router = $mikrotik;
        $username = request()->input('username');

        dispatch(new DeleteHotspotJob($router, $username))->onQueue('hotspot');
        return back();
    }

    public function deleteByComment()
    {

    }
}
