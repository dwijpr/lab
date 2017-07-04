<?php
$border = '1px solid #333';
?>

@extends('layout.html')

@section('title', 'CV - Dwi Prabowo')

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
        width: 1000px;
    "
>
    <div style="padding: 48px;">
        <div style="position: relative;">
            @include('cv.header')
        </div>
        <div style="position: relative;top: 270px;">
            @include('cv.body')
        </div>
    </div>
</div>
@endsection