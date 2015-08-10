<?php

namespace Comsolit\ImasysMessageSenderBundle;

use Comsolit\ImasysPhp\Credentials;
use Comsolit\ImasysPhp\PortalServers;
use Comsolit\ImasysPhp\Connection;
class ImasysConnectionFactory
{

    private $apiUrl;

    private $credentials;

    public function __construct(Credentials $credentials, $apiUrl)
    {
        $this->apiUrl      = $apiUrl;
        $this->credentials = $credentials;
    }

    public function buildConnection()
    {
        $portalServers = PortalServers::fetchPortalServers($this->apiUrl, $this->credentials);

        return new Connection($this->credentials, $portalServers);
    }
}