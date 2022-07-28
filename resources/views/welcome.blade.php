@extends('equation.layout')
@section('content')
    <div class="jumbotron container">
        <img src="\images\Capture5.png" class="img-fluid" alt="Responsive image">
           <a class="btn btn-outline-secondary"  href="{{ route('about') }}" role="button">عن الموقع</a>
        <form action="{{ $url = route('courses.index') }}"
            method="post">
            @csrf
            @method('GET')
            <span style="
      margin: 0 0 0 480px"> اختر الجامعة</span>
            <p></p>
            <select style="
    margin: 0 0 0 400px;" class="olduniversities" id="Olduniversity_id">
                <option value="0" disabled="true" selected="true">الجامعة</option>
                @foreach ($Olduniversites as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <hr>
            <span style="
      margin: 0 0 0 480px"> اختر الكلية</span>
            <p></p>
            <select style="
    margin: 0 0 0 400px;" class="collages">
                <option value="0" disabled="true" selected="true">الكلية/المعهد</option>
            </select>
            <hr>
            <span style="
    margin: 0 0 0 480px"> اختر الاختصاص</span>
            <p></p>
            <select style="
      margin: 0 0 0 400px;" class="specials">
                <option value="0" disabled="true" selected="true">الاختصاص/قسم</option>
            </select>

            <hr>

            <button  class="btn btn-primary" type="submit" style="
    margin: 0 0 0 400px;">موافق</button>
            <br>
            <label class="oo">
            </label>
            <br>
            <label class="cc">

            </label>
            <br>
            <label class="ss">

            </label>
            <br>


        </form>
        <br>
         <a class="btn btn-primary btn-lg" style="
            margin: 0 0 0 400px;" href="{{ route('olduniversities.create') }}" role="button">اضافة جامعة </a>
            <br>
            <br>
        <form action="{{ $url = route('collages.create') }}"
        method="post">
        @csrf
        @method('GET')

            <label class="oo2">

            </label>
            <button  class="btn btn-primary" type="submit" style="
            margin: 0 0 0 400px;">اضافة كلية</button>
        </form>
<br>
        <form action="{{ $url = route('specials.create') }}"
            method="post">
            @csrf
            @method('GET')

                 <label class="ccc">

                </label>
                <button  class="btn btn-primary" type="submit" style="
                margin: 0 0 0 400px;">اضافة اختصاص</button>
            </form>

    </div>

@endsection
