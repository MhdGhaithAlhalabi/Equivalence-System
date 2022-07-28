@extends('courses.layout')
@section('content')

<div class="container" style="padding: 8%">
    <div class="card">
        <div class="card-body">

          <p class="card-text">
              <span>
        </span>
        <br>

        <a href="javascript:history.back()" class="btn btn-primary btn-lg"  role="button">للخلف</a>

        </div>
      </div>

    <div class="container" style="padding-top: 2%">

<form action="{{ route('courses.update',$courses->id )}}" method="POST">
@csrf

    <div class="form-group">
      <label for="exampleFormControlInput1">name</label>
      <input type="text" name="name" value="{{$courses->name}}" class="form-control"  placeholder="course name">
    </div>
   <div class="form-group">
      <label for="exampleFormControlInput2">hours</label>
      <input type="text" name="hours" value="{{$courses->hours}}" class="form-control"  placeholder="course hours">
    </div>
    <div class="form-group">
        @foreach ($ycourses as $item)
        <input type="checkbox" name=" courses[] "  value="{{$item->id}}"
        @foreach ($courses->ycourses as $item2)
        @if ($item->id == $item2->id)
            checked
        @endif

        @endforeach
        >
        <label > {{ $item->name }}</label>
        <br>

        @endforeach

    </div>
<div  class="form-group">
    <button type="submit" class="btn btn-primary">update</button>
</div>
  </form>
</div>
</div>
@endsection
