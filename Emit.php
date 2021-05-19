<?php

namespace Inteletravel\Trip\Services;

use Pusher\Pusher;
/**
 * Class Pusher
 * @package Inteletravel\Trip\Events
 */
final class Emit
{
    /**
     * @var
     */
    private static $pusher;

    /**
     * @return mixed
     * @throws \Pusher\PusherException
     */
    public static function pusher()
    {
        if( is_null(static::$pusher) ){
            static::$pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                array('cluster' => env('PUSHER_APP_CLUSTER'))
            );
        }
        return static::$pusher;
    }

    /**
     * Pusher constructor.
     */
    private function __construct(){}

    /**
     *
     */
    private function __clone(){}

    /**
     *
     */
    private function __wakeup(){}
}

Emit::pusher()->trigger(CHANNEL_NAME, EVENT_SESSION_EXPIRED, payload);
