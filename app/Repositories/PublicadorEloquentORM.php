<?php

namespace App\Repositories;

use App\DTO\{CreatePublicadorDTO, UpdatePublicadorDTO};
use App\Models\Publicador;
use stdClass;

class PublicadorEloquentORM{

    public function __construct(
        protected Publicador $model
    )
    {
        
    }

    public function getAll(string $filter = null):array{

        return $this->model
                    ->where(function($query) use ($filter){
                        if($filter){
                            $query->where('nome', $filter);
                            $query->orWhere('obs', 'like', "%{$filter}%");
                        }
                    })
                    ->get()
                    ->toArray();
    }

    public function get(string $id):stdClass|null{

        $publicador = $this->model->find($id);

        if(!$publicador){
            return null;
        }

        return (object) $publicador->toArray();
    }

    public function new(CreatePublicadorDTO $dto):stdClass{

        $publicador = $this->model->create((array) $dto);

        return (object) $publicador->toArray();
    }

    public function update(UpdatePublicadorDTO $dto):stdClass|null{

        $publicador = $this->model->find($dto->id);

        if(!$publicador){
            return null;
        }

        $publicador->update((array) $dto);

        return (object) $publicador->toArray();
    }

    public function destroy(int $id):void{
        $this->model->findOrFail($id)->delete();
    }
}