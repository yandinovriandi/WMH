<?php

namespace App\Services\Routerboard;

use Exception;
use RouterOS\Client;
use RouterOS\Config;
use RouterOS\Exceptions\BadCredentialsException;
use RouterOS\Exceptions\ClientException;
use RouterOS\Exceptions\ConfigException;
use RouterOS\Exceptions\ConnectException;
use RouterOS\Exceptions\QueryException;
use RouterOS\Query;

class VoucherActionService
{
    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
     * @throws ConfigException
     * @throws Exception
     */
    public function getMikrotik($router): Client
    {
        $mikrotik = $router;
        if (! $mikrotik) {
            throw new Exception('Mikrotik not found.');
        }

        $config = (new Config())
            ->set('host', $mikrotik->host)
            ->set('port', (int) $mikrotik->port)
            ->set('pass', $mikrotik->password)
            ->set('user', $mikrotik->username);

        return new Client($config);
    }

    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
     * @throws ConfigException
     */
    public function deleteVoucher($router,$username): void
    {
        $client = $this->getMikrotik($router);
        $voucher = new Query('/ip/hotspot/user/print');
        $voucher->where('name', $username);
        $deleteVouchers = $client->query($voucher)->read();

        foreach ($deleteVouchers as $vcr) {
            $vcr = (new Query('/ip/hotspot/user/remove'))
                ->where('name', $username)
                ->equal('.id', $vcr['.id']);
            $client->query($vcr)->read();
        }
    }

    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
     * @throws ConfigException
     */
    public function disableVoucher($router, $username): void
    {
        $toNoDisable = 'yes';
        $client = $this->getMikrotik($router);
        $voucher = new Query('/ip/hotspot/user/print');
        $voucher->where('name', $username);
        $disableVouchers = $client->query($voucher)->read();

        foreach ($disableVouchers as $dsbl) {
            $dsbl = (new Query('/ip/hotspot/user/set'))
                ->where('name', $username)
                ->equal('.id',$dsbl['.id'])
                ->equal('disabled', $toNoDisable);
            $client->query($dsbl)->read();
        }
    }

    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
     * @throws ConfigException
     */
    public function deleteOnlineVcr($router, $username): void
    {
        $client = $this->getMikrotik($router);
        $activeVcr = $client->query('/ip/hotspot/user/print')->read();
        foreach ($activeVcr as $actv) {
            $remove = (new Query('/ip/hotspot/active/remove'))
                ->where('name', $username)
                ->equal('.id',$actv['.id']);
            $client->query($remove)->read();
        }
    }

    /**
     * @throws ClientException
     * @throws ConnectException
     * @throws QueryException
     * @throws BadCredentialsException
     * @throws ConfigException
     */

    public function enableVoucher($router, $username): void
    {
        $toEnable = 'no';
        $client = $this->getMikrotik($router);
        $voucher = new Query('/ip/hotspot/user/print');
        $voucher->where('name', $username);
        $disableVouchers = $client->query($voucher)->read();

        foreach ($disableVouchers as $dsbl) {
            $dsbl = (new Query('/ip/hotspot/user/set'))
                ->where('name', $username)
                ->equal('.id',$dsbl['.id'])
                ->equal('disabled', $toEnable);
            $client->query($dsbl)->read();
        }
    }

}
