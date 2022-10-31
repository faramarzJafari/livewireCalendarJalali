<?php

namespace fara\livewirecalendarjalali\class\infodate\facade;

use Illuminate\Support\Facades\Facade;

/**
 * @method static $this addEvent($timestamp,$event_title,$description,$event_statuse)
 * @method static $this getinfo($timestamp)
 * @method static $this deleteinfo($id)
 * @method static $this deleteAllinfo($timestamp)
 */

class infodate extends Facade  {

    protected static function getFacadeAccessor()
    {
        return 'infodate';
    }

}
