<?php

namespace App\Http\Controllers;

use App\Operation;
use App\Piece;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PieceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pieces = Piece::all();
        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());
        return view('admin.piece', compact('pieces', 'nbreOperation', 'userOperation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $nom = strtoupper($request->nom);

        Piece::create([
            'nom'=>$nom,
            'code'=>Str::slug($nom),
            'description'=>$request->description
        ]);

        $pieces = Piece::all();
        return view('admin.single_operaPiece', compact('pieces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nom = strtoupper($request->nom);

        Piece::create([
           'nom'=>$nom,
           'code'=>Str::slug($nom),
           'description'=>$request->description
        ]);

        $pieces = Piece::all();
        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());
        return view('admin.single_piece', compact('pieces', 'userOperation', 'nbreOperation'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function show(Piece $piece)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function edit(Piece $piece)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pieces = Piece::find($id);

        $nom = strtoupper($request->nom);

        $pieces->nom = $nom;
        $pieces->code = Str::slug($nom);
        $pieces->description = $request->description;

        $pieces->save();

        $pieces = Piece::all();
        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());
        return view('admin.single_piece', compact('pieces', 'nbreOperation', 'userOperation'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Piece  $piece
     * @return array
     */
    public function destroy(Piece $piece, $id)
    {
        $pieces = Piece::find($id);

        $pieces->delete();

        return [
            'success' => 'Suppression effectuée avec succès !'
        ];
    }
}
