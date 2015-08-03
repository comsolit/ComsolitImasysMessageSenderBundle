<?php

namespace Comsolit\ImasysMessageSenderBundle\Twig\Extension;

class ImasysMessageSenderTwigExtension extends \Twig_Extension
{

    /* (non-PHPdoc)
     * @see Twig_ExtensionInterface::getName()
     */
    public function getName()
    {
        return 'imasys_message_sender_twig_extension';
    }

    /*
     * (non-PHPdoc)
     * @see Twig_Extension::getFunctions()
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('class', [$this, 'getClass'])
        ];
    }

    public function getClass($object)
    {
        return get_class($object);
    }
}
