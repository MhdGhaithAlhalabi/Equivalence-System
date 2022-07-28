@extends('collages.layout')
@section('content')

<div class="container" style="padding: 8%">
    <div class="card">
        <div class="card-body">

          <p class="card-text"><span><a href="{{route('collages.index' )}}">عرض</a>
        </span> اسم الكلية {{ $collage->name}}</p>
        </div>
      </div>

    <div class="container" style="padding-top: 2%">

<form action="{{ route('collages.update',$collage->id )}}" method="POST">
@csrf
@method('PUT')
    <div class="form-group">
      <label for="exampleFormControlInput1">اسم الكلية</label>
      <input type="text" name="name" value="{{$collage->name}}" class="form-control"  placeholder="اسم الكلية">
    </div>
<div  class="form-group">
    <button type="submit" class="btn btn-primary">تعديل</button>
</div>
  </form>
</div>
</div>
@endsection
