<?php

namespace Yatilabs\Api;

use Illuminate\Http\Request;
use Yatilabs\Api\BaseAPIController;

class BaseApi extends BaseAPIController
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $data = $this->model::all();
        return $this->sendSuccessResponse($data);
    }

    public function show($id)
    {
        $item = $this->model::find($id);
        if (!$item) {
            return $this->sendErrorResponse('Resource not found', 404);
        }
        return $this->sendSuccessResponse($item);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
        ]);

        $item = $this->model::create($validatedData);
        return $this->sendSuccessResponse($item, 'Resource created successfully');
    }

    public function update(Request $request, $id)
    {
        $item = $this->model::find($id);
        if (!$item) {
            return $this->sendErrorResponse('Resource not found', 404);
        }

        $validatedData = $request->validate([
        ]);

        $item->update($validatedData);
        return $this->sendSuccessResponse($item, 'Resource updated successfully');
    }

    public function destroy($id)
    {
        $item = $this->model::find($id);
        if (!$item) {
            return $this->sendErrorResponse('Resource not found', 404);
        }

        $item->delete();
        return $this->sendSuccessResponse(null, 'Resource deleted successfully');
    }
}
