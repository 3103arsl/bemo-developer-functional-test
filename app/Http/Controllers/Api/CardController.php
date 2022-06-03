<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CardRequest;
use App\Http\Resources\Card\CardResource;
use App\Models\Card;
use App\Models\Column;
use App\Repositories\CardRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CardController extends ApiController
{

    public function __construct(Card $model, CardRepository $repository) {
        parent::__construct();
        $this->model = $model;
        $this->repository = $repository;
    }

    public function store(CardRequest $request, Column $column)
    {
        $this->request = $request;
        return $column->cards()->saveMany([
            $this->repository->save($this->getFormData())
        ]);
        if (!$model) {
            return $this->httpResponse->setResponse([
                'success' => false,
                'errors' => 'Card has not been Created.'
            ], self::STATUS_BAD_REQUEST);
        }

        return $this->httpResponse->setResponse([
            'success' => true,
            'message' => 'Card Created Successfully!',
            'column' => new CardResource($model),
        ], self::STATUS_CREATED);
    }

    public function show($id) {
        return new CardResource($this->repository->getById($id));
    }

    public function update(CardRequest $request, $id)
    {
        $this->request = $request;
        $model = $this->repository->update($id, $this->getFormData());
        if (!$model) {
            return $this->httpResponse->setResponse([
                'success' => false,
                'errors' => 'Card has not been Updated.'
            ], self::STATUS_BAD_REQUEST);
        }
        return $this->httpResponse->setResponse([
            'success' => true,
            'message' => 'Card Updated Successfully!'
        ], self::STATUS_OK);
    }

    public function destroy($id) {
        if (!$this->repository->delete($id)) {
            return $this->httpResponse->setResponse([
                'success' => false,
                'errors' => 'Card has not been Deleted.'
            ], self::STATUS_BAD_REQUEST);
        }
        return $this->httpResponse->setResponse([
            'success' => true,
            'message' => 'Card Deleted Successfully!'
        ], self::STATUS_OK);
    }

    private function getFormData() {
        return [
            'title' => $this->request->input('title'),
            'description' => $this->request->input('description')
        ];
    }

}
