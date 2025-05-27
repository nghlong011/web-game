@extends('layouts.app')

@section('content')
<div class="wrap page-wrap parallax">
    <div class="banner ">
        <div class="logo flex justify-center items-center">
            @php
                $logo = $settings->where('name', 'logo')->first();
            @endphp
            <img src="{{ $logo ? $logo->img_path : '/images/logo.png' }}" alt="logo">
        </div>

        <div class="slogan flex justify-center items-center">
            @php
                $slogan = $settings->where('name', 'slogan')->first();
            @endphp
            <img src="{{ $slogan ? $slogan->img_path : '/images/slogan-battle-en.png' }}" alt="slogan">
        </div>
    </div>

    <div id="scene" style="
            background-image: url({{ $settings->where('name', 'background')->first()?->img_path ?? '/images/bg-battle.webp' }});
        ">
        <div class="figures">
            <div class="figures-day" id="scene-left" style="transform: translate(0px, 0px); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                @php
                    $leftFigures = $settings->where('name', 'like', 'figure-left-%');
                @endphp
                @foreach($leftFigures as $figure)
                <div data-depth="{{ $loop->iteration * 0.3 }}" class="figures-part figures-part-left" style="transform: translate3d(0px, 0px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: {{ $loop->first ? 'relative' : 'absolute' }}; display: block; left: 0px; top: 0px;">
                    <img src="{{ $figure->img_path }}" alt="">
                </div>
                @endforeach
            </div>
            <div class="figures-night" id="scene-right" style="transform: translate(0px, 0px); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                @php
                    $rightFigures = $settings->where('name', 'like', 'figure-right-%');
                @endphp
                @foreach($rightFigures as $figure)
                <div data-depth="{{ $loop->iteration * 0.3 }}" class="figures-part figures-part-right" style="transform: translate3d(0px, 0px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: {{ $loop->first ? 'relative' : 'absolute' }}; display: block; left: 0px; top: 0px;">
                    <img src="{{ $figure->img_path }}" alt="">
                </div>
                @endforeach
            </div>
            <div class="figures-boom" style="transform: scale(3, 3); opacity: 0;">
                @php
                    $boom = $settings->where('name', 'boom')->first();
                @endphp
                <img src="{{ $boom ? $boom->img_path : '/images/battle-boom.webp' }}" alt="boom">
            </div>
            <div class="figures-bottom" style="position: absolute; bottom: 0">
                @php
                    $bottom = $settings->where('name', 'bottom')->first();
                @endphp
                <img src="{{ $bottom ? $bottom->img_path : '/images/bg-bottom.webp' }}" alt="">
            </div>
        </div>
    </div>

    <a class="btn bonus" href="javascript:void(0);" id="download-btn">
        @php
            $downloadBtn = $settings->where('name', 'download-button')->first();
        @endphp
        <img class="breathe" src="{{ $downloadBtn ? $downloadBtn->img_path : '/images/btn-battle-en.png' }}" alt="download">
    </a>
<footer><div class="copyright">© FUNPLUS INTERNATIONAL AG - ALL RIGHTS RESERVED <a href="https://funplus.com/privacy-policy/" target="_blank" style="color:#ddb463">Privacy Policy</a> and <a href="https://funplus.com/terms-conditions/" target="_blank" style="color:#ddb463">Terms and Conditions</a></div></footer></div>
@endsection 