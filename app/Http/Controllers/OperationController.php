<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Conditions;
use App\Institution;
use App\Operation;
use App\Piece;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pieces = Piece::all();
        $institutions = User::all();
        $type = Type::all();
        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());
        return view('admin.operation', compact('pieces', 'institutions', 'type', 'userOperation', 'nbreOperation'));

        //$user = User::with('categorie')->get();

        //return dd(Auth::user()->categorie->nom);
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
        $nom = strtoupper($request->nom);
        $taille = strlen($request->nom);

        $operations = Operation::create([
            'nom' => $nom,
            'code' => 'OP_' . Str::slug($nom) . '0' . $taille,
            'description' => $request->description,
            'montant' => $request->montant,
            'user_id' => Auth::user()->id,
            'type_id' => $request->type_id
        ]);

        $operation = \App\Operation::with('piece')->where("id", $operations->id)->first();
        $opera = \App\Operation::with('user')->where("id", $operations->id)->first();

        $pieces_ids = $request->piece_id;
        $users_ids = $request->user_id;

        $operation->piece()->attach($pieces_ids);
        $opera->user()->attach($users_ids);

        $conditions = $request->condition;

        if (isset($conditions) && !empty($conditions)){

            foreach ($request->condition as $condition) {
                Conditions::create([
                    'operation_id' => $operation->id,
                    'condition' => $condition
                ]);
            }
        }else{
            Conditions::create([
                'operation_id' => $operation->id,
                'condition' => "Pas de condition"
            ]);
        }


        $pieces = Piece::all();
        $institutions = User::all();
        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());
        return view('admin.operation', compact('pieces', 'institutions', 'nbreOperation', 'userOperation'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Operation $operation
     * @return \Illuminate\Http\Response
     */
    public function show(Operation $operation)
    {
        $pieces = Piece::all();
        $type = Type::all();
        $institutions = User::all();
        $operations = Operation::with('conditions')->get();
        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());
        return view('admin.listOperation', compact('operations', 'pieces', 'institutions', 'type', 'userOperation', 'nbreOperation'));
    }

    public function categorisation(){
        $pieces = Piece::all();
        $type = Type::all();
        $institutions = User::all();
        $operations = Operation::all()->where('user_id', Auth::user()->id);
        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());
        return view('admin.listOperation', compact('operations', 'pieces', 'institutions', 'type', 'nbreOperation', 'userOperation'));
        //return dd($operations);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Operation $operation
     * @return \Illuminate\Http\Response
     */
    public function edit(Operation $operation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Operation $operation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $operations = Operation::find($id);

        $nom = $request->nom;
        $taille = strlen($request->nom);

        $operations -> nom = $request->nom;
        $operations -> montant = $request->montant;
        $operations -> description = $request->description;
        $operations -> code = 'OP_'.Str::slug($nom).'0'.$taille;
        $operations -> user_id = Auth::user()->id;
        $operations -> type_id = $request->type_id;

        $operation=\App\Operation::with('piece')->where("id", $operations->id)->first();
        $opera=\App\Operation::with('user')->where("id", $operations->id)->first();

        $pieces_ids = $request->piece_id;
        $users_ids = $request->user_ids;

        $operation->piece()->detach($pieces_ids);
        $opera->user()->detach($users_ids);

        $operation->piece()->attach($pieces_ids);
        $opera->user()->attach($users_ids);

        $operations -> save();

        //dd($request->condition );

        $conditions = $request->condition;

        if (isset($conditions) && !empty($conditions)){

            foreach ($request->condition as $key => $allCondition){

                $condition = Conditions::find($key);

                if ($allCondition[0] == null){
                    $condition->delete();
                }else{
                    $condition -> operation_id = $operation->id;
                    $condition -> condition = $allCondition[0];
                    $condition->save();
                }
            }

        }else{
            if (isset($request->otherCondition) && !empty($request->otherCondition)){
                foreach ($request->otherCondition as $condition) {
                    Conditions::create([
                        'operation_id' => $operation->id,
                        'condition' => $condition
                    ]);
                }
            }else{

            }
        }


        $pieces = Piece::all();
        $institutions = User::all();
        $operations = Operation::with('conditions')->get();
        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());
        return view('admin.single_listOperation', compact('operations', 'pieces', 'institutions', 'userOperation', 'nbreOperation'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Operation $operation
     * @return array
     */
    public function destroy(Operation $operation, $id)
    {
        $operations = Operation::find($id);

        $operations->delete();

        return [
            'success', 'Réussir'
        ];
    }
}
