@extends('olduniversities.layout')
@section('content')

<div class="container" style="padding: 8%">
    <div class="card">
        <div class="card-body">

          <p class="card-text"><span><a href="{{route('olduniversities.index' )}}">عرض</a> </span> اسم الجامعة {{ $olduniversity->name}}</p>
        </div>
      </div>

    <div class="container" style="padding-top: 2%">

<form action="{{ route('olduniversities.update',$olduniversity->id )}}" method="POST">
@csrf
@method('PUT')
    <div class="form-group">
      <label for="exampleFormControlInput1">اسم الجامعة</label>
      <input type="text" name="name" value="{{$olduniversity->name}}" class="form-control"  placeholder="اسم الجامعة">
    </div>
<div  class="form-group">
    <button type="submit" class="btn btn-primary">تعديل</button>
</div>
  </form>
</div>
</div>
@endsection
