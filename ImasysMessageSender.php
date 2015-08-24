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
    private $connection;

    private $originator;

    private $collector;

    private $deliveryDisabled;

    public function __construct($originator, $deliveryDisabled, Connection $connection)
    {
        $this->connection = $connection;
        $this->originator = $originator;
        $this->deliveryDisabled = $deliveryDisabled;
    }

    public function setCollector(ImasysDataCollector $collector)
    {
        $this->collector = $collector;
    }

    public function sendMessage($message, $address)
    {
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
        if ($this->collector instanceof ImasysDataCollector) {
            $this->collector->collectHack($request, $response);
        }

        return $response;
    }
}