@extends('layouts.main')

@section('title',$pokemon['name'])

@section('content')
<div class="card mb-3" style="max-width: 90vw;">
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
          <h6 class="card-subtitle mb-2 text-body-secondary">Moves: </h6>
          <p class="card-text">
            {{implode ( ' | ', $moves)}}</p>
            <h6 class="card-subtitle mb-2 text-body-secondary">Localizações: </h6>
          <ul>                
            @forelse ($locations as $location)
                <li>
                    {{$location['location_area']['name']}}
                </li>
                @empty
                    <p>Não há localizações para encontrar este pokemon</p>
            @endforelse
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection