<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdatePublicadorRequest;

class CreatePublicadorDTO{

    public function __construct(
        public string $nome,
        public string $obs
    )
    {
        
    }

    public static function makeFromRequest(StoreUpdatePublicadorRequest $request):self{
        return new self(
            $request->nome,
            $request->obs
        );
    }
}