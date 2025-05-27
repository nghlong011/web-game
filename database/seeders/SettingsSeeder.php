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
            'img_path' => '/images/logo.png'
        ]);

        // Slogan
        Settings::create([
            'name' => 'slogan',
            'img_path' => '/images/slogan-battle-en.png'
        ]);

        // Background
        Settings::create([
            'name' => 'background',
            'img_path' => '/images/bg-battle.webp'
        ]);

        // Left figures
        for ($i = 1; $i <= 3; $i++) {
            Settings::create([
                'name' => 'figure-left-' . $i,
                'img_path' => '/images/figure-left-' . $i . '.webp'
            ]);
        }

        // Right figures
        for ($i = 1; $i <= 3; $i++) {
            Settings::create([
                'name' => 'figure-right-' . $i,
                'img_path' => '/images/figure-right-' . $i . '.webp'
            ]);
        }

        // Boom effect
        Settings::create([
            'name' => 'boom',
            'img_path' => '/images/battle-boom.webp'
        ]);

        // Bottom background
        Settings::create([
            'name' => 'bottom',
            'img_path' => '/images/bg-bottom.webp'
        ]);

        // Download button
        Settings::create([
            'name' => 'download-button',
            'img_path' => '/images/btn-battle-en.png'
        ]);
    }
} 