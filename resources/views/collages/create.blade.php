@extends('collages.layout')
@section('content')

<div class="container" style="padding: 8%">
    <a class="btn btn-primary btn-lg" href="{{route('wel')}}" role="button">الصفحة الرئيسية </a>
    <div class="card">
        <div class="card-body">
          <p class="card-text"></p>
         <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
         <span><a href="{{route('collages.index' )}}">عرض</a> </span>
        </div>
      </div>

    <div class="container" style="padding: 2%">

</div>



<form action="{{route('collages.store')}}" method="post">
@csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">اسم الكلية</label>
      <input type="text" name="name" class="form-control"  placeholder="اسم الكلية">
      <label for="exampleFormControlInput1"></label>
      <input type="text" style="visibility: hidden" name="olduniversity_id" value="{{$olduniversity_id}}" class="form-control"  placeholder="{{$olduniversity_id}}">

    </div>
<div  class="form-group">
    <button type="submit" class="btn btn-primary">حفظ</button>
</div>
  </form>
</div>

@endsection
