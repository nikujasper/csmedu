@extends('layout.default')
@section("myblock")

<!-- <p class="text-primary"> Welcome to our website.</p> -->

<!-- blade code -->
<!-- {{$sms="This is blade Code"}}
<p>{{$sms}}</p> -->


<!-- normal text -->
<!-- <p>This is normal Text</p> -->


<!-- php code -->
<?php
// $sms = " This is PHP code";
// echo "<p>$sms</p>"
?>
<style>
    .carousel-item {
        height: 65vh;
        min-height: 350px;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" style="background-image: url('https://source.unsplash.com/RCAhiGJsUUE/1920x1080')">
            <div class="carousel-caption">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item" style="background-image: url('https://source.unsplash.com/wfh8dDlNFOk/1920x1080')">
            <div class="carousel-caption">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>
        <div class="carousel-item" style="background-image: url('https://source.unsplash.com/lHGeqh3XhRY/1920x1080')">
            <div class="carousel-caption">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Page Content -->
<section class="py-5">
    <div class="container">
        <h1 class="fw-light">Half Page Image Slider</h1>
        <p class="lead">The background images for the slider are set directly in the HTML using inline CSS. The images
            in this snippet are from <a href="https://unsplash.com">Unsplash</a>!</p>
    </div>
</section>
@stop