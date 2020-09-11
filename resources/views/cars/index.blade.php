@extends('layouts.layout')

@section('main_content')

  <h1>Cars list</h1>
  <div>
    <a class="new" href="{{route('cars.create')}}">Add new car</a>
  </div>
  <div class="cont_flex">
    @foreach ($cars as $car)
      <div>
        <h3>
          <a href="{{ route('cars.show', $car) }}" >{{$car->manifacturer}} {{ $car->engine}}</a>
        </h3>
        <a class="edit" href="{{ route('cars.edit', $car) }}">Modifica</a>
        <form class="delete" action="{{ route('cars.destroy', $car) }}" method="post">
        @csrf
        @method('DELETE')
          <input type="submit" value="Elimina">
        </form>
      </div>
    @endforeach
  </div>

  <a href="/">--> Vai alla home <--</a>

@endsection
