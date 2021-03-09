<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Operation;
use App\Piece;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = count(User::all());
        $piece = count(Piece::all());
        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());

        return view('admin.index', compact('user', 'piece', 'nbreOperation', 'userOperation'));
    }

    public function admin()
    {
        return view('admin.index');
    }

    public function about()
    {
        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());
        return view('admin.a_propos', compact('userOperation', 'nbreOperation'));
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $op = Operation::all();
        $operation = Operation::all()->where('user_id', $id);
        $pieces = Piece::all();
        $piece = Piece::all()->last();
        $user = User::where('id',$id)->first();
        $users = User::all();
        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());
        return view('admin.profile', compact('user', 'operation', 'op', 'pieces','piece', 'users', 'nbreOperation', 'userOperation'));
    }

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
        }else{
            $institutions->nom = $request->nom;
            $institutions->adresse = $request->adresse;
            $institutions->contact = $request->contact;
            $institutions->email = $request->email;
            $institutions->siteweb = $request->siteweb;
            $institutions->description = $request->description;
            $institutions->categorie_id = $request->categorie_id;
        }
        $institutions->save();

        $op = Operation::all();
        $operation = Operation::all()->where('user_id', $id);
        $pieces = Piece::all();
        $piece = Piece::all()->last();
        $user = User::where('id',$id)->first();
        $users = User::all();

        $userOperation = count(Operation::all()->where('user_id', Auth::user()->id));
        $nbreOperation = count(Operation::all());

        return view('admin.single_profile', compact('user', 'operation', 'op', 'pieces','piece', 'users', 'userOperation', 'nbreOperation'));
    }


    public function help(){
        return view('admin.help');
    }

}
