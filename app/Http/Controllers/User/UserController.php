<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Vehicule;
use App\Models\Contrat;
class UserController extends Controller
{
    function create(Request $request){
        $request->validate([
            'cin'=>'required|unique:users,cin|max:10',
            'prenom'=>'required|max:20',
            'nom'=>'required|max:20',
            'numeroPermis'=>'required|unique:users,numeroPermis',
            'telephone'=>'required|max:10',
            'adressClient'=>"required",
            'codePotal'=>"required",
            'ville'=>'required',

            'picture'=>'nullable',
            'email'=>'required|email|unique:users,email',

            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password'


        ]);


        $user = new User();
        $user->cin=$request->cin;
        $user->prenom=$request->prenom;
        $user->nom=$request->nom;
        $user->numeroPermis=$request->numeroPermis;
        $user->telephone=$request->telephone;
        $user->adressClient=$request->adressClient;
        $user->codePotal=$request->codePotal;
        $user->ville=$request->ville;
        
        $user->email=$request->email;
       
        if($request->hasfile('picture'))
        {
            $picture=$request->input('picture');
            $file = $request->file('picture');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/Clients/', $filename);
            
            $user->picture=$filename;
        }
        
         $user->password = bcrypt($request->password);

        $save = $user->save();

        if( $save ){
            return redirect()->back()->with('succes','enregistré avec succès');
        }else{
            return redirect()->back()->with('echec','Quelque chose est mal passé, échec de l\'enregistrement');
        }

         


    }

    function check(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|max:30'
         ],[
             'email.exists'=>'This email is not exists on users table'
         ]);
         $creds = $request->only('email','password');
         if( Auth::guard('web')->attempt($creds) ){
             return redirect()->route('user.home');
         }else{
             return redirect()->route('user.login')->with('fail','Incorrect credentials');
         }
    }

    function logout(Request $request){

        Auth::guard('web')->logout();
        return redirect('/');
    }


    function profil_client(){
        $user = Auth::user();
        $id = $user->id;

        $users=DB::table('users')
                 ->select('users.*')
                 ->where('id',$id)
                 ->first();

        $data=[
            "Info"=>$users

        ];

        return view('dashboard.user.profil_client',$data);

    }

 
    function editer_password(Request $request){
        $request->validate([

            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password'

        ]);
        $user=Auth::user();
        $id=$user->id;

        $changer_password=DB::table('users')
                         ->where('id',$id)
                         ->update([
                             'password'=>bcrypt($request->input('password')),
                         ]);
                         
        return redirect('user/changer_password')->with('succes','mots de passe modifier avec succes');
    }

    function modifier_donnees_client(){
        $user = Auth::user();
        $id = $user->id;

        $users=DB::table('users')
                 ->select('users.*')
                 ->where('id',$id)
                 ->first();

        $data=[
            "Info_client"=>$users

        ];

        return view('dashboard.user.modifier_donnees_client',$data);

        
    }

    function editer_donnees_client(Request $request){
        $user = Auth::user();
        $id = $user->id;
        $users=User::find($id);

    

        $request->validate([
            



            'cin'=>'required|max:10||unique:users,cin,'.$id,
            'prenom'=>'required|max:20',
            'nom'=>'required|max:20',
            'numeroPermis'=>'required|unique:users,numeroPermis,'.$id,
            'telephone'=>'required|max:10',
            'adressClient'=>"required",
            'codePotal'=>"required",
            'ville'=>'required',
            'picture'=>'nullable',
            'email'=>'required|email|unique:users,email,'.$id,

        ]);
        
      
    //    $vehicule = Vehicule::find($id);
       $users->cin = $request->input('cin');
       $users->prenom = $request->input('prenom');
       $users->nom = $request->input('nom') ;
       $users->numeroPermis = $request->input('numeroPermis') ;
       $users->telephone = $request->input('telephone') ;
       $users->adressClient = $request->input('adressClient') ;
       $users->codePotal = $request->input('codePotal') ;
       $users->ville = $request->input('ville') ;
       $users->email = $request->input('email') ;
    //    $client->password = $request->input('password') ;
      
       if($request->hasfile('picture'))
        {
            $picture = $request->input('picture') ;
            $destination = 'uploads/Clients/'.$picture;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('picture');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/Clients/', $filename);
            $users->picture= $filename;
        }
        $users->update();
        return redirect('user/profil_client');
      


    }


    function vehicules_disponible(){
        
        $search=$request['search'] ?? "";
        if($search != "") {
            $vehicules=Vehicule::where('matricule','like',"%$search%")->orWhere('Modele','like',"%$search%")->orWhere('Carburant','like',"%$search%")->orWhere('AnneeModele','like',"%$search%")->orWhere('Puissance','like',"%$search%")->get();

        }else{
            $vehicules = DB::table('vehicules')->where('disponibilite', '0')->get();
         
        }
        
        $data=compact('vehicules','search');
       
 
        return view('dashboard.user.vehicules_disponible')->with($data);
    }





}
