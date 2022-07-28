@extends('specials.layout')
@section('content')

<div class="container" style="padding: 8%">
    <div class="card">
        <div class="card-body">
          <p class="card-text"> <span><a href="{{route('specials.index' )}}">back</a> </span> اسم الاختصاصspecials name: {{ $special->name}}</p>
        </div>
      </div>

    <div class="container" style="padding-top: 2%">


    <div class="form-group">
      <label for="exampleFormControlInput1">{{$special->name}}</label>
    </div>



</div>
</div>
@endsection
