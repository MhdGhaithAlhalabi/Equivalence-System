<!DOCTYPE html>
<html dir="rtl">
<head>
    <title>موقع التعادل الالكتروني</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    @yield('content')




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('change', '.olduniversities', function() {
                //console.log("hmm its change");

                var Olduniversity_id = $(this).val();
                // console.log(Olduniversity_id);
                var div = $(this).parent();

                var op = " ";

                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('findolduniversityName') !!}',
                    data: {
                        'id': Olduniversity_id
                    },
                    success: function(data) {
                        //	console.log('success');

                        //console.log(data);

                        //	console.log(data.length);

                        op += '<option value="0" selected disabled>اختر الكلية</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].name +
                                '</option>';
                        }

                        div.find('.collages').html(" ");
                        div.find('.collages').append(op);
                    },
                    error: function() {

                    }
                });
            });


            $(document).on('change', '.collages', function() {
                //console.log("hmm its change");

                var collage_id = $(this).val();
                // console.log(Olduniversity_id);
                var div = $(this).parent();

                var op = " ";

                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('findcollageName') !!}',
                    data: {
                        'id': collage_id
                    },
                    success: function(data) {

                        op += '<option value="0" selected disabled>اختر الاختصاص</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].name +
                                '</option>';
                        }

                        div.find('.specials').html(" ");
                        div.find('.specials').append(op);
                    },
                    error: function() {

                    }
                });

            });

        });
    </script>
    <script type="text/javascript">

        $(document).ready(function() {

            $(document).on('change', '.olduniversities', function() {


                var Olduniversity_id = $(this).val();

                var div = $(this).parent();

                var op = " ";


                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('findOlduniversityId') !!}',
                    data: {
                        'id': Olduniversity_id
                    },
                    success: function(data) {
                        //	console.log('success');

                        // console.log(data);
                        // console.log(div);
                        //	console.log(data.length);
                        op += '<input type="text" value="' + data +
                            '" name="olduniversity_id" style="visibility: hidden" >';

                      //  op2 += '<input type="text" value="' + data + '" name="collage_id" >';
                      //  op3 += '<input type="text" value="' + data + '" name="speciale_id" >';
                        // op+=  ' <a class="btn btn-primary btn-lg" href="{{ route('collages.create') }}" role="button">اضافة كلية </a>';

                        div.find('.oo').html(" ");
                        div.find('.oo').append(op);

                        $( "form" ).find('.oo2').html(" ");
                        $( "form" ).find('.oo2').append(op);
                    },
                    error: function() {

                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('change', '.collages', function() {


                var collage_id = $(this).val();

                var div = $(this).parent();

                var op = " ";

                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('findCollageId') !!}',
                    data: {
                        'id': collage_id
                    },
                    success: function(data) {

                        op += '<input type="text" value="' + data + '" name="collage_id" style="visibility: hidden">';


                        div.find('.cc').html(" ");
                        div.find('.cc').append(op);

                        $( "form" ).find('.ccc').html(" ");
                        $( "form" ).find('.ccc').append(op);
                    },
                    error: function() {

                    }
                });
            });
        });
    </script>
 <script type="text/javascript">
    $(document).ready(function() {

        $(document).on('change', '.specials', function() {


            var special_id = $(this).val();

            var div = $(this).parent();

            var op = " ";

            $.ajax({
                type: 'get',
                url: '{!! URL::to('findspecialId') !!}',
                data: {
                    'id': special_id
                },
                success: function(data) {

                    op += '<input type="text" value="' + data + '" name="special_id" style="visibility: hidden">';


                    div.find('.ss').html(" ");
                    div.find('.ss').append(op);

                },
                error: function() {

                }
            });
        });
    });
</script>
</body>

</html>
