<?php

namespace App\Jobs;

use App\Models\Mikrotik;
use App\Services\Routerboard\VoucherActionService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use RouterOS\Exceptions\BadCredentialsException;
use RouterOS\Exceptions\ClientException;
use RouterOS\Exceptions\ConfigException;
use RouterOS\Exceptions\ConnectException;
use RouterOS\Exceptions\QueryException;

class DeleteHotspotJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Mikrotik $router;
    private string $username;
    private VoucherActionService $voucherActionService;

    /**
     * Create a new job instance.
     */
    public function __construct(Mikrotik $router, string $username)
    {
        $this->router = $router;
        $this->username = $username;
        $this->voucherActionService = app(VoucherActionService::class);
    }

    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
     * @throws ConfigException
     */
    public function handle(): void
    {
        $this->voucherActionService->deleteVoucher($this->router, $this->username);
        $this->voucherActionService->deleteOnlineVcr($this->router, $this->username);
    }
}
