<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'img_path' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'nullable|string'
        ]);

        if ($request->hasFile('img_path')) {
            $path = $request->file('img_path')->store('images', 'public');
            $request->merge(['img_path' => $path]);
        }

        Setting::create($request->all());

        return redirect()->route('settings.index')
            ->with('success', 'Setting created successfully.');
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'nullable|string'
        ]);

        if ($request->hasFile('img_path')) {
            // Xóa ảnh cũ
            if ($setting->img_path) {
                Storage::disk('public')->delete($setting->img_path);
            }
            
            // Upload ảnh mới
            $path = $request->file('img_path')->store('images', 'public');
            $request->merge(['img_path' => $path]);
        }

        $setting->update($request->all());

        return redirect()->route('settings.index')
            ->with('success', 'Setting updated successfully');
    }

    public function destroy(Setting $setting)
    {
        // Xóa ảnh khi xóa setting
        if ($setting->img_path) {
            Storage::disk('public')->delete($setting->img_path);
        }

        $setting->delete();

        return redirect()->route('settings.index')
            ->with('success', 'Setting deleted successfully');
    }
} 