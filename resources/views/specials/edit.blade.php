@extends('specials.layout')
@section('content')

<div class="container" style="padding: 8%">
    <div class="card">
        <div class="card-body">

          <p class="card-text"><span><a href="{{route('specials.index' )}}">رجوع</a> </span> اسم الاختصاص {{ $special->name}}</p>
        </div>
      </div>

    <div class="container" style="padding-top: 2%">

<form action="{{ route('specials.update',$special->id )}}" method="POST">
@csrf
@method('PUT')
    <div class="form-group">
      <label for="exampleFormControlInput1">اسم الاختصاص</label>
      <input type="text" name="name" value="{{$special->name}}" class="form-control"  placeholder="اسم الاختصاص">
    </div>
<div  class="form-group">
    <button type="submit" class="btn btn-primary">تعديل</button>
</div>
  </form>
</div>
</div>
@endsection
