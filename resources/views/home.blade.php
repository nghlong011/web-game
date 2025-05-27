@extends('layouts.app')

@section('content')
<div class="relative min-h-screen flex flex-col justify-between items-center overflow-hidden" style="background: url('/images/bg-battle.webp') center center/cover no-repeat;">
    <!-- Logo -->
    <div class="w-full flex justify-center pt-8">
        <img src="/images/logo.png" alt="Logo" class="h-20 md:h-28 drop-shadow-lg">
    </div>

    <!-- Main Content -->
    <div class="flex-1 w-full flex flex-col md:flex-row items-center justify-center relative z-10">
        <!-- Left Figures -->
        <div class="hidden md:flex flex-col justify-end items-end flex-1 h-full">
            <img src="/images/figure-left.png" alt="Left Characters" class="max-h-[500px] object-contain drop-shadow-2xl">
        </div>
        <!-- Center Slogan & Button -->
        <div class="flex flex-col items-center justify-center text-center px-4">
            <h1 class="text-white text-3xl md:text-5xl font-bold drop-shadow-lg mb-4">THE DIRGE IS TOLLED<br>THE PATHS UNFOLD</h1>
            <button class="mt-6 focus:outline-none">
                <img src="/images/btn-battle-en.png" alt="Get Ready For Battle" class="h-16 md:h-20 hover:scale-105 transition-transform">
            </button>
            <div class="flex justify-center gap-4 mt-4">
                <img src="/images/windows.png" alt="Windows" class="h-8">
                <img src="/images/apple.png" alt="Apple" class="h-8">
            </div>
        </div>
        <!-- Right Figures -->
        <div class="hidden md:flex flex-col justify-end items-start flex-1 h-full">
            <img src="/images/figure-right.png" alt="Right Characters" class="max-h-[500px] object-contain drop-shadow-2xl">
        </div>
    </div>

    <!-- Bottom Background Overlay -->
    <div class="absolute bottom-0 left-0 w-full z-20 pointer-events-none">
        <img src="/images/bg-bottom.webp" alt="Bottom Background" class="w-full object-cover">
    </div>

    <!-- Footer -->
    <footer class="w-full text-center text-xs text-white bg-black bg-opacity-60 py-2 z-30 relative">
        © FUNPLUS INTERNATIONAL AG - ALL RIGHTS RESERVED
        <a href="#" class="underline ml-2">Privacy Policy</a> and <a href="#" class="underline">Terms and Conditions</a>
    </footer>
</div>
@endsection 