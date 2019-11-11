<?php

namespace App\Http\Controllers;

use App\Imovel;
use Illuminate\Http\Request;

class ImoveisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $imoveis = Imovel::all();
        $imoveis = Imovel::with(['tipo','estado','municipio','bairro'])->get();
        if($imoveis){
            return response()->json($imoveis);
        }else{
            return response()->json(['msg'=>'Nenhum imóvel encontrado']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $cep =  $request["cep"];

        if(!strpos($cep, '-')){
            $cep1 = substr($cep, 0, 5);
            $cep2 = substr($cep, 5, strlen($cep));
            $cep = $cep1 .'-'.$cep2;
        }

        $imovelCriado = Imovel::create([
                'endereco' 			    => $request["endereco"],
                'cep' 			        => $dep,
                'proprietario' 			=> $request["proprietario"],
                'tipo_id' 			    => $request["tipo_id"],
                'estado_id' 			=> $request["estado_id"],
                'municipio_id' 			=> $request["municipio_id"],
                'bairro_id' 			=> $request["bairro_id"],
                ]);
            return response()->json($imovelCriado);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function show(Imovel $imovel)
    {
        $imovelEncontrado = Imovel::with(['tipo','estado','municipio','bairro'])->find($imovel);
        return response()->json($imovelEncontrado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imovel $imovel)
    {

        if($request->endereco != $imovel->endereco){
            $imovel->endereco = $request->endereco;
        }
        if($request->proprietario != $imovel->proprietario){
            $imovel->proprietario = $request->proprietario;
        }
        if($request->cep != $imovel->cep){
            $imovel->cep = $request->cep;
        }
        if($request->tipo_id != $imovel->tipo_id){
            $imovel->tipo_id = $request->tipo_id;
        }
        if($request->estado_id != $imovel->estado_id){
            $imovel->estado_id = $request->estado_id;
        }
        if($request->municipio_id != $imovel->municipio_id){
            $imovel->municipio_id = $request->municipio_id;
        }
        if($request->bairro_id != $imovel->bairro_id){
            $imovel->bairro_id = $request->bairro_id;
        }
        $imovel->save();
        return response()->json($imovel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imovel $imovel)
    {
        // $imovel->delete();
        if($imovel->delete()){
            return response()->json(true);
        }else{
            return response()->json(false);
        }

    }

    public function filter(Request $request)
    {
        $estadoCompare = "!=";
        $estado = 0;

        $municipioCompare = "!=";
        $municipio = 0;
        
        $bairroCompare = "!=";
        $bairro = 0;

        $sortBy = 'id';
        $orderBy = 'asc';

        $perPage= '10';

        if($request->has("estado_id")){
            $estadoCompare = '=';
            $estado=$request->estado_id;
        }
        if($request->has("municipio_id")){
            $municipioCompare = '=';
            $municipio=$request->municipio_id;
        }
        if($request->has("bairro_id")){
            $bairroCompare = '=';
            $bairro=$request->bairro_id;
        }
        if($request->has("sortBy")){
            $sortBy=$request->sortBy;
        }
        if($request->has("orderBy")){
            $orderBy=$request->orderBy;
        }

        $imoveis = Imovel::with(['tipo','estado','municipio','bairro'])
                            ->where('estado_id',$estadoCompare ,$estado)
                            ->where('municipio_id',$municipioCompare ,$municipio)
                            ->where('bairro_id',$bairroCompare ,$bairro)
                            ->orderBy($sortBy,$orderBy)
                            ->paginate($perPage);
        return response()->json($imoveis);
    }
}
