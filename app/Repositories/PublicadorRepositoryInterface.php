<?php

namespace App\Repositories;

use App\DTO\{CreatePublicadorDTO, UpdatePublicadorDTO};
use stdClass;

interface PublicadorRepositoryInterface{

    public function getAll(string $filter = null):array;

    public function get(string $id):stdClass|null;

    public function new(CreatePublicadorDTO $dto):stdClass;

    public function update(UpdatePublicadorDTO $dto):stdClass|null;

    public function destroy(int $id):void;
}