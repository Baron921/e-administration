<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Institution;
use App\Operation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutions = User::all();
        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());
        return view('admin.institutions', compact('institutions', 'nbreOperation', 'userOperation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $name = $request->nom;

        if ($request->hasFile('logo')){
            $file = $request->logo;
            $extension = $file->getClientOriginalExtension();
            $filename = 'logo'.$name.'-'.Str::random(3).'.'.$extension;
            $file -> move('uploads/Institutions',$filename);

            User::create([
                'nom' => $request->nom,
                'adresse' => $request->adresse,
                'email' => $request->email,
                'contact' => $request->contact,
                'siteweb' => $request->siteweb,
                'description' => $request->description,
                'logo' => $filename,
                'password' => Hash::make(Str::random(8)),
                'role' => 'admin',
                'categorie_id' => $request->categorie_id
            ]);
        }

        $institutions = User::all();
        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());
        return view('admin.single_operaInstitution', compact('institutions', 'userOperation', 'nbreOperation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->nom;

        if ($request->hasFile('logo')){
            $file = $request->logo;
            $extension = $file->getClientOriginalExtension();
            $filename = 'logo'.$name.'-'.Str::random(3).'.'.$extension;
            $file -> move('uploads/Institutions',$filename);

            User::create([
                'nom' => $request->nom,
                'adresse' => $request->adresse,
                'email' => $request->email,
                'contact' => $request->contact,
                'siteweb' => $request->siteweb,
                'description' => $request->description,
                'logo' => $filename,
                'password' => Hash::make(Str::random(8)),
                'role' => 'admin',
                'categorie_id' => $request->categorie_id
            ]);

        }else{
            $categorieImg = Categorie::all()->where('id', $request->categorie_id)->first();
            $file = $categorieImg->logo;
            return substr($file, -3);

            /*User::create([
                'nom' => $request->nom,
                'adresse' => $request->adresse,
                'email' => $request->email,
                'contact' => $request->contact,
                'siteweb' => $request->siteweb,
                'description' => $request->description,
                'logo' => $file,
                'password' => Hash::make(Str::random(8)),
                'role' => 'admin',
                'categorie_id' => $request->categorie_id
            ]);*/
            //$institution = User::with('categorie')->get();
        }

        //$institutions = User::all();
        //return view('admin.single_institution', compact('institutions'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function show(Institution $institution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function edit(Institution $institution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $institutions = User::find($id);
        $name = $request->nom;

        if ($request->hasFile('logoUpdate')){

            $file = $request->logoUpdate;
            $extension = $file->getClientOriginalExtension();
            $filename = 'logo'.$name.'~'.Str::random(3).'.'.$extension;
            $file -> move('uploads/Institutions',$filename);

            $institutions->nom = $request->nom;
            $institutions->adresse = $request->adresse;
            $institutions->contact = $request->contact;
            $institutions->email = $request->email;
            $institutions->siteweb = $request->siteweb;
            $institutions->description = $request->description;
            $institutions->logo = $filename;
            $institutions->categorie_id = $request->categorie_id;
        }
        else
            {
                $institutions->nom = $request->nom;
                $institutions->adresse = $request->adresse;
                $institutions->contact = $request->contact;
                $institutions->email = $request->email;
                $institutions->siteweb = $request->siteweb;
                $institutions->description = $request->description;
                $institutions->categorie_id = $request->categorie_id;

        }

        $institutions->save();

        $institutions = User::all();
        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());
        return view('admin.single_institution', compact('institutions', 'nbreOperation', 'userOperation'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institution  $institution
     * @return array
     */
    public function destroy(Institution $institution, $id)
    {
        $institutions = User::find($id);

        $institutions -> delete();

        return [
            'success' => 'Suppression effectuée avec succès !'
        ];
    }
}
