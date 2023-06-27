<?php

namespace App\Http\Controllers;

use App\Http\Resources\MikrotikResource;
use App\Models\Mikrotik;
use App\Services\Routerboard\HotspotService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RouterOS\Exceptions\BadCredentialsException;
use RouterOS\Exceptions\ClientException;
use RouterOS\Exceptions\ConfigException;
use RouterOS\Exceptions\ConnectException;
use RouterOS\Exceptions\QueryException;

class MikrotikController extends Controller
{
    private HotspotService $hotspotService;

    public function __construct(HotspotService $hotspotService)
    {
        $this->hotspotService = $hotspotService;
    }

    public function store(Request $request)
    {
        $authUserId = $request->authUserId;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'host' => 'required',
            'username' => 'required',
            'password' => 'required',
            'port' => 'required',
        ], [
            'name.required' => 'Nama/Identitas router harus di isi.',
            'host' => 'Host/Ip router harus di isi.',
            'username' => 'Username tidak boleh kosong.',
            'password' => 'Password router harus di isi.',
            'port' => 'Port harus di isi.',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'status' => 'error',
                'title' => 'Oops Error',
                'text' => 'Gagal menambah router.',
            ]);
        } else {
            Mikrotik::create([
                'user_id' => $authUserId,
                'name' => $name = $request->name,
                'slug' => str($name.'-'.Str::random(4))->slug(),
                'host' => $request->host,
                'username' => $request->username,
                'password' => $request->password,
                'port' => $request->port,
            ]);

            return response()->json([
                'status' => 'success',
                'text' => 'Mikrotik baru di tambahkan.',
                'title' => 'Berhasil',
            ]);
        }
    }

    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
     * @throws ConfigException
     */
    public function show(Mikrotik $mikrotik)
    {
        return view('mikrotik.show', compact('mikrotik'));
    }

    public function edit(Mikrotik $mikrotik)
    {
        $authUserId = auth()->user()->id;
        $where = ['slug' => $mikrotik->slug, 'user_id' => $authUserId];
        $data = MikrotikResource::make(Mikrotik::where($where)->first());

        if (! $data) {
            return response()->json([
                'status' => 'error',
                'title' => 'Error',
                'text' => 'Data not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'title' => 'Success.',
            'message' => 'Berhasil mendapatkan data router.',
            'data' => $data,
        ]);
    }

    public function update(Request $request, Mikrotik $mikrotik)
    {
        $authUserId = $request->authUserId;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'host' => 'required',
            'username' => 'required',
            'password' => 'required',
            'port' => 'required',
        ], [
            'name.required' => 'Nama/Identitas router harus di isi.',
            'host' => 'Host/Ip router harus di isi.',
            'username' => 'Username tidak boleh kosong.',
            'password' => 'Password router harus di isi.',
            'port' => 'Port harus di isi.',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'status' => 'error',
                'title' => 'Oops Error',
                'text' => 'Gagal update data router.',
            ]);
        } else {
            $mikrotik->update([
                'user_id' => $authUserId,
                'name' => $name = $request->name,
                'slug' => str($name.'-'.Str::random(4))->slug(),
                'host' => $request->host,
                'username' => $request->username,
                'password' => $request->password,
                'port' => $request->port,
            ]);

            return response()->json([
                'status' => 'success',
                'text' => 'Router berhasil di update.',
                'title' => 'Berhasil',
            ]);
        }
    }

    public function destroy(Mikrotik $mikrotik)
    {
        $mikrotik->delete();
    }
}
