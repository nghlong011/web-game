<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Settings::all();
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

        Settings::create($request->all());

        return redirect()->route('admin.settings.index')
            ->with('success', 'Setting created successfully.');
    }

    public function edit(Settings $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, Settings $setting)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'nullable|string'
        ]);

        $data = $request->except('img_path');

        if ($request->hasFile('img_path')) {
            // Xóa ảnh cũ
            if ($setting->img_path) {
                Storage::disk('public')->delete($setting->img_path);
            }
            
            // Upload ảnh mới
            $path = $request->file('img_path')->store('images', 'public');
            $data['img_path'] = $path;
        }

        $setting->update($data);

        return redirect()->route('admin.settings.index')
            ->with('success', 'Setting updated successfully');
    }

    public function destroy(Settings $setting)
    {
        // Xóa ảnh khi xóa setting
        if ($setting->img_path) {
            Storage::disk('public')->delete($setting->img_path);
        }

        $setting->delete();

        return redirect()->route('admin.settings.index')
            ->with('success', 'Setting deleted successfully');
    }
} 