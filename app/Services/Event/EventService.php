<?php

namespace App\Services\Event;

use Exception;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEventRequest;
use App\Services\BaseService;
use App\Repositories\Event\EventInterface;

class EventService extends BaseService
{

    /*API ERROR RESPONSE*/
    const API_ERROR_INVALID_CREATE_REQUEST = array('code' => 'E-EVENT-001' , 'message' => 'Invalid create request', 'http_code' => 400);
    const API_ERROR_UNEXPECTED = array('code' => 'E-EVENT-500' , 'message' => 'An unexpected error has occurred', 'http_code' => 500);    
    
    protected $eventInterface;
    protected $storeEventRequest;

    public function __construct(EventInterface $eventInterface) 
    {
        $this->eventInterface= $eventInterface;
    }

    public function create(Request $request)
    {
        try {
            $validator = $this->validateCreateRequest($request);
            if ($validator->fails()) {
                return $this->sendError(self::API_ERROR_INVALID_CREATE_REQUEST, $validator->errors());
            }
            $event = $this->eventInterface->create($request->all());
            return $this->sendResponse($event->getOriginal(), '');
        } catch (Exception $e) {

            return $this->sendError(self::API_ERROR_UNEXPECTED, $this->getErrorMessage($e));
        }
    }

   
    public function getAll(Request $request)
    {
        try {
            $event = $this->eventInterface->getAll($request->all());
            return $this->sendResponse($event->toArray(), '');
        } catch (Exception $e) {
            return $this->sendError(self::API_ERROR_UNEXPECTED, $this->getErrorMessage($e));
        }
    }


    private function validateCreateRequest($request)
    {
        $eventRequest = new StoreEventRequest();
        $rules = $eventRequest->rules();
        return Validator::make($request->all(), $rules);
    }
}
