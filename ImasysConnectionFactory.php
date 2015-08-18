<?php

namespace Comsolit\ImasysMessageSenderBundle;

use Comsolit\ImasysPhp\Credentials;
use Comsolit\ImasysPhp\PortalServers;
use Comsolit\ImasysPhp\Connection;
class ImasysConnectionFactory
{

    private $portalListServerAdress;

    private $credentials;

    public function __construct(Credentials $credentials, $portalListServerAdress)
    {
        $this->portalListServerAdress = $portalListServerAdress;
        $this->credentials = $credentials;
    }

    public function buildConnection()
    {
        $portalServers = PortalServers::fetchPortalServers(
            $this->portalListServerAdress,
            $this->credentials
        );

        return new Connection($this->credentials, $portalServers);
    }

}