<?php

namespace App\Repositories\Event;

use App\Models\Event;

class EventRepository implements EventInterface
{
    private $model;

    public function __construct(Event $model)
    {
        $this->model = $model;
    }

    public function create($request)
    {
        return $this->model->create($request);
    }

    public function getAll($request)
    {
        if (isset($request['per_page'])) {
            return $this->model->paginate($request['per_page'], ['*'], 'page', $request['page']);
        }
        return $this->model->get();
    }
    
}
