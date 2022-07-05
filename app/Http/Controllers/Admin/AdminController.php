<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Contrat;
use App\Models\Demande;
use App\Models\User;
use App\Models\Vehicule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Contracts\Service\Attribute\Required;

use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    function check(Request $request){
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30'
         ],[
             'email.exists'=>'This email is not exists in admins table'
         ]);

         $creds = $request->only('email','password');

         if( Auth::guard('admin')->attempt($creds) ){
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('admin.login')->with('fail','Incorrect credentials');
        }
    }
    
    function logout(Request $request){

        Auth::guard('admin')->logout();
        return redirect('/');
    }

    function editer_password_admin(Request $request){
        $request->validate([

            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password'

        ]);
        $admin=Auth::user();
        $id=$admin->id;

        $changer_password=DB::table('admins')
                         ->where('id',$id)
                         ->update([
                             'password'=>bcrypt($request->input('password')),
                         ]);
                         
        return redirect('admin/changer_password_admin')->with('succes','mots de passe modifier avec succes');
    }
    function home(){
      
        $userCount = User::count(); 
        $contratCount = Contrat::count(); 
        $vehiculeCount = Vehicule::count(); 
        $demandeAchatCount = Demande::where('typeDemande','=','Vente')->count();
        $demandeLocationCount = Demande::where('typeDemande','=','location')->count();
        $data=compact('userCount','contratCount','vehiculeCount','demandeAchatCount','demandeLocationCount');
        
      return view('dashboard.admin.home')->with($data);


   }




    //GESTION  DES CLIENTS
 
    function list_clients(Request $request){
        Auth::guard('admin');
       
        $search=$request['search'] ?? "";
        if($search != "") {
            $users=User::where('nom','like',"%$search%")->orWhere('prenom','like',"%$search%")->orWhere('cin','like',"%$search%")->orWhere('telephone','like',"%$search%")->orWhere('email','like',"%$search%")->get();

        }else{
            $users=user::all();
        }
        
        $data=compact('users','search');
        return view('dashboard.admin.listes_des_clients')->with($data);
    }


 public function modifier_client($id)
    {
                $row=DB::table('users')
               ->where('id',$id)
               ->first();
        $data=[
            'Info_client'=>$row
        ];
        
        return view('dashboard.admin.modifier_client',$data);
    }
    public function editer_client(Request $request){
        $id = $request->input('cid');
        $client = User::find($id);
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
            // 'password'=>'nullable|min:5|max:30',
            // 'cpassword'=>'nullable|min:5|max:30|same:password'
        ]);
        
      
    //    $vehicule = Vehicule::find($id);
       $client->cin = $request->input('cin');
       $client->prenom = $request->input('prenom');
       $client->nom = $request->input('nom') ;
       $client->numeroPermis = $request->input('numeroPermis') ;
       $client->telephone = $request->input('telephone') ;
       $client->adressClient = $request->input('adressClient') ;
       $client->codePotal = $request->input('codePotal') ;
       $client->ville = $request->input('ville') ;
       $client->email = $request->input('email') ;
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
            $client->picture= $filename;
        }
        $client->update();
        return Redirect('admin/Listes_des_clients');

    //   $email = $request->input('email') ;

    //   $data=array('cin'=>$cin,'prenom'=>$prenom,'nom'=>$nom,'telephone'=>$telephone,'email'=>$email,'password'=>$password,'picture'=>$picture);
    //   DB::table('users')->where('id',$request->input('cid'))->update($data);
    //   DB::table('users')->update($data);
     

    
        // $updating=DB::table('users')
        //             ->where('id',$request->input('cid'))
        //             ->update([
        //                 'cin'=>$request->input('cin'),
        //                 'prenom'=>$request->input('prenom'),
        //                 'nom'=>$request->input('nom'),
        //                 'telephone'=>$request->input('telephone'),
        //                 'email'=>$request->input('email'),
        //                 'password'=>$request->input('password'),
                        
        //                 'picture'=>$request->input('picture'),
        //             ]);
                
        
    }





    public function supprimer_client($id){

        $client=User::find($id);
        $destination='uploads/Clients/'.$client->picture;

        if(file::exists($destination)){
            file::delete($destination);
        }
        $client->delete();
        return Redirect('admin/Listes_des_clients');




        // $delete=DB::table('users')
        //           ->where('id',$id)
        //           ->delete();
                  

    }

    public function detail_client($id ){

     
       

        $users = DB::table('users')            
                ->select('users.*')
                ->where('id',$id)
                ->first();
             
                $data=[
                    'Info'=>$users
                ]; 


         return view('dashboard.admin.detail_client',$data);


    }
    public function impression_detail_client($id ){

     
       

        $users = DB::table('users')            
                ->select('users.*')
                ->where('id',$id)
                ->first();
             
                $data=[
                    'Info'=>$users
                ]; 


         return view('dashboard.admin.impression_detail_client',$data);


    }
    

    







      //GESTION  DES VEHICULES
    
    public function liste_vehicules(Request $request){
      
      

        $search=$request['search'] ?? "";
        if($search != "") {
            $vehicules=Vehicule::where('matricule','like',"%$search%")->orWhere('Modele','like',"%$search%")->orWhere('Carburant','like',"%$search%")->orWhere('AnneeModele','like',"%$search%")->orWhere('Puissance','like',"%$search%")->orWhere('Marque','like',"%$search%")->get();

        }else{
            $vehicules=Vehicule::all();
        }
        
        $data=compact('vehicules','search');
       
 
        return view('dashboard.admin.Liste_vehicules')->with($data);

    }
    // public function Nouveau_vehicules(){
    //     return view('dashboard.admin.Nouveau_vehicules');

    // }

    public function create_vehicule(Request $request){
        $request->validate([
            'Marque'=>'required',
            'matricule'=>'required|unique:vehicules,matricule',
            'AnneeModele'=>'required',
            'Puissance'=>'required',
     
            'Modele'=>'required',
            'Carburant'=>'required',
            'voitureImage'=>'required',
            'kilometrage'=>'required',
            //  'typeAction'=>'required|in:Vente,location',
            // 'typeAction'=>'nullable',
            'dateDebutAssurance'=>'required',
            'dateFinAssurance'=>'required',
            'dateDebutCertificatVisiteTechnique'=>'required',
            'dateFinCertificatVisiteTechnique'=>'required',
            // 'prixAchat'=>'nullable'
            


        ]);
        $vehicule=new Vehicule();
        $vehicule->Marque=$request->Marque;
        $vehicule->matricule=$request->matricule;
        $vehicule->AnneeModele=$request->AnneeModele;
        $vehicule->Puissance=$request->Puissance;
        // $vehicule->CoutParJour=$request->CoutParJour;
        $vehicule->Modele=$request->Modele;   
        $vehicule->Carburant=$request->Carburant;
        $vehicule->kilometrage=$request->kilometrage;
        // $vehicule->typeAction=$request->typeAction;
        $vehicule->dateDebutAssurance=$request->dateDebutAssurance;
        $vehicule->dateFinAssurance=$request->dateFinAssurance;
        $vehicule->dateDebutCertificatVisiteTechnique=$request->dateDebutCertificatVisiteTechnique;
        $vehicule->dateFinCertificatVisiteTechnique=$request->dateFinCertificatVisiteTechnique;
        if($request->hasfile('voitureImage'))
        {
            $file = $request->file('voitureImage');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/vehicules/', $filename);
            $vehicule->voitureImage = $filename;
        }
       
       
       

        $save_vehicule=$vehicule->save();
        if($save_vehicule){
            return redirect()->back()->with('succes','enregistré avec succès');

        }else
        {
            return redirect()->back()->with('echec','Quelque chose est mal passé, échec de l\'enregistrement');

        }


    }

    // public function create_vehicule(Request $request){
    //     $request->validate([
    //         'matricule'=>'required',
    //         'AnneeModele'=>'required',
    //         'Puissance'=>'required',
    //         'CoutParJour'=>'required',
    //         'Modele'=>'required',
    //         'Carburant'=>'required',
    //         'voitureImage'=>'nullable'

    //     ]);

    //     $vehicule = new Vehicule();
    //     $vehicule->matricule=$request->matricule;
    //     $vehicule->AnneeModele=$request->AnneeModele;
    //     $vehicule->Puissance=$request->Puissance;
    //     $vehicule->CoutParJour=$request->CoutParJour;
    //     $vehicule->Modele=$request->Modele;
    //     $vehicule->Carburant=$request->Carburant;
    //     $vehicule->voitureImage=$request->voitureImage;
    //     $save = $vehicule->save();

    //     if( $save ){
    //         return redirect()->back()->with('succes','enregistré avec succès');
    //     }else{
    //         return redirect()->back()->with('echec','Quelque chose est mal passé, échec de l\'enregistrement');
    //     }
    // }
    public function modifier_vehicule($id){
        $row=DB::table('vehicules')
               ->where('id',$id)
               ->first();
        $data=[
            'Info'=>$row
        ];     

         return view('dashboard.admin.modifier_vehicule',$data);      
    }
    public function editer_vehicule(Request $request){
        $id=$request->input('cid');
        $vehicule=Vehicule::find($id);
       
        $request->validate([
            'Marque'=>'required',
            'matricule'=>'required|Unique:vehicules,matricule,'.$id,
            'AnneeModele'=>'required',
            'Puissance'=>'required',
            // 'CoutParJour'=>'nullable',
            'Modele'=>'required',
            'Carburant'=>'required',
            'voitureImage'=>'nullable',
            'kilometrage'=>'required',
            //  'typeAction'=>'required|in:Vente,location',
            // 'typeAction'=>'nullable',
            'dateDebutAssurance'=>'required',
            'dateFinAssurance'=>'required',
            'dateDebutCertificatVisiteTechnique'=>'required',
            'dateFinCertificatVisiteTechnique'=>'required',
            // 'prixAchat'=>'nullable',
           
        ]);
        $vehicule->Marque=$request->Marque;
        $vehicule->matricule=$request->matricule;
        $vehicule->AnneeModele=$request->AnneeModele;
        $vehicule->Puissance=$request->Puissance;
        // $vehicule->CoutParJour=$request->CoutParJour;
        $vehicule->Modele=$request->Modele;   
        $vehicule->Carburant=$request->Carburant;
        $vehicule->kilometrage=$request->kilometrage;
        //  $vehicule->typeAction=$request->typeAction;
        $vehicule->dateDebutAssurance=$request->dateDebutAssurance;
        $vehicule->dateFinAssurance=$request->dateFinAssurance;
        $vehicule->dateDebutCertificatVisiteTechnique=$request->dateDebutCertificatVisiteTechnique;
        $vehicule->dateFinCertificatVisiteTechnique=$request->dateFinCertificatVisiteTechnique;


         if($request->hasfile('voitureImage')){

            $voitureImage=$request->input('voitureImage');
            $destination='uploads/vehicules/'.$voitureImage;
            if(FILE::exists($destination)){
                File::delete($destination);
            }
            $file=$request->file('voitureImage');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('uploads/vehicules/',$filename);
            $vehicule->voitureImage=$filename;

            
        }
        $vehicule->update();

        return Redirect('admin/Liste_vehicules');

        // $updating=DB::table('vehicules')
        //             ->where('id',$request->input('cid'))
        //             ->update([
        //                 $vehicule->matricule=>$request->input('matricule'),
        //                 'AnneeModele'=>$request->input('AnneeModele'),
        //                 'Puissance'=>$request->input('Puissance'),
        //                 'CoutParJour'=>$request->input('CoutParJour'),
        //                 'Modele'=>$request->input('Modele'),
        //                 'Carburant'=>$request->input('Carburant'),
        //                 'voitureImage'=>$request->input('voitureImage'),


        //             ]);
                 

    }
    public function supprimer_vehicule($id){

        $vehicule=Vehicule::find($id);
      
        $destination = 'uploads/vehicules/'.$vehicule->voitureImage;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $vehicule->delete();
        // $delete=DB::table('vehicules')
        //           ->where('id',$id)
        //           ->delete();
                  return Redirect('admin/Liste_vehicules');

    }

    public function detail_vehicule($id ){

        $vehicules = DB::table('vehicules')            
                ->select('vehicules.*')
                ->where('id',$id)
                ->first();
             
                $data=[
                    'Info'=>$vehicules
                ]; 


         return view('dashboard.admin.detail_vehicule',$data);


        }
    
    public function impression_detail_vehicule($id){

        $vehicules = DB::table('vehicules')            
                ->select('vehicules.*')
                ->where('id',$id)
                ->first();
             
                $data=[
                    'Info'=>$vehicules
                ]; 


         return view('dashboard.admin.impression_detail_vehicule',$data);

        }
    
        function impression_clients(Request $request){
            Auth::guard('admin');
            $users=user::all();
            return view('dashboard.admin.impression_clients')-> with( compact('users'));
        }
        function impression_vehicules(Request $request){
    
            Auth::guard('admin');
            $vehicules=vehicule::all();
            return view('dashboard.admin.impression_vehicules')-> with( compact('vehicules'));
        }
        function impression_contrats(Request $request){
    
            Auth::guard('admin');
            $contrats = DB::table('contrats')
            ->join('users', 'contrats.cinClient', '=', 'users.cin')
            ->join('vehicules', 'contrats.matriculeVehicules', '=', 'vehicules.matricule')
            
            ->select('contrats.*', 'users.nom', 'users.prenom','users.telephone','users.codePotal','users.ville','users.numeroPermis'
            ,'vehicules.Marque','vehicules.Modele')

            ->get();
        
  
            return view('dashboard.admin.impression_contrats')-> with( compact('contrats'));
        }
        public function impression_detail_contrat_location($numeroContrat,$cin,$matricule ){

            Auth::guard('admin');
           
    
            $contrats = DB::table('contrats')
                    ->join('users', 'contrats.cinClient', '=', 'users.cin')
                    ->join('vehicules', 'contrats.matriculeVehicules', '=', 'vehicules.matricule')
                    
                    ->select('contrats.*', 'users.nom', 'users.prenom','users.email','users.telephone','users.picture','users.adressClient','users.telephone','users.codePotal','users.ville','users.numeroPermis'
                    ,'vehicules.Marque','vehicules.Modele','vehicules.AnneeModele','vehicules.Puissance','vehicules.Modele','vehicules.Carburant','vehicules.voitureImage','vehicules.kilometrage','vehicules.dateDebutAssurance','vehicules.dateFinAssurance','vehicules.dateDebutCertificatVisiteTechnique','vehicules.dateFinCertificatVisiteTechnique')
                    ->where('numeroContrat',$numeroContrat)
                    ->first();
                 
                    $data=[
                        'Info'=>$contrats
                    ]; 
    
    
             return view('dashboard.admin.impression_detail_contrat_location',$data);
    
    
        }
        public function impression_detail_contrat_achat($numeroContrat,$cin,$matricule ){

            Auth::guard('admin');
       

            $contrats = DB::table('contrats')
                    ->join('users', 'contrats.cinClient', '=', 'users.cin')
                    ->join('vehicules', 'contrats.matriculeVehicules', '=', 'vehicules.matricule')
                    
                    ->select('contrats.*', 'users.nom', 'users.prenom','users.email','users.telephone','users.picture','users.adressClient','users.telephone','users.codePotal','users.ville','users.numeroPermis'
                    ,'vehicules.Marque','vehicules.Modele','vehicules.AnneeModele','vehicules.Puissance','vehicules.Modele','vehicules.Carburant','vehicules.voitureImage','vehicules.kilometrage','vehicules.dateDebutAssurance','vehicules.dateFinAssurance','vehicules.dateDebutCertificatVisiteTechnique','vehicules.dateFinCertificatVisiteTechnique')
                    ->where('numeroContrat',$numeroContrat)
                    ->first();
                 
                    $data=[
                        'Info'=>$contrats
                    ]; 
    
    
             return view('dashboard.admin.impression_detail_contrat_achat',$data);
    
    
        }
     
     
    

    



   //Contrats
   function create_contrat_achat(Request $request){
       

    $request->validate([
        'numeroContrat'=>'required|unique:contrats,numeroContrat',
        'cinClient'=>'required||exists:users,cin',
        'typeContrat'=>'required|in:Vente,location',
        'matriculeVehicules'=>'required|exists:vehicules,matricule',      
        'typePaiement'=>'required|in:cheque,carteBancaire,especes',             
        'dateAchatVehicules'=>'required',      
        'prixAchatVehicules'=>'required',     
    ],[
        'cinClient.exists'=>'ce cin n\'existe pas dans la table client',
        'matriculeVehicules.exists'=>'cette voiture  n\'existe pas dans la table vehicules'
    ]);

    // $contrat = DB::table('contrats')
    // ->join('users', 'users.cin', '=', 'contrats.cinClient')
    // ->join('vehicules', 'vehicules.matricule', '=', 'contrats.matriculeVehicules')

    // ->select('contrats.*', 'users.nom', 'users.prenom','users.telephone','users.adressClient','users.codePotal','users.ville','users.numeroPermis','users.email',
    // 'vehicules.Marque','vehicules.Modele','vehicules.AnneeModele','vehicules.Puissance','vehicules.Carburant','vehicules.kilometrage','vehicules.Marque','vehicules.dateDebutAssurance','vehicules.dateFinAssurance','vehicules.dateDebutCertificatVisiteTechnique','vehicules.dateFinCertificatVisiteTechnique',)
    // ->get();

    $myquery = DB::table('vehicules')->select('disponibilite')
            ->where('matricule', '=', $request->matriculeVehicules)->get();
foreach($myquery as $i)
{
    $test=$i->disponibilite;
}
if($test == 0 )
{
    $contrats=new Contrat();
    $contrats->numeroContrat=$request->numeroContrat;
    $contrats->cinClient=$request->cinClient;
    $contrats->typeContrat=$request->typeContrat;
    $contrats->matriculeVehicules=$request->matriculeVehicules;
    $contrats->typePaiement=$request->typePaiement;
    $contrats->dateAchatVehicules=$request->dateAchatVehicules;
    $contrats->prixAchatVehicules=$request->prixAchatVehicules;
    

    $save_contrat=$contrats->save();
    if($save_contrat){
        $nodispo='1';
                    
        $updating_disponible=DB::table('vehicules')
                  ->where('matricule',$request->matriculeVehicules)
                   ->update([
                    'disponibilite'=>$nodispo,
                    'dateDebutL'=>null,
                    'dateFinL'=>null,
                    
             
                   ]);




        return redirect()->back()->with('succes','enregistré avec succès');


    }else
    {
        return redirect()->back()->with('echec','Quelque chose est mal passé, échec de l\'enregistrement');

    } 
}else{
        return redirect()->back()->with('echec','cette voiture n\'est pas disponible pour le moment');


       }





   }

