<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-datepicker.min.css">
    <script src="/dist/lib/jquery/dist/jquery.js"></script>
    <script src="/dist/lib/moment/moment.js"></script>
    <script src="/dist/lib/moment/moment-jalaali.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <!-- <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script> -->
    <script type="text/javascript" src="/js/bootstrap-persian-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" />
    <title>Document</title>
    <style>
        body ,html{
            background: url({{ URL::asset('/img/3.jpeg') }}) repeat center center fixed;
            background-size: cover;
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
        }
        div.sd{
            background: inherit;
            box-shadow: inset 0 0 0 3000px rgba(255, 255, 255, 0.66),0 0 20px rgba(134, 134, 134, 0.58);
            border: 3px #9da4ff solid;
        }
        .mylabel{
            font-size:large;
            color: darkcyan;
            direction: rtl;
        }
        .form{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container sd" style="margin-top: 50px">
<form style="text-align: center;height: 150px;width: 1000px;margin-top:50px;margin-left: 70px;" action="{{ route('create_week') }}" method="post">
    {{ csrf_field() }}
    <fieldset>
        <legend class="mylabel" style="direction: rtl;width: 1000px;text-align: center">ایجاد برنامه هفتگی:</legend>
    <select class="form" name="day" id="">
        <option value="0">شنبه</option>
        <option value="1">یکشنبه</option>
        <option value="2">دوشنبه</option>
        <option value="3">سه شنبه</option>
        <option value="4">چهار شنبه</option>
    </select>
    <select class="form" name="time" id="">
        <option value="8-10">8-10</option>
        <option value="10-12">10-12</option>
        <option value="13-15">13-15</option>
        <option value="15-17">15-17</option>
        <option value="17-19">17-19</option>
    </select>
    <select class="form" name="OE" id="">
        <option value="0">هردو</option>
        <option value="1">زوج</option>
        <option value="2">فرد</option>
    </select>
    <input class="form" type="text" name="title" placeholder="متن یادداشت را وارد کنید">
    <input class="form btn btn-success" type="submit" value="ذخیره">
    </fieldset>
</form>
</div>
</body>
</html>