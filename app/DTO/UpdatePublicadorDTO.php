<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdatePublicadorRequest;

class UpdatePublicadorDTO{

    public function __construct(
        public int $id,
        public string $nome,
        public string $obs
    )
    {
        
    }

    public static function makeFromRequest(StoreUpdatePublicadorRequest $request):self{
        return new self(
            $request->id,
            $request->nome,
            $request->obs
        );
    }
}