<?php

namespace App\Exports;
use App\Models\User;
use App\Models\Contato;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Carbon\Carbon;

class ContatoExportAbril implements  FromView , ShouldAutoSize
{
     use Exportable;

    
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view():View
    {
        $data = Contato::select('*')
            ->whereMonth('created_at', Carbon::now()->month('04'))
            ->get();
   
        #print_r($data);
       
        return view('contatoExport',[
                
                'contato' => $data,
                
        ]);

    }}
