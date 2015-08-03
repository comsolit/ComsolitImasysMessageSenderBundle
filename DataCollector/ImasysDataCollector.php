<?php
namespace Comsolit\ImasysMessageSenderBundle\DataCollector;

use Symfony\Component\HttpKernel\DataCollector\DataCollector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Comsolit\ImasysPhp\RequestInterface;
use Comsolit\ImasysPhp\ResponseInterface;

class ImasysDataCollector extends DataCollector
{

    /*
     * (non-PHPdoc)
     * @see \Symfony\Component\HttpKernel\DataCollector\DataCollectorInterface::collect()
     */
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
    }

    public function collectHack(RequestInterface $request, ResponseInterface $response = null)
    {
        $this->data['apiCalls'][] = [
            'request' => $request,
            'response' => $response
        ];
    }

    /*
     * (non-PHPdoc)
     * @see \Symfony\Component\HttpKernel\DataCollector\DataCollectorInterface::getName()
     */
    public function getName()
    {
        return 'imasys_message_sender';
    }

    public function getApiCalls()
    {
        return $this->data['apiCalls'];
    }

    public function setDeliveryDisabled($disabled)
    {
        $this->data['deliveryDisabled'] = $disabled;
    }

    public function getDeliveryDisabled()
    {
        return $this->data['deliveryDisabled'];
    }
}
