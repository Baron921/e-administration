<?php

namespace App\Http\Controllers;

use App\Acte;
use App\Categorie;
use App\Conditions;
use App\Operation;
use App\Operation_user;
use App\Operation_piece;
use App\Piece;
use App\Type;
use App\User;
use Illuminate\Http\Request;

class ActeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $urlId = $request->id;
        $operation = Operation::all()->whereBetween('visited', [3, 100000000]);
        $categorie = Categorie::all();
        $institution = User::all();
        $piece = Piece::all();
        $OP = Operation::all()->first();
        $type = Type::all();


        return view('user.index', compact('operation'));
        //return dd($OP);

    }

    public function operation(Request $request)
    {
        $piece = Piece::all();
        $operation = Operation::all()->where('slug', $request->slug)->first();
        $condition = Conditions::all()->where('operation_id', $operation->id);
        $allpiece = $operation->piece->all();
        $allinstitut = $operation->user->all();
        $user = User::all()->where('nom', $allinstitut[0]->nom)->first();
        $type = Type::all();

        /*$urlId = $request->id;
        $piece = Piece::all();
        $institution = User::all();

        $OP = Operation::all()->where('id', $urlId)->first();
        $OPU = $institution->where('id', 1);
        //$OPU = $OP->user->all();


        $institut = Operation::all()->where('id', $urlId)->first();
        $pieces = $piece->where('id', $institut->piece->first()->pivot->piece_id);
        $pieces = $institut->piece->all();

        return view('user.index', compact('operation', 'categorie', 'institution', 'pieces', 'piece', 'OP', 'pieces', 'OPU'));*/


        $visited = $operation->visited;
        $visite = ++$visited;

        $operation -> visited = $visite;

        $operation->save();

        return view('user.details', compact('operation', 'piece', 'allpiece', 'allinstitut', 'condition', 'user', 'type'));

        //return dd($operation->visited);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Acte $acte
     * @param  \Illuminate\Http\Request $request
     * @return string
     */
    public function show(Acte $acte, Request $request)
    {
        if (isset($request->institution)) {
            $user = User::all();
            $all = Operation::all();
            $operation = Operation::all()->where('user_id', $request->id);
            return view('user.single_listOperation', compact('operation', 'all', 'user'));
        } elseif (isset($request->nom)) {
            $user = Type::all();
            $operation = Operation::all()->where('type_id', $request->num);
            return view('user.single_listOperation', compact('operation', 'user'));
            //return dd($request->num);
        } elseif (isset($request->categorie)){

            $utilisateurs = User::all()->where('categorie_id', $request->id)->pluck('id')->toArray();

            $operation = Operation::all()->whereIn("user_id", $utilisateurs);

            return view('user.single_listOperation', compact('operation'));
        }
    }

    public function all(Acte $acte, Request $request)
    {
        $user = User::all();
        $operation = Operation::all();
        return view('user.single_listOperation', compact('operation', 'user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Acte $acte
     * @return \Illuminate\Http\Response
     */
    public function edit(Acte $acte, Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Acte $acte
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, Acte $acte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Acte $acte
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Acte $acte)
    {
        //
    }

    public function administration(Request $request)
    {
        $operation = Operation::all();
        $user = User::all();
        return view('user.operation', compact('operation', 'user'));
    }

    public function type(Request $request)
    {
        $operation = Operation::all();
        $user = Type::all();
        return view('user.type', compact('operation', 'user'));
    }

    public function theme(Request $request)
    {
        $user = Categorie::all();
        $operation = Operation::all();
        return view('user.categorie', compact('operation', 'user'));

    }
}