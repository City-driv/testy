@extends('layouts.master')
    @section('profiles page')
    @section('content')
    <div class="p-6 flex flex-wrap items-center justify-center mt-12">
        
        @foreach ($profiles as $profile)
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow m-1">
                    <div class="flex flex-col items-center pb-6">
                        <img class="w-24 h-24 mb-3 mt-1 rounded-full shadow-lg" src="/img/img2.jpg" alt="{{$profile->id}} Bonnie image"/>
                        <h5 class="mb-1 text-xl font-medium text-gray-900">{{$profile->name}}</h5>
                        <span class="text-sm text-gray-500 mb-2"> <a href="mailto:{{$profile->email}}">{{$profile->email}}</a> </span>
    
                        <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">
                            @if ($profile->role_id==1)
                                Admin
                            @elseif ($profile->role_id==2)
                                Superuser
                            @else 
                                User
                            @endif
    
                        </span>
                        @if ( Auth::user()->role_id == 1 or  Auth::user()->role_id == 2)                        
                        <div class="flex mt-4 space-x-3 md:mt-6">
                            <a href="{{route('profile.edit',$profile->id)}}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Modifier</a>
                            @if ( Auth::user()->role_id == 1)
                                <form action="{{route('profile.destroy',$profile->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" onclick=" return confirm('Etes vous sur de vouloir supprimer') " class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-500 border border-gray-300 rounded-lg hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-gray-200">Supprimer</a>
                                </form>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
        @endforeach
        </div>
        <div class="p-6 text-end">

            <a href="{{route('profile.create')}}">
            <button class="icon-btn add-btn">
                <div class="add-icon"></div>
                <div class="btn-txt">Ajouter Profile</div>
            </button>
        </a>
        </div>
    @endsection