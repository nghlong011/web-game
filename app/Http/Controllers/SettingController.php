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
            'description' => 'nullable|string',
            'link' => 'nullable|file|max:10240', // 10MB
        ]);

        $data = $request->except(['img_path', 'link']);

        if ($request->hasFile('img_path')) {
            // Xóa ảnh cũ
            if ($setting->img_path) {
                Storage::disk('public')->delete($setting->img_path);
            }
            // Upload ảnh mới
            $path = $request->file('img_path')->store('images', 'public');
            $data['img_path'] = $path;
        }

        if ($request->hasFile('link')) {
            // Xóa file cũ nếu có
            if ($setting->link) {
                Storage::disk('public')->delete($setting->link);
            }
            // Upload file mới
            $originalLinkName = $request->file('link')->getClientOriginalName();
            $linkPath = $request->file('link')->storeAs('files', $originalLinkName, 'public');
            $data['link'] = $linkPath;
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