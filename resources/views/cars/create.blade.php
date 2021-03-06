@extends('layouts.layout')

@section('main_content')

  <h1>Add auto</h1>
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
  <form action="{{route('cars.store')}}" method="post">
  @csrf
  @method('POST')

    <div>
      <label for="manifacturer">Manifacturer:</label><br>
      <input type="text" name="manifacturer" value="{{ old('manifacturer')}}" placeholder="Inserisci la marca e il modello">
    </div>

    <div>
      <label for="year">Year:</label><br>
      <input type="number" name="year" value="{{ old('year')}}" placeholder="Inserisci l'anno">
    </div>

    <div>
      <label for="engine">Engine:</label><br>
      <input type="text" name="engine" value="{{ old('engine')}}" placeholder="Inserisci la motorizzazione">
    </div>

    <div>
      <label for="plate">Plate:</label><br>
      <input type="text" name="plate" value="{{ old('plate')}}" placeholder="Inserisci la targa">
    </div>

    <div class="chekboxes">
      <label for="tags">Type:</label>
      @foreach ($tags as $tag)
        <div>
          <input type="checkbox" name="tags[]" value="{{$tag->id}}">
          <label>{{$tag->name}}</label>
        </div>
      @endforeach
    </div>

    <div>
      <select name="user_id">
        <option value="">Owner</option>
        @foreach ($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
      </select>
    </div>

    <div>
      <input type="submit" name="" value="save">
    </div>
  </form>

  <a href="{{ route('cars.index') }}">Torna alla lista</a>

@endsection
