<?php

namespace App\Http\Controllers\Hotspot;

use App\Http\Controllers\Controller;
use App\Models\Mikrotik;
use App\Services\Routerboard\GetIncomeService;
use RouterOS\Exceptions\BadCredentialsException;
use RouterOS\Exceptions\ClientException;
use RouterOS\Exceptions\ConfigException;
use RouterOS\Exceptions\ConnectException;
use RouterOS\Exceptions\QueryException;

class GetIncomeController extends Controller
{
    private GetIncomeService $getIncomeService;

    private SystemService $systemService;

    public function __construct(
        GetIncomeService $getIncomeService,
    ) {
        $this->getIncomeService = $getIncomeService;
    }

    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws BadCredentialsException
     * @throws QueryException
     * @throws ConfigException
     */
    public function todayIncome(Mikrotik $mikrotik)
    {
        $router = $mikrotik;
        $incomeToday = $this->getIncomeService->dayIncome($router);
        $totalIncomeValue = 0;

        foreach ($incomeToday as $item) {
            $incomeValue = $item['incomeValue'];
            $totalIncomeValue += intval($incomeValue);
        }

        return response()->json([
            'totalIncomeValue' => $totalIncomeValue,
        ]);
    }
}
