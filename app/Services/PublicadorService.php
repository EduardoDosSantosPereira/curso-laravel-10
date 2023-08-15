<?php

namespace App\Services;

use App\DTO\CreatePublicadorDTO;
use App\DTO\UpdatePublicadorDTO;
use App\Repositories\PublicadorRepositoryInterface;
use stdClass;

class PublicadorService{

    public function __construct(
        protected PublicadorRepositoryInterface $repository
    )
    {
        
    }

    public function getAll(string $filter = null){
        return $this->repository->getAll($filter);
    }

    public function get(string $id):stdClass{
        return $this->repository->get($id);
    }

    public function new(CreatePublicadorDTO $dto){
        return $this->repository->new($dto);
    }

    public function update(UpdatePublicadorDTO $dto):stdClass|null{
        return $this->repository->update($dto);
    }

    public function destroy(int $id):void{
        $this->repository->destroy($id);
    }
}