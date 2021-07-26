<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="dist/dist/fullcalendar.css" />
    <link rel="stylesheet" href="dist/dist/fullcalendar.print.css" media="print"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="dist/lib/moment/moment.js"></script>
    <script src="dist/lib/moment/moment-jalaali.js"></script>
    <script src="dist/lib/jquery/dist/jquery.js"></script>
    <script src="dist/dist/fullcalendar.js"></script>
    <script src="dist/lang/fa.js"></script>

        <style>


        body ,html{
            background: url({{ URL::asset('/img/3.jpeg') }}) repeat center center fixed;
            background-size: cover;
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
        }
        h1,li,a,h3{
            color: #4b4b4b;
        }

        #calendar {
            box-shadow: inset 0 0 0 3000px rgba(255, 255, 255, 0.66),0 0 20px rgba(134, 134, 134, 0.58);
            width: 700px;
            max-width: 900px;
            margin: 40px auto;
            padding: 40px auto;
            border: 3px #9da4ff solid;
            border-radius: 5px;
        }
        #calendar h2,tr{
            color: #3954b3;
        }
        .side{
            display: block;
            margin: 20px 10px;
        }
            .side-nav{
                width: 200px;
                height: 750px;
                background-color: inherit;
                box-shadow: inset 0 0 0 3000px rgba(255, 255, 255, 0.66),0 0 20px rgba(134, 134, 134, 0.58);
                position: absolute;
                top: 0px;
                right: 0px
            }
            li{
                direction: rtl;
                position: absolute;
                right: 10px;
            }
            p{
                color: #3954b3;
                direction: rtl;
                margin-right: 15px;
                font-size: large;
            }
        hr {
            display: block;
            height: 1px;
            border: 0;
            border-top: 1px solid #ccc;
            margin: 1em 0;
            padding: 0;
        }

    </style>

</head>
<body>

<?php
        $month = jdate('now + 210 minutes')->format('%m');
            if ($month <7)
                $term ="نیمسال تحصیلی اول";
            else{
                $term ="نیمسال تحصیلی دوم";
            }
?>

<div class="side-nav">

    <p>تاریخ :</p>

    <h1>{{Morilog\Jalali\jDateTime::convertNumbers(jdate('now + 210 minutes')->format('Y-m-d'))}}</h1>


        <hr>
        <p>نوع هفته :</p>

    <?php if(isset($term)){ ?>
        <h3 style=";margin-left: 40px">{{$term}}</h3>
    <?php }
    ?>

        <hr>
        <p>بخش ها :</p>

    <a  class="btn btn-primary side" href="{{route('tasks.create')}}">افزودن یادداشت</a>
    <a  class="btn btn-primary side" href="{{route('tasks.week.create')}}">ایجاد برنامه هفتگی</a>
    <a  class="btn btn-primary side" href="{{route('tasks.period.index')}}">تعیین تاریخ شروع و پایان ترم</a>
    <a  class="btn btn-primary side" href="{{route('home')}}">خانه</a>

        <hr>
        <p>لیست کار های امروز :</p>

        <?php
        $mydate = Carbon\Carbon::now();
        $mydate = $mydate->toDateTimeString();
        $mydate = explode("-",$mydate);
        $mydate[2] = substr($mydate[2],0,2);
        $mydate = $mydate[0].$mydate[1].$mydate[2];


        if(\App\Task::where('user_id',auth()->user()->id)->get()->count() > 0){


            $events = App\task::all();

            foreach($events as $event){

                if ($event->user_id == auth()->user()->id){

                    $start = $event->start ;
                    $end = $event->end;


                    $start = explode("-",$start);
                    $start[2] = substr($start[2],0,2);
                    $start = $start[0].$start[1].$start[2];
                    $end = explode("-",$end);
                    $end[2] = substr($end[2],0,2);
                    $end = $end[0].$end[1].$end[2];

                    if ($mydate<=$end && $mydate>=$start){
                        echo "<li>".$event->title."</li>"."<br>" ;
                    }
                }
           }
        }

        ?>
</div>
<div  id="calendar"></div>
<script>
    $(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: 'next,prev today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            weekNumbers: false,
            lang: 'fa',
            isJalaali: true,
            isRTL: true,
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events : [
                    @foreach($tasks as $task)
                {
                    title : '{{ $task->title }}',
                    start : '{{ $task->start }}',
                    end : '{{ $task->end }}',
                    url : '{{ route('tasks.edit', $task->id) }}'
                },
                @endforeach
            ]
        });

    });

</script>


</body>
</html>