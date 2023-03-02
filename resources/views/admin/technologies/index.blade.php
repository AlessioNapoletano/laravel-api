@extends('layouts.admin')

@section('title', 'Technologies')

@section('content')
<section class="index-admin-technologies py-5 mb-5">
    <div class="container">
        <!--Print message-->
        @include('admin.technologies.partials.session-message')
        
        @if (session('alert-message'))
            <div id="popup_message" class="d-none" data-type="{{ session('alert-type') }}" data-message="{{ session('alert-message') }}"></div>
        @endif
    
        <table class="table text-light bg-dark">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">name</th>
                    <th scope="col">bg_color</th>
                    <th scope="col">
                        actions ...
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($technologies as $technology)
                <tr>
                    <td>{{ $technology->id }}</td>
                    <td>{{ $technology->name }}</td>
                    <td style="background-color: {{ $technology->bg_color }};">{{ $technology->bg_color }}</td>
                    <td>
                        <a href="{{ route('admin.technologies.show', $technology->slug) }}" class="btn btn-primary">
                            <i class="fa-solid fa-eye "></i>
                        </a>
                        <a href="{{ route('admin.technologies.edit', $technology->slug) }}" class="btn btn-success">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
    
                        <form class="d-inline delete" action="{{ route('admin.technologies.destroy', $technology->slug)}}" method="POST">
                        @csrf
                        @method('DELETE')
    
                        <button class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    
        
          
    </div>
    
</section>

@endsection

@section('script')
    @vite('resources/js/confirmDelete.js')
@endsection
