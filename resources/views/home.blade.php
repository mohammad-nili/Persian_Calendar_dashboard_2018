@extends('layouts.app')
<style>
    div.sd{
        background: inherit;
        box-shadow: inset 0 0 0 3000px rgba(255, 255, 255, 0.66),0 0 20px rgba(134, 134, 134, 0.58);
        border: 3px #9da4ff solid;
    }
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default sd">
                <div class="panel-heading" style="direction: rtl">پیشخوان</div>

                <div class="panel-body" style="direction: rtl">
                    @if (session('status'))
                        <script>
                            window.alert({{ session('status') }})
                        </script>
                    @endif

                    <p style="color: #304996;font-size: large">شما وارد شده اید!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
