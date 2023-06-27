<?php

namespace App\Http\Controllers;

use App\Models\Mikrotik;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        $mikrotiks = Mikrotik::where('user_id', $user->id)
            ->with('user')
            ->latest()->get();
        if (request()->ajax()) {
            return DataTables::of($mikrotiks)
                ->addIndexColumn()
                ->editColumn('name', function ($data) {
                    return '<span class="badge bg-cyan-soft text-blue rounded-pill">'.$data->name.
                        '</span>';
                })
                ->editColumn('host', function ($data) {
                    return '<span class="badge bg-green-soft text-green rounded-pill">'.$data->host.
                        '</span>';
                })
                ->editColumn('port', function ($data) {
                    return '<span class="badge bg-purple-soft text-purple rounded-pill">'.$data->port.
                        '</span>';
                })
                ->addColumn('action', function ($data) {
                    return view('mikrotik.partial._action')->with('data', $data);
                })
                ->rawColumns(['name', 'host', 'port'])
                ->make(true);
        }

        return view('dashboard', compact('mikrotiks'));
    }
}
