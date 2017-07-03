<?php
$border = '1px solid #333';
?>

@extends('layout.html')

@section('title', 'Dwi Prabowo')

@section('style')
<style>
    @include('cv.style')
</style>
@endsection

@section('content')
<div
    style="
        position: relative;
        margin: 0 auto;
        padding: 16px;
        /*border: 1px solid #0f0;*/
        width: 1158px;
        height: 1656px;
    "
>
    <div style="padding: 64px;">
        <div style="position: relative;">
            @include('cv.header')
        </div>
        <div style="position: relative;top: 300px;">
            @include('cv.body')
        </div>
    </div>
</div>
@endsection