<?php
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Comsolit\ImasysMessageSenderBundle\ComsolitImasysMessageSenderBundle;
class AppKernel extends Kernel
{
    /**
     * @return array
     */
    public function registerBundles()
    {
        return [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new ComsolitImasysMessageSenderBundle()
        ];
    }
    /**
     * @return null
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
    /**
     * @return string
     */
    public function getCacheDir()
    {
        return sys_get_temp_dir().'/ComsolitImasysMessageSenderBundle/cache';
    }
    /**
     * @return string
     */
    public function getLogDir()
    {
        return sys_get_temp_dir().'/ComsolitImasysMessageSenderBundle/logs';
    }
}