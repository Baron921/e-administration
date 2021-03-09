<?php

namespace App\Http\Controllers;

use App\Operation;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = Type::all();
        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());
        return view('admin.type', compact('type', 'userOperation', 'nbreOperation'));
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
        Type::create([
            'nom'=>$request->nom,
            'code'=>Str::slug($request->nom),
            'description'=>$request->description
        ]);

        $type = Type::all();
        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());
        return view('admin.single_type', compact('type', 'userOperation', 'nbreOperation'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $type = Type::find($id);

        $type->nom = $request->nom;
        $type->code = Str::slug($request->nom);
        $type->description = $request->description;

        $type->save();

        $type = Type::all();
        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());
        return view('admin.single_type', compact('type', 'nbreOperation', 'userOperation'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return array
     */
    public function destroy(Request $request, $id)
    {
        $type = Type::find($id);

        $type->delete();

        return [
            'success' => 'Suppression effectuée avec succès !'
        ];
    }
}
