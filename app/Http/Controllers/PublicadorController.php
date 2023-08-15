<?php

namespace App\Http\Controllers;

use App\DTO\CreatePublicadorDTO;
use App\DTO\UpdatePublicadorDTO;
use App\Http\Requests\StoreUpdatePublicadorRequest;
use App\Models\Publicador;
use App\Services\PublicadorService;
use Illuminate\Http\Request;

class PublicadorController
{

    public function __construct(
        protected PublicadorService $service
    ){}

    public function index(Request $request){

        $publicadores = $this->service->getAll($request->filter);

        return view('welcome', compact('publicadores'));
    }

    public function create(){
        return view('create');
    }

    public function store(StoreUpdatePublicadorRequest $request, Publicador $publicador){

        $this->service->new(CreatePublicadorDTO::makeFromRequest($request));

        //$data = $request->all();
        // $data = $request->validated();
        // $data['obs'] = 'Teste';

        // $publicador->create($data);

        //dd($publicador);

        return redirect()->route('publicador.index');
    }

    public function show(string|int $id){

        $publicador = $this->service->get($id);
        //$publicador = Publicador::find($id);

        if(!$publicador){
            return redirect()->back();
        }

        return view('show', compact('publicador'));
    }

    public function edit(string|int $id, Publicador $publicador){

        $publicador = $this->service->get($id);

        if(!$publicador){
            return redirect()->back();
        }

        return view('edit', compact('publicador'));
    }

    public function update(StoreUpdatePublicadorRequest $request, Publicador $publicador, string|int $id){

        // $publicador = $publicador->where('id', $id)->first();

        // if(!$publicador){
        //     return redirect()->back();
        // }

        // $publicador->update($request->only([
        //     'nome', 'obs'
        // ]));

        $publicador = $this->service->update(UpdatePublicadorDTO::makeFromRequest($request));

        if(!$publicador){
            return redirect()->back();
        }

        //$publicador->update($request->validated());

        return redirect()->route('publicador.index');
    }

    public function destroy(Request $request, Publicador $publicador, string|int $id){

        // $publicador = $publicador->where('id', $id)->first();

        // if(!$publicador){
        //     return redirect()->back();
        // }

        // $publicador->delete();

        $this->service->destroy($id);

        return redirect()->route('publicador.index');
    }
}
