<!DOCTYPE html>
<html dir="rtl">

<head>
    <title>مواد</title>
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
                var z=0;


                $('.chkbx').click(function() {
                    z++;
//console.log(z);




            var selected = [];
            $.each($("input[name='courses[]']:checked"), function(){
                selected.push($(this).val());

            });
           // console.log(selected);
                    var grade=[];
                    var text = " ";
                    var op = " ";
                    var op2 = " ";
                    var opp = " ";
                    var opp2 = " ";
                    var opp3 =0 ;
                    var oppp3=0;

                    var op5=" ";
                    var op3 = " ";

                    var s = "#s";
                    var h = "#h";
                    var hhhh = "#hhhh";

                    var s2 = "#ss";
                    var h2 = "#hh";
                    var hhh2 = "#hhh";
                    var grade1 ="#grade";

                    var s3 = "s";
                    var h3 = "h";
                    var ss3 = "ss";
                    var hh3 = "hh";
                    var hhh3 = "hhh";
                    var hhhh3 = "hhhh";
                    var grade3="grade";

                    var s4 = "#s";
                    var h4 = "#h";
                    var ss4 = "#ss";
                    var hh4 = "#hh";
                    var hhh4 = "#hhh";
                    var hhhh4 = "#hhhh";
                    var  temp;
                    var  temp;
                    var ff=[];
                    var temp3;
                    var temp4;
                    var   gg= "";
                   // console.log(temp3);

                    var x = $('#pp').val();
                    var y = $('#pp2').val();
                    $('#fee').attr("placeholder", x);
                    $('#fee2').attr("placeholder", y);

                  //  console.log(z);
                    $('.chkbx:checked').each(function() {
                        text += $(this).val() + ' ';

                    });

                    var count = $("[type='checkbox']:checked").length;



                    var div = $('#con').parent();
                    count2=count+1;
                    z2=z+1;


                    for (var i = 0; i <= count2; i++) {
                        if (count == i) {

                            s3 = s3 + '' + z + '';
                            h3 = h3 + '' + z + '';
                            ss3 = ss3 + '' + z + '';
                            hh3 = hh3 + '' + z + '';
                            hhh3= hhh3 +'' + z +'';
                            hhhh3= hhhh3 +'' + z +'';
                            grade3 =grade3 +'' + z +'';


                            s4 = s4 + '' + z2 + '';
                            h4 = h4 + '' + z2 + '';
                            ss4 = ss4 + '' + z2 + '';
                            hh4 = hh4 + '' + z2 + '';
                            hhh4 =hhh4 +'' + z2 + '';
                            hhhh4 =hhhh4 + '' + z2 + '';




                            $("td").remove(s4);
                            $("td").remove(h4);
                            $("td").remove(ss4);
                            $("td").remove(hh4);
                            $("td").remove(hhh4);
                            $("td").remove(hhhh4);


                            op3 +=' <tr> <td id = "'+s3+'"> </td> <td id = "'+h3+'"> </td> <td id = "'+hhhh3+'" > </td> <td id = "'+ss3+'" > </td> <td id = "'+hh3+'" > </td> </td> <td id = "'+hhh3+'" > </td> <td id = "'+grade3+'" > </td> </tr> ' ;
                            $('#con').append(op3);



                            $.ajax({
                                type: 'get',
                                url: '{!! URL::to('findcourseName') !!}',
                                data: {
                                    'sel': 2,
                                    'selected': selected,
                                },
                                success: function(data) {
                                 //   console.log(data);
                                    if(data.length == 0)
                                    {

                                    }
                                    else{
                                    for (var l2 = 0; l2 < data.length; l2++) {
                                        var l3=l2+1;
                                    grade[l2] = prompt(" ادخل العلامة"+l3);
                                    if (grade[l2]>=60&&grade[l2]<=100){
                                        for (var l = 0; l < data.length; l++) {
                                        opp += '' + data[l].name + ' ';
                                        opp2 += '' + data[l].hours + ' ';
                                        opp3 =  opp3 + data[l].hours ;
                                        }
                                    s2 = s2 + '' + z + '';
                                    h2 = h2 + '' + z+ '';
                                    hhh2 = hhh2 + '' + z + '';
                                    grade1 =  grade1 + '' + z + '';
                                    gg=gg+ grade[l2]+' ';

                                    console.log(gg);
                                    $(s2).text(opp);
                                    $(h2).text(opp2);
                                    $(hhh2).text(opp3);
                                    $(grade1).text(grade[l2]);
                                    }else{
                                        alert("العلامة يجب ان تكون اكبر او تساوي 60 واصغر او تساوي 100");
                                    }

                                }




                                }
                                }
                               ,
                                error: function() {


                                }
                            });
                            $.ajax({

                                type: 'get',
                                url: '{!! URL::to('findcourseName') !!}',
                                data: {
                                    'sel': 1,
                                    'selected': selected,
                                },
                                success: function(data) {
                                //   console.log(data);
                                    if(data.length == 0)
                                    {
                                    alert("المواد المحددة لا تعادل اي مادة ");
                                    }
                                    else{
                                        //console.log(grade);
                                        for (var l2 = 0; l2 < data.length; l2++) {
                                        if (grade[l2] >= 60 && grade[l2]<=100){
                                    for (var j = 0; j < data.length; j++) {
                                        op += '' + data[j].name+ ' ';
                                        op2 += '' + data[j].hours + ' ';
                                        oppp3 =  oppp3 + data[j].hours ;
                                    }
                                    s = s + '' + z+ '';
                                    h = h + '' + z + '';
                                    hhhh = hhhh + '' + z + '';

                                    $(s).text(op);
                                    $(h).text(op2);
                                    $(hhhh).text(oppp3);
                                    }
                                    }

                                    }

                                }
                            ,
                                error: function() {

                                }
                            });

                        }

                    }
                });

            });
        </script>

<script type="text/javascript">
    function calho() {

   var table = document.getElementById("table-1"), sumVal = 0,sumVal2 = 0;
   console.log(table.rows.length);
   for(var i = 2; i < table.rows.length ; i++)
   {
       try {
           temp1 = Number(table.rows[i].cells[2].innerHTML,10);
           temp2 = Number(table.rows[i].cells[5].innerHTML,10);
           if( typeof(temp1)==='number' ){
               sumVal = sumVal + temp1;
           }

           if( typeof(temp2)==='number' ){
               sumVal2 = sumVal2 + temp2;
           }

       } catch (error) {}
   }
   console.log(sumVal);
   console.log(sumVal2);

   document.getElementById("td2").innerHTML = sumVal;
   document.getElementById("td5").innerHTML =  sumVal2;
   //console.log(sumVal);
   //console.log(sumVal2);
   }
       </script>


<script type="text/javascript">
    function printData() {
        var divToPrint = document.getElementById("table-1");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }

    $('button.yy').on('click', function() {
        printData();
    })
</script>



</body>


</html>
