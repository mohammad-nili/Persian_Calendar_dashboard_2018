<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
</head>
<style>
    body ,html{
        background: url({{ URL::asset('/img/3.jpeg') }}) repeat center center fixed;
        background-size: cover;
        height: 100%;
        width: 100%;
        margin: 0;
        padding: 0;
        direction: rtl;
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
</style>
<body>
<div class="sd" style="margin: 50px  100px 0 200px;">
    <form action="{{ route('tasks.update',$task->id) }}" method="post">
        <fieldset>
            <legend style="direction: rtl;width: 500px;text-align: center" class="mylabel">???????????? ?????????????? :</legend>
    <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}
        <div class="container">
        <div class="row">
		<div class='col-sm-3'></div>
        <div class='col-sm-6'>
        <label for="title" class="mylabel">?????? ??????????????:</label>
        <input class="input-medium" type="text" name="title" value="{{$task->title}}"/>
            <div class="form-group">
                <div class='input-group' id='start'>
                    <label for="start" class="mylabel">?????????? ???????? ??????????????:</label>
                    <input type='text' class="form-control" name="start" value="{{toJalaali($task->start)}}" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <div class='input-group' id='end'>
                    <label for="end" class="mylabel">?????????? ?????????? ??????????????:</label>
                    <input type='text' class="form-control" name="end" value="{{toJalaali($task->end)}}"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

            <input class="btn btn-success" type="submit" value="??????????" />
            <a class="btn btn-danger" href="{{route('tasks.delete',$task->id)}}">?????? ??????????????</a>
        </div>
		<div class='col-sm-3'></div>
        </div>
        </div>
        </fieldset>
</form>
</div>

    <script type="text/javascript">
	    //you should use pdate for persian calendar
	    window.ODate = Date;
	    window.Date = pDate;
            //then call datetimepicker init
	    $(function () {
            $('#start').datetimepicker({
                locale:'fa',
                toolbarPlacement : 'top'
		    });
            $('#end').datetimepicker({
                locale:'fa',
                toolbarPlacement : 'top'
		    });
        });
    </script>
    <!-- <script src="/dist/lib/jquery/dist/jquery.js"></script>
    <script src="/js/bootstrap-datepicker.min.js"></script>
    <script src="/js/bootstrap-datepicker.fa.min.js"></script>
<script>
     $("#start").datepicker();
     $("#end").datepicker();
</script> -->

</body>
</html>