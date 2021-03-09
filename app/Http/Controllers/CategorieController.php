<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Operation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());
        return view('admin.categorie', compact('categories', 'userOperation', 'nbreOperation'));
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
        $nom = strtoupper($request->nom);
        $tailleNom = strlen($nom);

        if ($request->hasFile('logo')){
            $file = $request->logo;
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(4). '~'. time(). '.' .$extension;
            $file -> move('uploads/Categorie', $filename);

            Categorie::create([
                'nom'=>$nom,
                'code'=>'CAT_'.Str::slug($nom).'0'.$tailleNom,
                'description'=> $request->description,
                'logo'=>$filename
            ]);
        }
        $categories = Categorie::all();
        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());
        return view('admin.single_categorie', compact('categories', 'userOperation', 'nbreOperation'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return string
     */
    public function update(Request $request)
    {
        $categories = Categorie::find($request->id);

        $nom = strtoupper($request->nom);
        $tailleNom = strlen($request->nom);


        if ($request->hasFile('logoUpdate')){
            $file = $request->logoUpdate;
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(4). '~'. time(). '.' .$extension;
            $file -> move('uploads/Categorie', $filename);

            $categories -> nom = $nom;
            $categories -> code = 'CAT_'.Str::slug($nom).'0'.$tailleNom;
            $categories -> description = $request->description;
            $categories -> logo = $filename;

        }else{

            $categories -> nom = $nom;
            $categories -> code = 'CAT_'.Str::slug($nom).'0'.$tailleNom;
            $categories -> description = $request->description;

        }

        $categories->save();

        $categories = Categorie::all();
        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());
        return view('admin.single_categorie', compact('categories', 'userOperation', 'nbreOperation'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return array
     */
    public function destroy($id)
    {
        $categories = Categorie::find($id);

        $categories -> delete();

        return [
            'success' => 'Suppression effectuée avec succès !'
        ];
    }
}
