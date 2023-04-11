@extends('layouts.master')

@section('content')
@section('links')
    
{{-- css DataTable --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
{{-- Responsive Extension Datatables CSS --}}
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
{{-- dataTable buttons --}}
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
{{-- selected column --}}
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.6.2/css/select.dataTables.min.css">
{{-- icon --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@vite(['resources/css/app.css','resources/js/app.js'])

@endsection


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        {{-- <!--Container--> --}}
        <div class="container w-full md:w-4/5   mx-auto px-2">
      
  {{-- <!--Title--> --}}
            <h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
                Clients Table
            </h1>
    
            {{-- <!--Card--> --}}
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
    
    
                <table id="myTable" class="hover bg-purple-50" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead class="text-s text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th data-priority="1" scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th data-priority="2" scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Nom
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Prenom
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Telephone
                                </div>
                            </th><th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Email
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    genre
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Hebergement
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Situation familiale
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Adresse
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Ville
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Departement
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Montant_facture
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Reste à vivre
                                </div>
                            </th>
                            @if ( Auth::user()->role_id == 1 or  Auth::user()->role_id == 2 )
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Action
                                </div>
                            </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                        <tr class="bg-white border-b">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{$client->id}}
                            </td>
                            <td class="px-6 py-4">
                                {{$client->nom}}
                            </td>
                            <td class="px-6 py-4">
                                {{$client->prenom}}
                            </td>
                            <td class="px-6 py-4">
                                {{$client->telephone}}
                            </td>
                            <td class="px-6 py-4">
                                {{$client->email}}
                            </td>
                            <td class="px-6 py-4">
                                {{$client->genre}}
                            </td>
                            <td class="px-6 py-4">
                                {{$client->hebergement}}
                            </td>
                            <td class="px-6 py-4">
                                {{$client->situation_familiale}}
                            </td>
                            <td class="px-6 py-4">
                                {{$client->adresse}}
                            </td>
                            <td class="px-6 py-4">
                                {{$client->ville}}
                            </td>
                            <td class="px-6 py-4">
                                {{$client->departement}}
                            </td>
                            <td class="px-6 py-4">
                                €{{$client->montant_facture}}
                            </td>
                            <td class="px-6 py-4">
                                €{{$client->reste_a_vivre}}
                            </td>
                            @if ( Auth::user()->role_id == 1 or  Auth::user()->role_id == 2 )
                                <td class="px-6 py-4 text-right">
                                    <div class="flex">
                                    <a href="{{route('client.edit',$client->id)}}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</a>
                                    @if ( Auth::user()->role_id == 1 )
                                        <form action="{{route('client.destroy',$client->id)}}" method="post">
                                        @csrf
                                        @method('DElETE')
                                            <button class="text-red-700 hover:text-white border border-red-700 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" onclick=" return confirm('Etes vous sur de vouloir supprimer !') ">Supprimer</button>
                                        </form>
                                    @endif
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    
        
                    </tbody>
    
                </table>
    
    
            </div>
            <!--/Card-->
    
    
        </div>
        <!--/container-->








    {{-- //////////////////////////////////////////////////////////////////// --}}

  
    
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    {{-- dataTable --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    {{-- dataTable responsive --}}
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    {{-- dataTable buttons --}}


    @if ( Auth::user()->role_id == 1 or  Auth::user()->role_id == 2 )
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    @endif
    {{-- selected column --}}
    <script src="https://cdn.datatables.net/select/1.6.2/js/dataTables.select.min.js"></script>
    {{-- column visibility --}}
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>

@endsection