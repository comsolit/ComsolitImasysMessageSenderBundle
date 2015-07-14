<?php

namespace Comsolit\ImasysMessengerBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ImasysMessageSenderTest extends WebTestCase
{
    public function testMessenger()
    {
        $kernel = $this->createKernel();
        $kernel->boot();
        $container = $kernel->getContainer();
        $imasysMessenger = $container->get('comsolit_imasys_message_sender');
        var_dump($imasysMessenger); die();
    }
}