<?php

namespace App\Http\Controllers;

use App\Models\Mikrotik;
use App\Services\Routerboard\TestConnectionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestConnectionController extends Controller
{
    private TestConnectionService $testConnectionService;

    public function __construct(TestConnectionService $testConnectionService)
    {
        $this->testConnectionService = $testConnectionService;
    }

    public function testConn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'host' => 'required',
            'password' => 'required',
            'username' => 'required',
            'port' => 'required',
        ], [
            'host.required' => 'Host harus diisi.',
            'username.required' => 'Username harus diisi.',
            'password.required' => 'Password harus diisi.',
            'port.required' => 'Port harus diisi.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'title' => 'Gagal terkoneksi!',
                'errors' => $validator->errors(),
            ], 400);
        }

        $router = [
            'timeout' => 1,
            'host' => $request->input('host'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'port' => (int) $request->input('port'),
        ];
        try {
            $response = $this->testConnectionService->testConnection($router);

            return response()->json([
                'status' => 'success',
                'title' => $response[0]['board-name'].' ⇌ CONECTED',
                'text' => 'Silahkan lanjutkan proses penambahan router!',
                'boardName' => $response[0]['board-name'],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'title' => 'Gagal terkoneksi!',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function checkOnline(Request $request)
    {
        $router = Mikrotik::findOrFail($request->id);
        try {
            $response = $this->testConnectionService->checkOnline($router);

            return response()->json([
                'status' => 'success',
                'title' =>  $router->name.' ⇌ CONECTED',
                'text' => 'Router ⇌'.$response[0]['board-name'].'⇌ Online',
                'boardName' => $response[0]['board-name'],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'title' => 'Router sedang offline!',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
