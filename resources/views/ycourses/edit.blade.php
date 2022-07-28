@extends('ycourses.layout')
@section('content')

<div class="container" style="padding: 8%">
    <div class="card">
        <div class="card-body">

          <p class="card-text">
              <span>
                <a href="javascript:history.back()" class="btn btn-primary btn-lg"  role="button">للخلف</a>

                  <a href="{{route('ycourses.index' )}}">رجوع</a>
        </span>
        <br>

        </div>
      </div>

    <div class="container" style="padding-top: 2%">

<form action="{{ route('ycourses.update',$ycourses->id )}}" method="POST">
@csrf
@method('PUT')
    <div class="form-group">
      <label for="exampleFormControlInput1">اسم المادة</label>
      <input type="text" name="name" value="{{$ycourses->name}}" class="form-control"  placeholder="اسم المادة">
    </div>
   <div class="form-group">
      <label for="exampleFormControlInput2">ساعاتها</label>
      <input type="text" name="hours" value="{{$ycourses->hours}}" class="form-control"  placeholder="ساعاتها">
    </div>


<div  class="form-group">
    <button type="submit" class="btn btn-primary">تحديث</button>
</div>
  </form>
</div>
</div>
@endsection
