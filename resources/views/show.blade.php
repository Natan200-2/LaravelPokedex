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
              <div class="col pokeinfo">
                <h6 class="card-subtitle info-title">Type: </h6>
                <p class="card-text info">
                  {{implode ( ' | ', $types)}}</p>                    
              </div>
              <div class="col pokeinfo">
                <h6 class="card-subtitle info-title">Abilities: </h6>
                <p class="card-text info">
                  {{implode ( ' | ', $abilities)}}</p>                    
              </div>
            </div>
            <div class="row stats-container">
              <div class="col stats">
                <h6 class="card-subtitle title-stats">HP:</h6>
                <div class="progress" role="progressbar" aria-label="hp" aria-valuenow="{{$hp}}" aria-valuemin="0" aria-valuemax="200" style="height: 10px">
                  <div class="progress-bar hp" style="width: {{$hp/200 * 100}}%"></div>
                </div>
                <p class="card-text stats-info">{{$hp}}</p>
              </div>
              <div class="col stats">
                <h6 class="card-subtitle title-stats">Attack:</h6>
                <div class="progress" role="progressbar" aria-label="attack" aria-valuenow="{{$attack}}" aria-valuemin="0" aria-valuemax="200" style="height: 10px">
                  <div class="progress-bar attack" style="width: {{$attack/200 * 100}}%"></div>
                </div>

                <p class="card-text stats-info">{{$attack}}</p>
              </div>
              <div class="col stats">
                <h6 class="card-subtitle title-stats">Defense:</h6>
                <div class="progress" role="progressbar" aria-label="defense" aria-valuenow="{{$defense}}" aria-valuemin="0" aria-valuemax="200" style="height: 10px">
                  <div class="progress-bar defense" style="width: {{$defense/200 * 100}}%"></div>
                </div>
                <p class="card-text stats-info">{{$defense}}</p> 
              </div>
              <div class="col stats">
                <h6 class="card-subtitle title-stats">Speed:</h6>
                <div class="progress" role="progressbar" aria-label="speed" aria-valuenow="{{$speed}}" aria-valuemin="0" aria-valuemax="200" style="height: 10px">
                  <div class="progress-bar speed" style="width: {{$speed/200 * 100}}%"></div>
                </div>
                <p class="card-text stats-info">{{$speed}}</p>
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