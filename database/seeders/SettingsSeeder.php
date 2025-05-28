<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Logo
        Settings::create([
            'name' => 'logo',
            'img_path' => 'images/logo.png',
            'link' => ''
        ]);

        // Slogan
        Settings::create([
            'name' => 'slogan',
            'img_path' => 'images/slogan-battle-en.png',
            'link' => ''
        ]);

        // Background
        Settings::create([
            'name' => 'background',
            'img_path' => 'images/bg-battle.webp',
            'link' => ''
        ]);

        // Left figures
        for ($i = 1; $i <= 3; $i++) {
            Settings::create([
                'name' => 'figure-left-' . $i,
                'img_path' => 'images/figure-left-' . $i . '.webp',
                'link' => ''
            ]);
        }

        // Right figures
        for ($i = 1; $i <= 3; $i++) {
            Settings::create([
                'name' => 'figure-right-' . $i,
                'img_path' => 'images/figure-right-' . $i . '.webp',
                'link' => ''
            ]);
        }

        // Boom effect
        Settings::create([
            'name' => 'boom',
            'img_path' => 'images/battle-boom.webp',
            'link' => ''
        ]);

        // Bottom background
        Settings::create([
            'name' => 'bottom',
            'img_path' => 'images/bg-bottom.webp',
            'link' => ''
        ]);

        // Download button
        Settings::create([
            'name' => 'download-button',
            'img_path' => 'images/btn-battle-en.png',
            'link' => 'https://www.google.com'
        ]);
    }
} 