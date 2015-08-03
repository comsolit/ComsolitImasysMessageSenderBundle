<?php
namespace Comsolit\ImasysMessageSenderBundle;

use Comsolit\ImasysPhp\Credentials;
use Comsolit\ImasysPhp\PortalServers;
use Comsolit\ImasysPhp\Connection;
use Comsolit\ImasysPhp\ApiMethods\SendMessageRequest;
use Comsolit\ImasysMessageSenderBundle\DataCollector\ImasysDataCollector;
use Comsolit\ImasysPhp\RequestInterface;
use Comsolit\ImasysPhp\ApiMethods\DeliveryDisabledResponse;
use Comsolit\ImasysPhp\Curl\Response as CurlResponse;

class ImasysMessageSender
{

    private $originator;

    private $credentials;

    private $apiUrl;

    private $deliveryDisabled;

    public function __construct($user, $pw, $apiUrl, $originator, $deliveryDisabled)
    {
        $this->credentials = new Credentials($user, $pw);
        $this->apiUrl = $apiUrl;
        $this->originator = $originator;
        $this->deliveryDisabled = $deliveryDisabled;
    }

    public function sendMessage($message, $address)
    {
        $portalServers = PortalServers::fetchPortalServers($this->apiUrl, $this->credentials);

        $this->connection = new Connection($this->credentials, $portalServers);
        $sendMessageRequest = new SendMessageRequest($message, $address, $this->originator);

        return $this->send($sendMessageRequest);
    }

    private function send(RequestInterface $request)
    {
        if ($this->deliveryDisabled === true) {
            $response = DeliveryDisabledResponse::parseResponse(new CurlResponse());
        } else {
            $response = $this->connection->send($request);
        }

        return $response;
    }
}