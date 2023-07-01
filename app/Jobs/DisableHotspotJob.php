<?php

namespace App\Jobs;

use App\Models\Mikrotik;
use App\Services\Routerboard\VoucherActionService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DisableHotspotJob implements ShouldQueue
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
     * Execute the job.
     */
    public function handle(): void
    {
        $this->voucherActionService->disableVoucher($this->router, $this->username);
        $this->voucherActionService->deleteOnlineVcr($this->router, $this->username);
    }
}
