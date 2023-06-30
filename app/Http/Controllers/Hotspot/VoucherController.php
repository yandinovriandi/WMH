<?php

namespace App\Http\Controllers\Hotspot;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hotspot\VoucherResource;
use App\Services\Routerboard\HotspotService;
use RouterOS\Exceptions\BadCredentialsException;
use RouterOS\Exceptions\ClientException;
use RouterOS\Exceptions\ConfigException;
use RouterOS\Exceptions\ConnectException;
use RouterOS\Exceptions\QueryException;
use Yajra\DataTables\Facades\DataTables;

class VoucherController extends Controller
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
    public function voucher()
    {
        $mikrotikSlug = request()->mikrotik;
        $mikrotik = auth()->user()->mikrotiks()->where('slug', $mikrotikSlug)->first();
        $router = $mikrotik;
        $vcr = $this->hotspotService->getHotspotVouchers($router);
        $vouchers = VoucherResource::collection($vcr);

//        if (request()->ajax()) {
//            return DataTables::of($vouchers)
//                ->addIndexColumn()
////                ->addColumn('username', function ($data) {
////                    return '<span class="badge bg-cyan-soft text-blue rounded-pill">'.$data['username'].'</span>';
////                })
////                ->addColumn('password', function ($data) {
////                    return '<span class="badge bg-green-soft text-green rounded-pill">'.$data['password'].'</span>';
////                })
////                ->addColumn('profile', function ($data) {
////                    return '<span class="badge bg-purple-soft text-purple rounded-pill">'.$data['profile'].'</span>';
////                })
////                ->addColumn('action', function ($data) {
////                    return view('mikrotik.partial._action')->with('data', $data);
////                })
////                ->rawColumns(['action'])
//                ->make(true);
//        }

        return view('mikrotik.hotspot.voucher', [
            'mikrotik' => $mikrotik,
             'vouchers' => $vouchers
        ]);
    }
}
