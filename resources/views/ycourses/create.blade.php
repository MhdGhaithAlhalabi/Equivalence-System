@extends('ycourses.layout')
@section('content')

<div class="container" style="padding: 8%">
    <a class="btn btn-primary btn-lg" href="{{route('wel')}}" role="button">الصفحة الرئيسية </a>
    <a href="javascript:history.back()" class="btn btn-primary btn-lg"  role="button">للخلف</a>

    <div class="card">
        <div class="card-body">
          <p class="card-text"></p>
         <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
         <span><a href="{{route('ycourses.index' )}}">رجوع</a> </span>
        </div>
      </div>

    <div class="container" style="padding: 2%">

</div>



<form action="{{route('ycourses.store')}}" method="post">
@csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">اسم المادة</label>
      <input type="text" name="name" class="form-control"  placeholder="اسم المادة">
      <label for="exampleFormControlInput1">ساعاتها</label>
      <input type="text" name="hours" class="form-control"  placeholder="ساعاتها">
    </div>
<div  class="form-group">
    <button type="submit" class="btn btn-primary">حفظ</button>
</div>
  </form>
  <form action="{{route('courses.store3')}}" method="post">
    @csrf

    <label for="exampleFormControlInput4"></label>
    <input type="text" style="visibility: hidden" value="{{ $special_id }}" name="speciale_id" class="form-control">

    <div class="form-group">
      <button type="submit" class="btn btn-primary">اضافة تعادلات </button>
  </div>
  </form>
</div>

@endsection
