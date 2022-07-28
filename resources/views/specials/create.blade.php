@extends('specials.layout')
@section('content')

<div class="container" style="padding: 8%">
    <a class="btn btn-primary btn-lg" href="{{route('wel')}}" role="button">الصفحة الرئيسية </a>
    <div class="card">
        <div class="card-body">
          <p class="card-text"></p>
         <span><a href="{{route('specials.index' )}}">عرض</a> </span>
        </div>
      </div>

    <div class="container" style="padding: 2%">

</div>



<form action="{{route('specials.store')}}" method="post">
@csrf
    <div class="form-group">

      <label for="exampleFormControlInput1">اسم الاختصاص</label>
      <input type="text" name="name" class="form-control"  placeholder="اسم الاختصاص ">
      <label for="exampleFormControlInput2"></label>
      <input type="text" style="visibility: hidden" name="collage_id" value="{{$collage_id}}" class="form-control"  placeholder="collage_id">
    </div>
<div  class="form-group">
    <button type="submit" class="btn btn-primary">حفظ</button>
</div>
  </form>
</div>

@endsection
