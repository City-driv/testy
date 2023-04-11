<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Se Connecter</title>
</head>
<body>
    
{{-- form --}}
<form action="{{route('login')}}" method="POST">
@csrf
<div class="min-w-screen min-h-screen bg-gray-900 flex items-center justify-center px-5 py-5">
    <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
        <div class="md:flex w-full">
            <div class="hidden md:block w-1/2 bg-blue-500 py-10 px-10">
                <img src="{{url('img/img3.jpg')}}" id="img2" width="100%" height="100%"   />
            </div>
            <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                <div class="text-center mb-10">
                    <h1 class="font-bold text-3xl text-gray-900">Se Connecter </h1>
                    {{-- <p>Entrez les informations de l'utilisateur</p> --}}
                </div>
                <div>
                   
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Adresse Email</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                                <input type="email" id="email" name="email" value="{{old('email')}}" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="jonSnow@example.com">
                            </div>
                            @error('login')
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
                            {{-- @error('password')
                                 <span class="text-xs font-semibold px-1 text-red-600">{{$message}}</span>
                            @enderror --}}
                        </div>
                    </div>
                    <div class="flex items-start mb-8">
                        <div class="flex items-center h-5">
                          <input id="remember" name="remember" type="checkbox" value="remember" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" >
                        </div>
                        <label for="remember" class="ml-2 text-sm font-medium text-gray-900">Remember me</label>
                    </div>
                    
                    <div class="flex -mx-3">
                        <div class="w-full px-3 ">
                            <button type="submit" class="block w-full  bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">Ajouter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

{{-- end form --}}
</body>
</html>