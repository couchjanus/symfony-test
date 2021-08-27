<?php

namespace App\EventListener;

use Doctrine\DBAL\Event\ConnectionEventArgs;
use Doctrine\Common\EventSubscriber;

/**
 * ConnectionEventListener
 */
class  ConnectionEventListener implements EventSubscriber
{
    private $_time_zone;

    public function __construct($time_zone = 'Europe/Kiev')  
    {  
        $this->_time_zone = $time_zone;  
    }

    public function postConnect(ConnectionEventArgs $args)
    {
        $args->getConnection()->executeQuery("SET TZ ?", array($this->_time_zone));
        // $args->getConnection()
        //     ->exec("SET time_zone = 'Europe/Kiev'");
    }

    /**  
     * {@inheritdoc}  
     */  
     public function getSubscribedEvents()  
     {  
     return array(Events::postConnect);  
     }  
}