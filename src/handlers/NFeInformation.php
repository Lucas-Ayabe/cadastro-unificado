<?php
namespace src\handlers;

class NFeInformation
{
    public string $providerName;

    /**
     *
     * @var array<Det>
     */
    public array $dets;

    /**
     * __construct
     *
     * @param  string $provider
     * @param  array<Det> $dets
     * @return void
     */
    public function __construct(string $provider, array $dets)
    {
        $this->providerName = $provider;
        $this->dets = $dets;
    }
}
