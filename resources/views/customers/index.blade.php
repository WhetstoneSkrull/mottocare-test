@extends('layouts.app')
@section('content')
  <div class="container">

  <p>   MY DASHBOARD    </p>

     @foreach ($userData as $uData)
      {{$uData->first_name}}
      {{$uData->last_name}}
      {{$uData->email}}
      <div class="card-background">
            <img class="card" alt="" src="/images/{{$uData->account_pic}}" width="200px" height="200px">
        </div>

      </div>

    @endforeach
@endsection
