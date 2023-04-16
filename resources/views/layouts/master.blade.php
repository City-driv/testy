<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Home')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])

    @yield('links')
</head>
<body>

{{-- navbar --}}
<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/" class="flex items-center">
        <img src="{{url('img/logo.png')}}" class="rounded-full w-16 h-12 m-2" alt="IDW Logo">
        {{-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">IDW </span> --}}
    </a>
    <div class="flex md:order-2">
{{-- @auth --}}
    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ Auth::user()->email }} </button>
{{-- @endauth --}}
<button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="/" class="block py-2 pl-3 pr-4 {{ $_SERVER["REQUEST_URI"]== '/' ? 'text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500' : 'text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0' }}" aria-current="page">Accueil</a>
        </li>
        <li>
          <a href="{{route('profile.index')}}" class="block  py-2 pl-3 pr-4 {{ $_SERVER["REQUEST_URI"]== '/profile' ? 'text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500' : 'text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0' }}">Profiles</a>
        </li>
        <li>
          <a href="{{route('profile.create')}}" class="block py-2 pl-3 pr-4 {{ $_SERVER["REQUEST_URI"]== '/profile/create' ? 'text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500' : 'text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0' }}">Ajouter profile</a>
        </li>
        <li>
          <a href="{{route('logout')}}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Se déconnecter</a>
        </li>
      </ul>
    </div>
    </div>
  </nav>
  

  {{-- end nav --}}
  <div class="relative container w-full md:w-4/5   mx-auto mt-28 ">
      @if (session()->has('success'))
          <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
              <span class="font-medium">Bravo !</span> {{session('success')}} .
          </div>
      @elseif (session()->has('danger'))
          <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
              <span class="font-medium">Alert!</span>{{session('danger')}} .
          </div>
      @elseif (session()->has('info'))
          <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
              <span class="font-medium">Alert Info!</span>{{session('info')}} .
          </div>
      @endif
  </div>


    <main>
      
        @yield('content')
    </main>


{{-- footer --}}
<footer>
    <div class="w-full  bottom-0 bg-gray-900">
        <div class="max-w-2xl mx-auto text-white py-4">
           
            <div class="mt-18 flex flex-col md:flex-row md:justify-between items-center text-sm text-white-400">
                <p class="order-2 md:order-1 mt-8 md:mt-0">copyright &copy; {{now()->year}} IDW . by Mr_Bmd. </p>
                <div class="order-1 md:order-2 ">
                    <span class="px-2 text-teal-600">About us</span>
                    <span class="px-2 border-l text-teal-600">Contact us</span>
                    <span class="px-2 border-l text-teal-600">Privacy Policy</span>
                </div>
            </div>
        </div>
    </div>
</footer>


</body>
</html>