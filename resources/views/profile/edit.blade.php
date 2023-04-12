@extends('layouts.master')
@section('title','Editer profile')

@section('content')
    
{{-- form --}}
<form action="{{route('profile.update',$profile->id)}}" method="POST">
@csrf
@method('PUT')
<div class="min-w-screen min-h-screen bg-gray-900 flex items-center justify-center px-5 py-5">
    <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
        <div class="md:flex w-full">
            <div class="hidden md:block w-1/2 bg-blue-500 py-10 px-10">
                <img src="{{url('img/img2.jpg')}}" id="img2" width="100%" height="100%"   />
            </div>
            <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                <div class="text-center mb-10">
                    <h1 class="font-bold text-3xl text-gray-900">Modifier Utilisateur </h1>
                    <p>Modifier les informations de l'utilisateur</p>
                </div>
                <div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Nom Complet</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                <input type="text" name="name" value="{{old('name',$profile->name)}}" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" >
                            </div>
                            @error('name')
                                 <span class="text-xs font-semibold px-1 text-red-600">{{$message}}</span>
                            @enderror
                        </div>
                    </div>    
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Adresse Email</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                                <input type="email" name="email" value="{{old('email',$profile->email)}}" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" >
                            </div>
                            @error('email')
                                 <span class="text-xs font-semibold px-1 text-red-600">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Password</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                <input type="password" name="password" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="************">
                            </div>
                            @error('password')
                                 <span class="text-xs font-semibold px-1 text-red-600">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-10">
                            <label for="countries" class="text-xs font-semibold px-1">Le Role</label>
                            <div class="flex">
                                <select id="countries" name="role_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value=3 selected>Choisir un role</option>
                                    @if ( Auth::user()->role_id == 2 )
                                        {{-- <option value=1 @if($profile->role_id == 1) selected @endif>Admin</option> --}}
                                    @else
                                        <option value=1 @if($profile->role_id == 1) selected @endif>Admin</option>
                                    @endif
                                    <option value=2 @if($profile->role_id == 2) selected @endif>Superuser</option>
                                    <option value=3 @if($profile->role_id == 3) selected @endif>User</option>
                                </select>
                            </div>

                        </div>
                    </div>




                    <div class="flex -mx-3">
                        <div class="w-full px-3 ">
                            <button type="submit" class="block w-full  bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">Modifier</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

{{-- end form --}}

@endsection