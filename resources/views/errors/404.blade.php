@extends('errors::layout')

<style>
    body,html{
        background: url({{ URL::asset('/img/3.jpeg') }}) repeat center center fixed;
        background-size: cover;
        height: 100%;
        width: 100%;
        margin: 0;
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
    }
    *{
        color: #fffaa6;
    }
</style>

@section('title', 'Error')

@section('message', 'صفحه ی مورد نظر یافت نشد')