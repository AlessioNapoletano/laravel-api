@extends('layouts.admin')

@section('title', 'Alessio Napoletano')

@section('content')

<section class="welcome-page">
    <div class="container mb-5 py-5">
        <div class="row">
            @foreach ($projects as $project)
                <div class="col-6 d-flex flex-wrap align-items-stretch">
                    <div class="card mb-5">
                    
                        @if ( $project->isImageAUrl())
                            <img src="{{ $project->cover_image }}"
                        @else
                            <img src="{{ asset('storage/' . $project->cover_image ) }}"
                        @endif
                            alt="{{ $project->title }} image" class="img-fluid">
    
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-3 d-flex justify-content-around">
                                <span>
                                    {{ $project->title }}
                                </span>
                                
                                <span class="btn btn-success rounded-3">
                                    {{ $project->type->type }}
                                </span>
                                
                            </h5>
    
                            <!--Tecnologie utilizzate nel progetto-->
                            <p class="card-text text-center">
                                <span class="fw-bold">
                                    Tecnologie utilizzate: 
                                </span>
                                
                                @foreach ($project->technologies as $tecnology)
                                <span class="text-light fw-bold p-2 me-1 rounded-2" 
                                style="background-color: {{ $tecnology->bg_color }};">
                                    {{ $tecnology->name }}
                                </span>
                                @endforeach
                                
                            </p>

                            <!--Data di creazione del progetto-->
                            <p class="card-text text-center">
                                <span class="fw-bold">
                                    Data Di Creazione: 
                                </span>
    
                                <span>
                                    {{ $project->post_date}}
                                </span>
                            </p>
    
                            <!--Descrizione del progetto-->
                            <p class="card-text">{{ $project->content }}</p>
                            
                        </div>
    
                        <div class="button text-center mb-2">
                            <a href="{{ route('api.projects.show', $project->slug) }}" class="btn btn-primary">show Api</a>
                        </div>
                    </div>
                </div>  
            @endforeach
        </div>
        
        <div class="container">
            <div class="fw-bold">
                {{ $projects->links() }}
            </div>    
        </div>
</section>

@endsection