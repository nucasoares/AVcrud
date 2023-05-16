<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\User;


class ReserveController extends Controller
{
  
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
        User::find(Auth::user()->id)
        ->myReserve()
        ->create([
            'nome' => $request -> nome, 
            'endereco'=>$request -> endereco,
            'numero_de_quartos' => $request -> numero_de_quartos, 
            'classificacao'=>$request -> classificacao,
            'cafe'=>$request -> cafe
        ]);
        return redirect( route('dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function show(Reserve $reserve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
   // public function edit(Reserve $reserve)
   // {
    //    $reserve->edit();
    //    return redirect(route('dashboard'));
   // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserve $reserve)
    {

        //$request->validate([
       //     'nome' => 'required',
       // ]);

        $reserve->update([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'numero_de_quartos' => $request->numero_de_quartos,
            'classificacao' => $request->classificacao,
            'cafe' => $request->cafe,
            $reserve->save()
        ]);
    
        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserve $reserve)
    {
        $reserve->delete();
        return redirect(route('dashboard'));
    }
}
