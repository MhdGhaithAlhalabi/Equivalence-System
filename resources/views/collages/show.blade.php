@extends('collages.layout')
@section('content')

<div class="container" style="padding: 8%">
    <div class="card">
        <div class="card-body">
          <p class="card-text"> <span><a href="{{route('collages.index' )}}">عرض</a> </span> اسم الكلية {{ $collage->name}}</p>
        </div>
      </div>

    <div class="container" style="padding-top: 2%">


    <div class="form-group">
      <label for="exampleFormControlInput1">{{$collage->name}}</label>
    </div>



</div>
</div>
@endsection
