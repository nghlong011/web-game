@extends('layouts.app')

@section('content')
    <div class="wrap page-wrap parallax">
        <div class="banner ">
            <div class="logo flex justify-center items-center">
                <img src="{{ asset('storage/' . $logo->img_path) }}" alt="logo">
            </div>

            <div class="slogan flex justify-center items-center">
                <img src="{{ asset('storage/' . $slogan->img_path) }}" alt="slogan">
            </div>
        </div>

        <div id="scene"
            style="
            background-image: url({{ asset('storage/' . $settings->where('name', 'background')->first()?->img_path ?? '/images/bg-battle.webp') }});
        ">
            <div class="figures">
                <div class="figures-day" id="scene-left"
                    style="transform: translate(0px, 0px); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                    @foreach ($leftFigures as $figure)
                        <div data-depth="{{ $loop->iteration * 0.3 }}" class="figures-part figures-part-left"
                            style="transform: translate3d(0px, 0px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: {{ $loop->first ? 'relative' : 'absolute' }}; display: block; left: 0px; top: 0px; z-index: {{ 10 - $loop->iteration }};">
                            <img src="{{ asset('storage/' . $figure->img_path) }}" alt="">
                        </div>
                    @endforeach
                </div>
                <div class="figures-night" id="scene-right"
                    style="transform: translate(0px, 0px); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                    @foreach ($rightFigures as $figure)
                        <div data-depth="{{ $loop->iteration * 0.3 }}" class="figures-part figures-part-right"
                            style="transform: translate3d(0px, 0px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: {{ $loop->first ? 'relative' : 'absolute' }}; display: block; left: 0px; top: 0px; z-index: {{ 10 - $loop->iteration }};">
                            <img src="{{ asset('storage/' . $figure->img_path) }}" alt="">
                        </div>
                    @endforeach
                </div>
                <div class="figures-boom" style="transform: scale(3, 3); opacity: 0;">
                    <img src="{{ asset('storage/' . $boom->img_path) }}" alt="boom">
                </div>
                <div class="figures-bottom" style="position: absolute; bottom: 0">
                    <img src="{{ asset('storage/' . $bottom->img_path) }}" alt="">
                </div>
            </div>
        </div>

        <a class="btn bonus" href="{{ asset('storage/' . $downloadBtn->link) }}" id="download-btn">
            <img class="breathe" src="{{ asset('storage/' . $downloadBtn->img_path) }}" alt="download">
        </a>
        <footer>
            <div class="copyright">© FUNPLUS INTERNATIONAL AG - ALL RIGHTS RESERVED <a
                    href="https://funplus.com/privacy-policy/" target="_blank" style="color:#ddb463">Privacy Policy</a> and
                <a href="https://funplus.com/terms-conditions/" target="_blank" style="color:#ddb463">Terms and
                    Conditions</a>
            </div>
        </footer>
    </div>
@endsection
