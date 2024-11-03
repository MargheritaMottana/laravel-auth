@extends('layouts.app')

@section('page-title', $project->title)

@section('main-content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-body text-center">
                    <h1 class=" text-success">
                        {{ $project->title }}
                    </h1>

                    <h6>
                        {{-- modificato il formato della data --}}
                        Created at {{ $project->created_at->format('d/m/Y - H:i')}}
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <img src="{{ $project->cover }}" class="card-img-top" alt="{{ $project->title }}">

                <div class="card-body">
                    <ul>
                        <li>
                            ID: {{ $project->id }}
                        </li>

                        <li>
                            Slug: {{ $project->slug }}
                        </li>
                        <li>
                            Client: {{ $project->client }}
                        </li>
                        <li>
                            Sector: {{ $project->sector }}
                        </li>
                        <li>
                            Published: {{ $project->published ? 'Yes' : 'No' }}
                        </li>
                    </ul>

                    <p class="mb-4">
                        Description:
                        <br>
                        {{-- per mantenere gli a capo quando visualizzo la descrizione --}}
                        {!! nl2br($project->description) !!}
                    </p>

                    {{-- rotta alla view per modificare il progetto, specificando il parametro del singolo progetto --}}
                    <a class="btn btn-outline-warning btn-sm" href="{{ route('admin.projects.edit', ['project' => $project->id]) }}">
                        ໒(⊙ᴗ⊙)७✎
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
