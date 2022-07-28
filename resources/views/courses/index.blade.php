@extends('courses.layout')
@section('content')


    <div class="jumbotron container">


        <a class="btn btn-primary btn-lg" style="margin: 0 0 0 700px;" href="{{ route('wel') }}" role="button">الصفحة الرئيسية </a>

        <a class="btn btn-outline-secondary"  href="{{ route('about') }}" role="button">عن الموقع</a>
        <br>
        <br>
        <h3>{{ $olduniversityname }} - {{ $collagename }} - {{ $specialname }}</h3>
        <br>
        <br>
        <input  type="text" id="pp" placeholder=" اسم الطالب " ></input>
        <br>
        <br>
        <input  type="text" id="pp2" placeholder=" اسم المنسق " ></input>
        <br>
    </div>
    <div class="container">
        <form id="alaa" action="courses/equal" method="GET">
            <table id="mytable" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">اسم المادة</th>
                        <th scope="col">ساعاتها</th>
                        <th scope="col">التعديلات</th>
                        <th scope="col">اختيار</th>
                    </tr>
                </thead>
                    @if (isset($courses) && $courses->count() > 0)
                        @foreach ($courses as $item)
                            <tr>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    <input type="text" name="hours" value="{{ $item->hours }}"
                                        placeholder="{{ $item->hours }}"></input>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm">
                                            <a class="btn btn-success" href="{{ route('courses.edit', $item->id) }}">
                                                تعديل</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <input type="checkbox" class="chkbx" name="courses[]" value="{{ $item->id }}">
                                </td>
    </div>
    </tr>
    @endforeach
    @endif
    </table>
    </form>
    <br>
    <a class="btn btn-primary btn-lg"  href="{{ route('courses.create', ['special_id' => $special_id, 'collage_id' => $collage_id, 'olduniversitie_id' => $olduniversity_id]) }}" role="button">اضافة مادة لهذا التخصص </a>
    <a class="btn btn-primary btn-lg"  href="{{ route('ycourses2.create', ['special_id' => $special_id]) }}" role="button">اضافة مادة  للجامعة الجديدة </a>
        <br>
        <br>
        <button onclick="calho()">الجمع</button>
<table id="table-1" class="table table-bordered table-striped table-hover" border="1" cellpadding="3">

        <tr>
            <th >الجامعة القديمة: {{ $olduniversityname}} -{{ $collagename}} - {{ $specialname}}</th>
            <th > اسم الطالب<input  type="text" id="fee" placeholder=" اسم الطالب " > </th>
            <th > اسم المنسق<input  type="text" id="fee2" placeholder=" اسم المنسق " > </th>
        </tr>

    <tr>
        <th >المادة بعد التعادل</th>
        <th >ساعاتها</th>
        <th >مجموع الساعات</th>
        <th >المادة القديمة</th>
        <th >ساعاتها</th>
        <th >مجموع الساعات</th>
        <th > العلامة</th>

    </tr>
    <tbody id="con">
    </tbody>
<td></td>
<td></td>
<td id="td2"></td>
<td></td>
<td></td>
<td id="td5"></td>
<td></td>
</table>

<br>
<span id="val"></span>
<span id="val2"></span>
<button id="yy" onclick="printData()">طباعة الجدول</button>
<br>
<br>


@endsection
