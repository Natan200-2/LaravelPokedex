@extends('layouts.main')

@section('title',$pokemon['name'])

@section('content')
<div class="details">
  <div class="card mb-2 custom-card" style="max-width: 95vw;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="{{$image}}" class="img-fluid" alt="{{$pokemon['name']}}">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h3 class="card-title">{{$pokemon['name']}}</h3>
            <h6 class="card-subtitle mb-2 text-body-secondary">Abilities: </h6>
            <p class="card-text">
              {{implode ( ' | ', $abilities)}}</p>
            <h6 class="card-subtitle mb-2 text-body-secondary">Type: </h6>
            <p class="card-text">
              {{implode ( ' | ', $types)}}</p>
            <div class="moves">
              <h6 class="card-subtitle mb-2 text-body-secondary">Moves: </h6>
              <p class="d-inline-flex gap-1">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMoves" aria-expanded="false" aria-controls="collapseMoves">
                  Moves 
                </button>
              </p>
              <div class="collapse" id="collapseMoves" style="margin-bottom: 10px;">
                <div class="card card-body">
                  <div class="row row-cols-1 row-cols-md-6 g-4">
                    @foreach ($moves as $move)
                    <div class="col">
                      <p>-{{$move}}</p>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <div class="Locations">
              <h6 class="card-subtitle mb-2 text-body-secondary">Locations: </h6>
              <p class="d-inline-flex gap-1">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLocations" aria-expanded="false" aria-controls="collapseLocations">
                  Locations 
                </button>
              </p>  
              <div class="collapse" id="collapseLocations" style="margin-bottom: 10px;">
                <div class="card card-body">
                  <div class="row row-cols-1 row-cols-md-3 g-4">                
                    @forelse ($locations as $location)
                    <div class="col">
                      <li>
                          {{$location['location_area']['name']}}
                      </li>
                    </div>
                    @empty
                        <p>There are no locations to find this pokemon</p>
                    @endforelse
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection