<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ColumnRequest;
use App\Http\Resources\Column\ColumnResource;
use App\Models\Column;
use App\Repositories\ColumnRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ColumnController extends ApiController
{

    public function __construct(Column $model, ColumnRepository $repository) {
        parent::__construct();
        $this->model = $model;
        $this->repository = $repository;
    }

    public function index(Request $request) {
        return ColumnResource::collection($this->repository->getAll());
    }

    public function store(ColumnRequest $request)
    {
        $this->request = $request;
        $model = $this->repository->save($this->getFormData());
        if (!$model) {
            return $this->httpResponse->setResponse([
                'success' => false,
                'errors' => 'Column has not been Created.'
            ], self::STATUS_BAD_REQUEST);
        }
        return $this->httpResponse->setResponse([
            'success' => true,
            'message' => 'Column Created Successfully!',
            'column' => new ColumnResource($model),
        ], self::STATUS_CREATED);
    }

    public function show($id) {
        return new ColumnResource($this->repository->getJobByID($id));
    }

    public function update(ColumnRequest $request, $id)
    {
        $this->request = $request;
        $model = $this->repository->update($id, $this->getFormData());
        if (!$model) {
            return $this->httpResponse->setResponse([
                'success' => false,
                'errors' => 'Column has not been Updated.'
            ], self::STATUS_BAD_REQUEST);
        }
        return $this->httpResponse->setResponse([
            'success' => true,
            'message' => 'Column Updated Successfully!'
        ], self::STATUS_OK);
    }

    public function destroy($id) {
        if (!$this->repository->delete($id)) {
            return $this->httpResponse->setResponse([
                'success' => false,
                'errors' => 'Column has not been Deleted.'
            ], self::STATUS_BAD_REQUEST);
        }
        return $this->httpResponse->setResponse([
            'success' => true,
            'message' => 'Column Deleted Successfully!'
        ], self::STATUS_OK);
    }

    private function getFormData() {
        return ['title' => $this->request->input('title')];
    }

}
