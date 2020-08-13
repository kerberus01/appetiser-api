<?php

namespace App\Http\Controllers\API;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Event\EventFacade as Event;

class EventController extends Controller
{


    public function create(Request $request)
    {
        return Event::create($request);
    }

    public function getAll(Request $request)
    {
        return Event::getAll( $request);
    }
}
