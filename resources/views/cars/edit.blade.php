@extends('layouts.layout')

@section('main_content')

  <h1>Edit auto</h1>
  {{-- Validazione form --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Add new car form --}}
  <form action="{{route('cars.update', $car)}}" method="post">
  @csrf
  @method('PUT')

    <div>
      <label for="manifacturer">Manifacturer:</label><br>
      <input type="text" name="manifacturer" value="{{ ($car->manifacturer) ? $car->manifacturer : old('manifacturer') }}" placeholder="Inserisci la marca e il modello">
    </div>

    <div>
      <label for="year">Year:</label><br>
      <input type="number" name="year" value="{{ ($car->year) ? $car->year : old('year') }}" placeholder="Inserisci l'anno">
    </div>

    <div>
      <label for="engine">Engine:</label><br>
      <input type="text" name="engine" value="{{ ($car->engine) ? $car->engine : old('engine') }}" placeholder="Inserisci la motorizzazione">
    </div>

    <div>
      <label for="plate">Plate:</label><br>
      <input type="text" name="plate" value="{{ ($car->plate) ? $car->plate : old('plate') }}" placeholder="Inserisci la targa">
    </div>

    <div class="chekboxes">
      <label for="tags">Type:</label>
      @foreach ($tags as $tag)
        <div>
          <input type="checkbox" name="tags[]" {{ ($car->tags->contains($tag)) ? 'checked' : '' }} value="{{ $tag->id }}">
          <label>{{$tag->name}}</label>
        </div>
      @endforeach
    </div>

    <div>
      <select name="user_id">
        <option value="">Owner</option>
        @foreach ($users as $user)
          <option {{ ($user->id === $car->user->id) ? 'selected' : '' }} value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
      </select>
    </div>

    <div>
      <input type="submit" name="" value="save">
    </div>
  </form>

  <a href="{{ route('cars.index') }}">Torna alla lista</a>

@endsection
