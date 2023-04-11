{{-- <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Client</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body> --}}

@extends('layouts.master')
@section('content')
    
  {{-- formulaire --}}
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        {{-- <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1>Bienvenue</h1>
        </div> --}}
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class=" text-2xl font-bold mb-8 text-primary"></span>
              
              
              {{-- <div class="min-h-screen bg-gray-100 p-0 sm:p-12"> --}}
                <div>
                <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
                  <h1 class="text-xl font-bold text-center mb-8">Veuillez saisir vos information</h1>
                  <form id="form" action="{{route('client.update',$client->id)}}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="relative z-0 w-full mb-5">
                      <input type="text" name="nom" placeholder=" "  value="{{old('nom',$client->nom)}}" class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"/>
                      <label for="nom" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Entrer votre nom</label>
                      @error('nom')
                        <span class="text-sm text-red-600" id="error">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="relative z-0 w-full mb-5">
                      <input type="text" name="prenom" placeholder=" "  value="{{old('prenom',$client->prenom)}}" class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"/>
                      <label for="prenom" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Entrer votre prenom</label>
                      @error('prenom')
                        <span class="text-sm text-red-600" id="error">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="relative z-0 w-full mb-5">
                        <input type="text" name="telephone" placeholder=" " required value="{{old('telephone',$client->telephone)}}" class="pt-3 pb-2 pl-5 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        <div class="absolute top-0 left-0 mt-3 ml-1 text-gray-400"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-4 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                          </svg>
                          </div>
                        <label for="telephone" class="absolute duration-300 top-3 left-5 -z-1 origin-0 text-gray-500">Numero de telephone</label>
                        @error('telephone')
                           <span class="text-sm text-red-600" id="error">{{$message}}</span>
                        @enderror
                      </div>

                    <div class="relative z-0 w-full mb-5">
                      <input type="email" name="email" placeholder=" " required value="{{old('email',$client->email)}}" class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"/>
                      <label for="email" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Entrer votre adresse mail </label>
                      @error('email')
                        <span class="text-sm text-red-600" id="error">{{$message}}</span>
                      @enderror
                    </div>

                    <fieldset class="relative z-0 w-full p-px mb-5">
                      <legend class="absolute text-gray-500 transform scale-75 -top-3 origin-0">Genre</legend>
                      <div class="flex pt-3 pb-2 space-x-4">
                        <label>
                          <input type="radio" name="genre" value="male" required class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black" {{ $client->genre == 'male' ? 'checked' : '' }} />
                          Mâle
                        </label>
                        <label>
                          <input type="radio" name="genre" value="femelle" required class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black" {{ $client->genre == 'femelle' ? 'checked' : '' }} />
                          Femelle
                        </label>
                      </div>
                      @error('genre')
                        <span class="text-sm text-red-600" id="error">{{$message}}</span>
                      @enderror
                    </fieldset>
              
              
                    <fieldset class="relative z-0 w-full p-px mb-5">
                      <legend class="absolute text-gray-500 transform scale-75 -top-3 origin-0">Situation familiale</legend>
                      <div class="flex pt-3 pb-2 space-x-4">
                        <label>
                          <input type="radio" name="situation_familiale" required value="0"  class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black" {{ $client->situation_familiale == '0' ? 'checked' : '' }} />
                          Célibataire
                        </label>
                        <label>
                          <input type="radio" name="situation_familiale" required value="1"  class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black" {{ $client->situation_familiale == '1' ? 'checked' : '' }} />
                          Marié
                        </label>
                      </div>
                      @error('situation_familiale')
                        <span class="text-sm text-red-600" id="error">{{$message}}</span>
                      @enderror
                    </fieldset>
              
                    <fieldset class="relative z-0 w-full p-px mb-5">
                        <legend class="absolute text-gray-500 transform scale-75 -top-3 origin-0">Type d'hébergement</legend>
                        <div class="flex pt-3 pb-2 space-x-4">
                          <label>
                            <input type="radio" name="hebergement" required value="proprietaire"  class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black" {{ $client->hebergement == 'proprietaire' ? 'checked' : '' }} />
                            Proprietaire
                          </label>
                          <label>
                            <input type="radio" name="hebergement" required value="locataire"  class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black" {{ $client->hebergement == 'locataire' ? 'checked' : '' }} />
                            Locataire
                          </label>
                        </div>
                        @error('hebergement')
                        <span class="text-sm text-red-600" id="error">{{$message}}</span>
                      @enderror
                      </fieldset>

                      <div class="relative z-0 w-full mb-5">
                      <input type="text" name="adresse" placeholder=" " required value="{{old('adresse',$client->adresse)}}" class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"/>
                      <label for="adresse" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Entrer votre adresse</label>
                      @error('adresse')
                        <span class="text-sm text-red-600" id="error">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="flex flex-row space-x-4">
                      <div class="relative z-0 w-full mb-5">
                        <input type="text" name="ville" placeholder=" " required value="{{old('ville',$client->ville)}}" class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        />
                        <label for="ville" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Ville</label>
                        @error('ville')
                        <span class="text-sm text-red-600" id="error">{{$message}}</span>
                      @enderror
                      </div>
                      <div class="relative z-0 w-full">
                        <input type="number" name="departement" placeholder=" "  value="{{old('departement',$client->departement)}}" class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"/>
                        <label for="departement" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Département</label>
                        @error('departement')
                        <span class="text-sm text-red-600" id="error">{{$message}}</span>
                      @enderror
                      </div>
                    </div>
              
                    <div class="relative z-0 w-full mb-5"> 
                      <input type="number" name="montant_facture" placeholder=" "  value="{{old('montant_facture',$client->montant_facture)}}" min="0" class="pt-3 pb-2 pl-5 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                      <div class="absolute top-0 left-0 mt-3 ml-1 text-gray-400">$</div>
                      <label for="montant_facture" class="absolute duration-300 top-3 left-5 -z-1 origin-0 text-gray-500">Montant facture d'électricité</label>
                      @error('montant_facture')
                        <span class="text-sm text-red-600" id="error">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="relative z-0 w-full mb-5"> 
                      <input type="number" name="reste_a_vivre" placeholder=" "  value="{{old('reste_a_vivre',$client->reste_a_vivre)}}" min="0" class="pt-3 pb-2 pl-5 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                      <div class="absolute top-0 left-0 mt-3 ml-1 text-gray-400">€</div>
                      <label for="reste_a_vivre" class="absolute duration-300 top-3 left-5 -z-1 origin-0 text-gray-500">Le reste à vivre</label>
                    </div>
  
                    <button id="button" type="submit" class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-500 hover:bg-blue-600 hover:shadow-lg focus:outline-none">
                      Enregistrer Modification
                    </button>
                  </form>
                </div>
              </div>
              
            
              {{--End form --}}
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  {{-- end formulaire --}}

  @endsection

    {{-- </body> --}}
{{-- </html> --}}