<?php

namespace App\Http\Controllers;
use App\Models\Contato;
use App\Models\User;
use Illuminate\Http\Request;
use App\API\ApiError;
use Illuminate\Support\Facades\Storage;
use App\Exports\ContatoExportJaneiro;
use App\Exports\ContatoExportFevereiro;
use App\Exports\ContatoExportMarco;
use App\Exports\ContatoExportAbril;
use App\Exports\ContatoExportMaio;
use App\Exports\ContatoExportJunho;
use App\Exports\ContatoExportJulho;
use App\Exports\ContatoExportAgosto;
use App\Exports\ContatoExportSetembro;
use App\Exports\ContatoExportOutubro;
use App\Exports\ContatoExportNovembro;
use App\Exports\ContatoExportDezembro;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\ContatoResource;


class ContatoController extends Controller 
{
    
    /**
     * @var Contato  
     */

    public function __construct(Contato $contato){

        $this->contato=$contato;
    }

    
    public function index(){
        
        $contatos = Contato::with('users')->get();
        return ContatoResource::collection($contatos);
    }

     

    
   

    public function create(Request $request)
    {
       
        try {
            
            $contatoData = $request->only('nome','email','telefone');
            $contatoData ['user_id'] = 2;
        
            if ($request->file('foto')->isValid()) {
                
                $fotoCaminho = $request->foto->store();
                $contatoData ['foto'] =  $fotoCaminho;

            }
            

            $this->contato->create($contatoData);
            $return= ['data'=>['msg'=>'Contato Enviado!']];
            return response()->json($return,201);
        
        } catch (\Exception $e){
            
            if(config('app.debug')){
                
                return response()->json(ApiError::errorMessage($e->getMessage(),1010),500);
            }
            
            return response()->json(ApiError::errorMessage('Ocorreu um erro de operação de criar',1010),500);
        }
    }


    public function read(Contato $id){
          
        
       $id->load('users');
       return new ContatoResource($id);


    }

  


    public function update(Request $request,$id)
    {
        try {  


            $contatoData = $request->only('nome','email','telefone');
            #$contatoData ['user_id'] = 2;

            if ($request->hasFile('foto') && $request->file('foto')->isValid()){
                
                $fotoCaminho = $request->foto->store('Fotos_Contatos');
                $contatoData ['foto'] =  $fotoCaminho;

            }
            $contato = $this->contato->find($id);
            $contato->update($contatoData);
            dd($contatoData);
            $return= ['data'=>['msg'=>'Contato atualizado!']];
            return response()->json($return,201);
        
        } catch (\Exception $e){
            
            if(config('app.debug')){
                
                return response()->json(ApiError::errorMessage($e->getMessage(),1011),500);
            }
            
            return response()->json(ApiError::errorMessage('Ocorreu um erro de operação de editar',1011),500);
        }
    }

    public function delete(Contato $id){
          
        try {
           
           $contato = $this->contato->find($id);
           
           // and based on your code this is a collection as well, so you need to iterate once again
            foreach($contato as $contatos)
            {
            $cont = $contatos->foto;
            if ($cont && Storage::exists($cont)) {
                Storage::delete($cont);
            }

            }
    
           
           $id->delete();
           $return= ['data'=>['msg'=>'Contato '.$id->nome .' excluido!']];
           return response()->json($return,200);
        
        } catch (\Exception $e){
            
            if(config('app.debug')){
                
                return response()->json(ApiError::errorMessage($e->getMessage(),1012),500);
            }
            
            return response()->json(ApiError::errorMessage('Ocorreu um erro de operação de deletar',1012),500);
        }


    }

     public function relatorioJaneiro() {return Excel::download(new ContatoExportJaneiro , 'RelatorioJaneio.xlsx');}
     public function relatorioFevereiro() {return Excel::download(new ContatoExportFevereiro , 'RelatorioFevereiro.xlsx');}
     public function relatorioMarco() {return Excel::download(new ContatoExportMarco , 'RelatorioMarço.xlsx');}
     public function relatorioAbril() {return Excel::download(new ContatoExportAbril , 'RelatorioAbril.xlsx');}
     public function relatorioMaio() {return Excel::download(new ContatoExportMaio , 'RelatorioMaio.xlsx');}
     public function relatorioJunho() {return Excel::download(new ContatoExportJunho , 'RelatorioJunho.xlsx');}
     public function relatorioJulho() {return Excel::download(new ContatoExportJulho , 'RelatorioJulho.xlsx');}
     public function relatorioAgosto() {return Excel::download(new ContatoExportAgosto , 'RelatorioAgosto.xlsx');}
     public function relatorioSetembro() {return Excel::download(new ContatoExportSetembro , 'RelatorioSetembro.xlsx');}
     public function relatorioOutubro() {return Excel::download(new ContatoExportOutubro , 'RelatorioOutubro.xlsx');}
     public function relatorioNovembro() {return Excel::download(new ContatoExportNovembro , 'RelatorioNovembro.xlsx');}
     public function relatorioDezembro() {return Excel::download(new ContatoExportDezembro , 'RelatorioDezembro.xlsx');}




}

