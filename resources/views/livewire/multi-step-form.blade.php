<div>
  
    <form wire:submit.prevent="create_contrat">

        {{-- STEP 1 --}}

        @if ($currentStep == 1)
            
     
        <div class="step-one">
            <div class="card">
                <div class="card-header bg-secondary text-white">STEP 1/4 - Personal Details</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Numero Contrat</label>
                                <input type="text" class="form-control" placeholder="Enter numero contrat" wire:model="numeroContrat">
                               <span class="text-danger">@error('numeroContrat'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                            <label for="typeContrat">Type Contrat</label>
                            <select  class="form-control" wire:model="typeContrat">
                                   <option value="" selected>...</option>
                                   <option value="Vente">Vente</option>
                                   <option value="location">location</option>
                            </select>
                            <span class="text-danger">@error('typeContrat'){{ $message }}@enderror</span>
                           </div>
                       </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Cin Client</label>
                                <input type="text" class="form-control" placeholder="Enter cin client" wire:model="cinClient">
                               <span class="text-danger">@error('cinClient'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="">Matricule Vehicules</label>
                               <input type="text" class="form-control" placeholder="Enter Matricule Vehicules" wire:model="matriculeVehicules">
                               <span class="text-danger">@error('matriculeVehicules'){{ $message }}@enderror</span>
                           </div>
                       </div>
                    </div>
        

                </div>
            </div>
        </div>
        @endif

        {{-- STEP 2 --}}

        @if ($currentStep == 2 )
            
       
        <div class="step-two">
            <div class="card">
                <div class="card-header bg-secondary text-white">STEP 2/4 - Louer vehicules</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">coutParJourVehicules</label>
                                <input type="number" class="form-control" placeholder="Enter cout Par Jour du Vehicules" wire:model="coutParJourVehicules">
                                <span class="text-danger">@error('coutParJourVehicules'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="">duree Location Vehicules</label>
                               <input type="text" class="form-control" placeholder="Enter duree " wire:model="dureeLocationVehicules">
                               <span class="text-danger">@error('dureeLocationVehicules'){{ $message }}@enderror</span>
                           </div>
                       </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">date Debut Location Vehicules</label>
                            
                                <input type="date" class="form-control" placeholder="Enter date Debut Location Vehicules " wire:model="dateDebutLocationVehicules">
                                <span class="text-danger">@error('dateDebutLocationVehicules'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">date Fin Location Vehicules</label>              
                                <input type="date" class="form-control" placeholder="Enter date fin Location Vehicules " wire:model="dateFinLocationVehicules">
                                <span class="text-danger">@error('dateFinLocationVehicules'){{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="typePaiement">Type Paiement</label>
                            <select  class="form-control" wire:model="typePaiement">
                                <option value="" selected>...</option>
                                <option value="cheque">cheque</option>
                                <option value="carteBancaire">Carte Bancaire</option>
                                <option value="especes">Especes</option>
                            </select>
                                <span class="text-danger">@error('typePaiement'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="number" name="prixTotalLocationVehicules" class="form-control" placeholder="prixTotalLocationVehicules" value="{{old ('voitureImage')}}">
                        <label class="form-label" for="prixTotalLocationVehicules">prix Total Location Vehicules</label>
                        <span class="text-danger">@error('prixTotalLocationVehicules'){{$message}}@enderror</span>
                      </div>
                </div>
            </div>
        </div>

        @endif

        @if ($currentStep == 2 )
            
       
        <div class="step-two">
            <div class="card">
                <div class="card-header bg-secondary text-white">STEP 2/4 - Achat vehicules</div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">date Achat Vehicules</label>             
                                <input type="date" class="form-control" placeholder="Enter date Achat Vehicules " wire:model="dateAchatVehicules">
                                <span class="text-danger">@error('dateAchatVehicules'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">prix Achat Vehicules</label>              
                                <input type="number" class="form-control" placeholder="Enter prix Achat Vehicules " wire:model="prixAchatVehicules">
                                <span class="text-danger">@error('prixAchatVehicules'){{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="typePaiement">Type Paiement</label>
                            <select  class="form-control" wire:model="typePaiement">
                                <option value="" selected>...</option>
                                <option value="cheque">cheque</option>
                                <option value="carteBancaire">Carte Bancaire</option>
                                <option value="especes">Especes</option>
                         </select>
                        <span class="text-danger">@error('typePaiement'){{ $message }}@enderror</span>
                       </div>

                </div>
            </div>
        </div>

        @endif
        {{-- STEP 3 --}}



        {{-- STEP 4 --}}
      

        <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

           @if ($currentStep == 1)
               <div></div>
           @endif

           @if ($currentStep == 2 )
               <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Back</button>
           @endif
           
           @if ($currentStep == 1 )
               <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>
           @endif
           
           @if ($currentStep == 2)
                <button type="submit" class="btn btn-md btn-primary">Submit</button>
           @endif
               
              
        </div>

    </form>
</div>