//contrat
   function create_contrat_location(Request $request){
       
   
    // $verifier_disponibilite = DB::table('vehicules')->where('matricule', $request->matriculeVehicules)->select('disponibilite');

    $request->validate([
        'numeroContrat'=>'required|Unique:contrats,numeroContrat',
        'cinClient'=>'required||exists:users,cin',
        'typeContrat'=>'required|in:Vente,location',
        'matriculeVehicules'=>'required|exists:vehicules,matricule',      
        'typePaiement'=>'required|in:cheque,carteBancaire,especes',             
        'dateDebutLocationVehicules'=>'required',      
        'dateFinLocationVehicules'=>'required', 
        'coutParJourVehicules'=>'required',
        'dureeLocationVehicules'=>'required', 
        
    ],[
        'cinClient.exists'=>'ce cin n\'existe pas dans la table client',
        'matriculeVehicules.exists'=>'cette voiture  n\'existe pas dans la table vehicules'
    ]);



$myquery = DB::table('vehicules')->select('disponibilite')
->where('matricule', '=', $request->matriculeVehicules)->get();
foreach($myquery as $i)
{
    $test=$i->disponibilite;
}


    if($test == 0 )
    {


        $contrats=new Contrat();
                        $contrats->numeroContrat=$request->numeroContrat;
                        $contrats->cinClient=$request->cinClient;
                        $contrats->typeContrat=$request->typeContrat;
                        $contrats->matriculeVehicules=$request->matriculeVehicules;
                        $contrats->typePaiement=$request->typePaiement;
                        $contrats->dateDebutLocationVehicules=$request->dateDebutLocationVehicules;
                        $contrats->dateFinLocationVehicules=$request->dateFinLocationVehicules;
                        $contrats->coutParJourVehicules=$request->coutParJourVehicules;
                        $contrats->dureeLocationVehicules=$request->dureeLocationVehicules;
                        
                    
                        $save_contrat=$contrats->save();
                        if($save_contrat){
                    
                            
                     
                            $nodispo='1';
                    
                             $updating=DB::table('vehicules')
                                       ->where('matricule',$request->matriculeVehicules)
                                        ->update([
                                         'disponibilite'=>$nodispo,
                                         'dateDebutL'=>$request->dateDebutLocationVehicules,
                                         'dateFinL'=>$request->dateFinLocationVehicules
                                        ]);

                            

                            
                    
                          
                    
                            return redirect()->back()->with('succes','enregistré avec succès');
                    
                        }else
                        {
                            return redirect()->back()->with('echec','Quelque chose est mal passé, échec de l\'enregistrement');
                    
                        }

                       }else{
                        return redirect()->back()->with('echec','cette voiture n\'est pas disponible pour le moment');


                       }

   






   }
   
    function liste_contrats(Request $request){

        Auth::guard('admin');
        // $contrats=Contrat::all();
        $search=$request['search'] ?? "";
        if($search != "") {
            $contrats = DB::table('contrats')
            ->join('users', 'contrats.cinClient', '=', 'users.cin')
            ->join('vehicules', 'contrats.matriculeVehicules', '=', 'vehicules.matricule')
            
            ->select('contrats.*', 'users.nom', 'users.prenom','users.telephone','users.codePotal','users.ville','users.numeroPermis'
            ,'vehicules.Marque','vehicules.Modele')
            ->where('matricule','like',"%$search%")->orWhere('Marque','like',"%$search%")->orWhere('numeroContrat','like',"%$search%")->orWhere('Modele','like',"%$search%")->orWhere('Carburant','like',"%$search%")->orWhere('AnneeModele','like',"%$search%")->orWhere('Puissance','like',"%$search%")
            ->orWhere('nom','like',"%$search%")->orWhere('prenom','like',"%$search%")
            
            ->get();

        }else{
            $contrats = DB::table('contrats')
            ->join('users', 'contrats.cinClient', '=', 'users.cin')
            ->join('vehicules', 'contrats.matriculeVehicules', '=', 'vehicules.matricule')
            
            ->select('contrats.*', 'users.nom', 'users.prenom','users.telephone','users.codePotal','users.ville','users.numeroPermis'
            ,'vehicules.Marque','vehicules.Modele')

            ->get();
        }
        
        $data=compact('contrats','search');
       
 
        return view('dashboard.admin.liste_contrats')->with($data);

        // $contrats = DB::table('contrats')
        //         ->join('users', 'contrats.cinClient', '=', 'users.cin')
        //         ->join('vehicules', 'contrats.matriculeVehicules', '=', 'vehicules.matricule')
                
        //         ->select('contrats.*', 'users.nom', 'users.prenom','users.telephone','users.codePotal','users.ville','users.numeroPermis'
        //         ,'vehicules.Marque','vehicules.Modele')
        //         ->where('matricule','like',"%$search%")->orWhere('Modele','like',"%$search%")->orWhere('Carburant','like',"%$search%")->orWhere('AnneeModele','like',"%$search%")->orWhere('Puissance','like',"%$search%")
        //         ->orWhere('nom','like',"%$search%")->orWhere('prenom','like',"%$search%")
                
        //         ->get();


        //  return view('dashboard.admin.liste_contrats')->with('contrats',$contrats);
    }


    public function detail_contrat_location($numeroContrat,$cin,$matricule ){

        Auth::guard('admin');
       

        $contrats = DB::table('contrats')
                ->join('users', 'contrats.cinClient', '=', 'users.cin')
                ->join('vehicules', 'contrats.matriculeVehicules', '=', 'vehicules.matricule')
                
                ->select('contrats.*', 'users.nom', 'users.prenom','users.email','users.telephone','users.picture','users.adressClient','users.telephone','users.codePotal','users.ville','users.numeroPermis'
                ,'vehicules.Marque','vehicules.Modele','vehicules.AnneeModele','vehicules.Puissance','vehicules.Modele','vehicules.Carburant','vehicules.voitureImage','vehicules.kilometrage','vehicules.dateDebutAssurance','vehicules.dateFinAssurance','vehicules.dateDebutCertificatVisiteTechnique','vehicules.dateFinCertificatVisiteTechnique')
                ->where('numeroContrat',$numeroContrat)
                ->first();
             
                $data=[
                    'Info'=>$contrats
                ]; 


         return view('dashboard.admin.detail_contrat_location',$data);


    }

    public function detail_contrat_achat($numeroContrat,$cin,$matricule ){

        Auth::guard('admin');
       

        $contrats = DB::table('contrats')
                ->join('users', 'contrats.cinClient', '=', 'users.cin')
                ->join('vehicules', 'contrats.matriculeVehicules', '=', 'vehicules.matricule')
                
                ->select('contrats.*', 'users.nom', 'users.prenom','users.email','users.telephone','users.picture','users.adressClient','users.telephone','users.codePotal','users.ville','users.numeroPermis'
                ,'vehicules.Marque','vehicules.Modele','vehicules.AnneeModele','vehicules.Puissance','vehicules.Modele','vehicules.Carburant','vehicules.voitureImage','vehicules.kilometrage','vehicules.dateDebutAssurance','vehicules.dateFinAssurance','vehicules.dateDebutCertificatVisiteTechnique','vehicules.dateFinCertificatVisiteTechnique')
                ->where('numeroContrat',$numeroContrat)
                ->first();
             
                $data=[
                    'Info'=>$contrats
                ]; 


         return view('dashboard.admin.detail_contrat_achat',$data);


    }

    public function modifier_contrat_achat($id){
        $row=DB::table('contrats')
               ->where('id',$id)
               ->first();
        $data=[
            'Info'=>$row
        ];     

         return view('dashboard.admin.modifier_contrat_achat',$data);      
    }

    public function editer_contrat_achat(Request $request){
        $id=$request->input('cid');
        $contrats=Contrat::find($id);
        $request->validate([
            // 'numeroContrat'=>'nullable|Unique:contrats,numeroContrat',
            'cinClient'=>'required|exists:users,cin',
            'typeContrat'=>'nullable|in:Vente,location',
            'matriculeVehicules'=>'required|exists:vehicules,matricule',      
            'typePaiement'=>'nullable|in:cheque,carteBancaire,especes',             
            'dateAchatVehicules'=>'required',      
            'prixAchatVehicules'=>'required',     
        ],[
        
            'cinClient.exists'=>'ce cin n\'existe pas dans la table client',
            'matriculeVehicules.exists'=>'cette voiture  n\'existe pas dans la table vehicules'
        ]);

        // $contrats->numeroContrat=$request->numeroContrat;
        $contrats->cinClient=$request->cinClient;
        $contrats->typeContrat=$request->typeContrat;
        $contrats->matriculeVehicules=$request->matriculeVehicules;
        $contrats->typePaiement=$request->typePaiement;
        $contrats->dateAchatVehicules=$request->dateAchatVehicules;
        $contrats->prixAchatVehicules=$request->prixAchatVehicules;
        
        $contrats->update();

      

        return Redirect('admin/liste_contrats');


                 

    }
    public function modifier_contrat_location($id){
        $row=DB::table('contrats')
               ->where('id',$id)
               ->first();
        $data=[
            'Info'=>$row
        ];     

         return view('dashboard.admin.modifier_contrat_location',$data);      
    }
    public function editer_contrat_location(Request $request){
        $id=$request->input('cid');
        $contrats=Contrat::find($id);
       
        $request->validate([
            // 'numeroContrat'=>'nullable|exists:contrats,numeroContrat',
            'cinClient'=>'required|exists:users,cin',
            'typeContrat'=>'nullable|in:Vente,location',
            'matriculeVehicules'=>'required|exists:vehicules,matricule',      
            'typePaiement'=>'nullable|in:cheque,carteBancaire,especes',             
            'dateDebutLocationVehicules'=>'required',      
            'dateFinLocationVehicules'=>'required', 
            'coutParJourVehicules'=>'required',
            'dureeLocationVehicules'=>'required',    
        ],[
            'cinClient.exists'=>'ce cin n\'existe pas dans la table client',
            'matriculeVehicules.exists'=>'cette voiture  n\'existe pas dans la table vehicules'
        ]);

        // $contrats->numeroContrat=$request->numeroContrat;
        $contrats->cinClient=$request->cinClient;
        $contrats->typeContrat=$request->typeContrat;
        $contrats->matriculeVehicules=$request->matriculeVehicules;
        $contrats->typePaiement=$request->typePaiement;
        $contrats->dateDebutLocationVehicules=$request->dateDebutLocationVehicules;
        $contrats->dateFinLocationVehicules=$request->dateFinLocationVehicules;
        $contrats->coutParJourVehicules=$request->coutParJourVehicules;
        $contrats->dureeLocationVehicules=$request->dureeLocationVehicules;
        $contrats->update();
     
        return Redirect('admin/liste_contrats');

                 

    }

    public function supprimer_contrat($id){

        $contrats=Contrat::find($id);  
        $delete=DB::table('contrats')
                  ->where('id',$id)
                  ->delete();
                  return Redirect('admin/liste_contrats');

    }


    public function liste_demande_location(){
            
        $demandes=Demande::where('typeDemande','=','location')->get();

        $data=compact('demandes');
        
        return view('dashboard.admin.liste_demande_location',$data);  
    }

    public function liste_demande_achat(){


        $demandes=Demande::where('typeDemande','=','Vente')->get();

        $data=compact('demandes');
        
        return view('dashboard.admin.liste_demande_achat',$data);
        
    }
    public function page_accepter_demande_location($id){
       
        $row=DB::table('demandes')
        ->where('id',$id)
        ->first();

      $data=[
     'Info'=>$row
      ];     

  return view('dashboard.admin.page_accepter_demande_location',$data);  
  


    }
  

   public function accepter_demande_location(Request $request){
       
    $demandes=Demande::where('id',$request->cid)->get();


        $request->validate([
            'numeroContrat'=>'required|Unique:contrats,numeroContrat',
           
          
                
            'typePaiement'=>'required|in:cheque,carteBancaire,especes',             

            'coutParJourVehicules'=>'required',

            'cinClient'=>'required',
  
        
            
        ]);
        $contrats=new Contrat();
        $contrats->numeroContrat=$request->numeroContrat;
        $contrats->cinClient=$request->cinClient;
        $contrats->typeContrat='location';
        $contrats->matriculeVehicules=$request->matricule;
        $contrats->typePaiement=$request->typePaiement;
        $contrats->dateDebutLocationVehicules=$request->dateDebutLocation;
        $contrats->dateFinLocationVehicules=$request->dateFinLocation;
        $contrats->coutParJourVehicules=$request->coutParJourVehicules;
      
        
    
        $save_contrat=$contrats->save();
        if($save_contrat){
    
            
     
            $nodispo='1';
    
             $updating_disponible=DB::table('vehicules')
                       ->where('matricule',$request->matricule)
                        ->update([
                         'disponibilite'=>$nodispo,
                         'dateDebutL'=>$request->dateDebutLocation,
                         'dateFinL'=>$request->dateFintLocation
                        ]);

            $updating_demande_accepter=DB::table('demandes')
                     ->where('id',$request->cid)             
                     ->update([
                     'status_demande'=>'Approuvé',

                ]);


            

            
    
          
    
            return redirect()->back()->with('succes','enregistré avec succès');
    
        }else
        {
            return redirect()->back()->with('echec','Quelque chose est mal passé, échec de l\'enregistrement');
    
        }





   }

   public function page_accepter_demande_achat($id){

    $row=DB::table('demandes')
    ->where('id',$id)
    ->first();

  $data=[
 'Info'=>$row
  ];     

return view('dashboard.admin.page_accepter_demande_achat',$data);  
   }

   
   public function accepter_demande_achat(Request $request){
       
    $demandes=Demande::where('id',$request->cid)->get();


        $request->validate([
            'numeroContrat'=>'required|Unique:contrats,numeroContrat',
           
          
                
            'typePaiement'=>'required|in:cheque,carteBancaire,especes',             

            'prixAchatVehicules'=>'required', 

            'cinClient'=>'required',
            
        
            
        ]);
        $contrats=new Contrat();
        $contrats->numeroContrat=$request->numeroContrat;
        $contrats->cinClient=$request->cinClient;
        $contrats->typeContrat='Vente';
        $contrats->matriculeVehicules=$request->matricule;
        $contrats->typePaiement=$request->typePaiement;
        $contrats->dateAchatVehicules=$request->dateAchat;
        $contrats->prixAchatVehicules=$request->prixAchatVehicules;
      
        
    
        $save_contrat=$contrats->save();
        if($save_contrat){
    
            
     
            $nodispo='1';
    
             $updating_disponible=DB::table('vehicules')
                       ->where('matricule',$request->matricule)
                        ->update([
                         'disponibilite'=>$nodispo,
                         'dateDebutL'=>$request->dateDebutLocation,
                         'dateFinL'=>$request->dateFintLocation
                        ]);

            $updating_demande_accepter=DB::table('demandes')
                     ->where('id',$request->cid)             
                     ->update([
                     'status_demande'=>'Approuvé',

                ]);


            

            
    
          
    
            return redirect()->back()->with('succes','enregistré avec succès');
    
        }else
        {
            return redirect()->back()->with('echec','Quelque chose est mal passé, échec de l\'enregistrement');
    
        }





   }

   public function Refuser_demande_achat($id){

            $updating_demande_refuser_achat=DB::table('demandes')
                     ->where('id',$id)             
                     ->update([
                     'status_demande'=>'Refuser',

                ]);
                return Redirect('admin/liste_demande_achat');


   }
   public function Refuser_demande_location($id){

    $updating_demande_refuser_location=DB::table('demandes')
             ->where('id',$id)             
             ->update([
             'status_demande'=>'Refuser',

        ]);
        return Redirect('admin/liste_demande_location');


}



    // function updateInfo(Request $request){

    // }
    
}
