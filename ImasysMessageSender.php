<?php
namespace Comsolit\ImasysMessageSenderBundle;

use Comsolit\ImasysPhp\Credentials;
use Comsolit\ImasysPhp\PortalServers;
use Comsolit\ImasysPhp\Connection;
use Comsolit\ImasysPhp\ApiMethods\SendMessageRequest;

class ImasysMessageSender {

        private $originator;
        private $credentials;
        private $apiUrl;

        public function __construct($user, $pw, $apiUrl, $originator)
        {
            $this->credentials = new Credentials($user, $pw);
            $this->apiUrl = $apiUrl;
            $this->originator = $originator;
        }

        public function sendMessage($message, $address)
        {
            $portalServers = PortalServers::fetchPortalServers($this->apiUrl, $this->credentials);

            $this->connection = new Connection($this->credentials, $portalServers);
            $sendMessageRequest = new SendMessageRequest($message, $address, $this->originator);

            return $this->connection->send($sendMessageRequest);
        }

}