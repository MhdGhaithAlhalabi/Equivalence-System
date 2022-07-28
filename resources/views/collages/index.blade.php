@extends('collages.layout')
@section('content')


<div class="jumbotron container">
    <a class="btn btn-primary btn-lg" href="{{route('wel')}}" role="button">الصفحة الرئيسية </a>
    <p>اضافة كلية</p>
    <a class="btn btn-primary btn-lg" href="{{route('collages.create')}}" role="button">اضاقة </a>
  </div>
<div class="container">
@if ($message= Session::get('success'))
    <div class="alert alert-primary" role="alert">
        {{$message}}
    </div>
@endif

</div>
  <div class="container">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الاسم</th>
            <th scope="col">التعديلات</th>

          </tr>
        </thead>
        <tbody>

            @php
                $i=0;
            @endphp
            @foreach ($collages as $item )
            <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{$item->name}}</td>
                <td>
                    <div class="row">
                        <div class="col-sm">
                            <a class="btn btn-success" href="{{route('collages.edit' ,$item->id)}}"> التعديل</a>
                        </div>
                        <div class="col-sm">
                            <a class="btn btn-primary" href="{{route('collages.show' ,$item->id)}}" >عرض</a>

                        </div>
                        <div class="col-sm">
                            <form  action="{{ route('collages.destroy' , $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">حذف</button>

                                </form>                        </div>
                      </div>


                </td>

              </tr>
            @endforeach



        </tbody>
      </table>
      {!!$collages->links()!!}
  </div>

@endsection
