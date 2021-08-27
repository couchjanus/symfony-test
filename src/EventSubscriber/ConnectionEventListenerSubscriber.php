<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ConnectionEventListenerSubscriber implements EventSubscriberInterface
{
    public function onPostConnect($event)
    {
        // ...
    }

    public static function getSubscribedEvents()
    {
        return [
            'postConnect' => 'onPostConnect',
        ];
    }
}
