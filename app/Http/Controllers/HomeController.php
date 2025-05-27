<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Settings::all();
        $logo = $settings->where('name', 'logo')->first();
        $slogan = $settings->where('name', 'slogan')->first();
        $background = $settings->where('name', 'background')->first();
        $leftFigures = $settings->filter(function($item) {
            return Str::startsWith($item->name, 'figure-left-');
        });
        $rightFigures = $settings->filter(function($item) {
            return Str::startsWith($item->name, 'figure-right-');
        });
        $bottom = $settings->where('name', 'bottom')->first();
        $boom = $settings->where('name', 'boom')->first();
        $downloadBtn = $settings->where('name', 'download-button')->first();
        return view('home', compact('settings', 'logo', 'slogan', 'background', 'leftFigures', 'rightFigures', 'bottom', 'boom', 'downloadBtn'));
    }
} 