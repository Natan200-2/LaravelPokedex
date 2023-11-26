@extends('layouts.main')

@section('title',$pokemon['name'])

@section('content')
<div class="details">
  <div class="card mb-2 custom-card" style="max-width: 95vw;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="{{$image}}" class="img-fluid {{strtolower($types[0])}}" alt="{{$pokemon['name']}}">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h3 class="card-title name">{{$pokemon['name']}}</h3>
            <div class="row stats">
              <div class="col">
                <h6 class="card-subtitle mb-2 text-body-secondary">Type: </h6>
                <p class="card-text">
                  {{implode ( ' | ', $types)}}</p>                    
              </div>
              <div class="col">
                <h6 class="card-subtitle mb-2 text-body-secondary">Abilities: </h6>
                <p class="card-text">
                  {{implode ( ' | ', $abilities)}}</p>                    
              </div>
            </div>
            <div class="row stats">
              <div class="col">
                <h6 class="card-subtitle mb-2 text-body-secondary">HP:</h6>
                <p class="card-text">{{$hp}}</p>
              </div>
              <div class="col">
                <h6 class="card-subtitle mb-2 text-body-secondary">Attack:</h6>
                <p class="card-text">{{$attack}}</p>
              </div>
              <div class="col">
                <h6 class="card-subtitle mb-2 text-body-secondary">Defense:</h6>
                <p class="card-text">{{$defense}}</p> 
              </div>
              <div class="col">
                <h6 class="card-subtitle mb-2 text-body-secondary">Speed:</h6>
                <p class="card-text">{{$speed}}</p>
              </div>
            </div>
            <div class="locations-container">
              <p class="d-inline-flex gap-1">
                <button class="btn btn-custom" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLocations" aria-expanded="false" aria-controls="collapseLocations">
                  Locations 
                </button>
              </p>  
              <div class="collapse" id="collapseLocations" style="margin-bottom: 10px;">
                <div class="card card-body locations">
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