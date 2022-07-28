@extends('courses.layout')
@section('content')

    <div class="container" style="padding: 8%">
        <a class="btn btn-primary btn-lg" href="{{ route('wel') }}" role="button">الصفحة الرئيسية </a>
        <a href="javascript:history.back()" class="btn btn-primary btn-lg"  role="button">للخلف</a>


        <div class="card">
            <div class="card-body">
                <p class="card-text"></p>
                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
        </div>

        <div class="container" style="padding: 2%">

        </div>



        <form action="{{ route('courses.store2') }}" method="post">
            @csrf

                    <label>------------------مواد الجامعة الجديدة---------------------</label>
                    <div class="form-group">
                    @foreach ($ycourses as $item)
                    <input type="checkbox" name="ycourses[]"  value="{{$item->id}}">
                    <label > {{ $item->name }}</label>
                    <br>
                    @endforeach
                    <label>------------------مواد الجامعة القديمة---------------------</label>
                    </div>
                    <div class="form-group">
                        @foreach ($courses2 as $item)
                        <input type="checkbox" name=" courses2[] "  value="{{$item->id}}">
                        <label > {{ $item->name }}</label>
                        <br>
                        @endforeach
                        </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>


        </form>


    </div>

@endsection
