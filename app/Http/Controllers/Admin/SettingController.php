<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Show the form for editing the settings.
     */
    public function edit()
    {
        $settings = [
            'site_name' => Setting::get('site_name'),
            'site_tagline' => Setting::get('site_tagline'),
            'hero_title' => Setting::get('hero_title'),
            'hero_subtitle' => Setting::get('hero_subtitle'),
            'hero_video_url' => Setting::get('hero_video_url'),
            'featured_video_url' => Setting::get('featured_video_url'),
            'featured_video_title' => Setting::get('featured_video_title'),
            'featured_video_subtitle' => Setting::get('featured_video_subtitle'),
            'contact_whatsapp' => Setting::get('contact_whatsapp'),
            'contact_phone' => Setting::get('contact_phone'),
            'contact_email' => Setting::get('contact_email'),
            'contact_address' => Setting::get('contact_address'),
            'contact_map_iframe' => Setting::get('contact_map_iframe'),
            'legal_nib' => Setting::get('legal_nib'),
            'legal_siujk' => Setting::get('legal_siujk'),
            'company_established_year' => Setting::get('company_established_year', '2018'),
            'company_about_us_title' => Setting::get('company_about_us_title'),
            'company_about_us_text' => Setting::get('company_about_us_text'),
            'workflow_step1_img' => Setting::get('workflow_step1_img'),
            'workflow_step2_img' => Setting::get('workflow_step2_img'),
            'workflow_step3_img' => Setting::get('workflow_step3_img'),
            'workflow_step4_img' => Setting::get('workflow_step4_img'),
            'workflow_step5_img' => Setting::get('workflow_step5_img'),
        ];

        return view('admin.settings', compact('settings'));
    }

    /**
     * Update the settings in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_tagline' => 'required|string|max:255',
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'required|string',
            'hero_video_url' => 'nullable|url',
            'featured_video_url' => 'nullable|url',
            'featured_video_title' => 'required|string|max:255',
            'featured_video_subtitle' => 'nullable|string',
            'contact_whatsapp' => 'required|string|max:20',
            'contact_phone' => 'required|string|max:20',
            'contact_email' => 'required|email|max:255',
            'contact_address' => 'required|string',
            'contact_map_iframe' => 'required|string',
            'legal_nib' => 'required|string|max:50',
            'legal_siujk' => 'required|string|max:50',
            'company_established_year' => 'required|integer|min:1900|max:2100',
            'company_about_us_title' => 'required|string|max:255',
            'company_about_us_text' => 'required|string',
            'workflow_step1_url' => 'nullable|url',
            'workflow_step2_url' => 'nullable|url',
            'workflow_step3_url' => 'nullable|url',
            'workflow_step4_url' => 'nullable|url',
            'workflow_step5_url' => 'nullable|url',
            'workflow_step1_file' => 'nullable|image|max:4096',
            'workflow_step2_file' => 'nullable|image|max:4096',
            'workflow_step3_file' => 'nullable|image|max:4096',
            'workflow_step4_file' => 'nullable|image|max:4096',
            'workflow_step5_file' => 'nullable|image|max:4096',
        ]);

        $textSettings = [
            'site_name', 'site_tagline', 'hero_title', 'hero_subtitle', 'hero_video_url',
            'featured_video_url', 'featured_video_title', 'featured_video_subtitle',
            'contact_whatsapp', 'contact_phone', 'contact_email', 'contact_address', 'contact_map_iframe',
            'legal_nib', 'legal_siujk', 'company_established_year', 'company_about_us_title',
            'company_about_us_text'
        ];

        foreach ($textSettings as $key) {
            Setting::set($key, $request->input($key));
        }

        // Handle workflow images
        for ($i = 1; $i <= 5; $i++) {
            $urlKey = "workflow_step{$i}_url";
            $fileKey = "workflow_step{$i}_file";
            $dbKey = "workflow_step{$i}_img";

            if ($request->hasFile($fileKey)) {
                // Delete old file if it was locally uploaded
                $oldUrl = Setting::get($dbKey);
                if ($oldUrl && str_contains($oldUrl, '/storage/settings/')) {
                    $oldPath = str_replace('/storage/', '', $oldUrl);
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($oldPath);
                }

                $path = $request->file($fileKey)->store('settings', 'public');
                Setting::set($dbKey, \Illuminate\Support\Facades\Storage::url($path));
            } elseif ($request->input($urlKey)) {
                Setting::set($dbKey, $request->input($urlKey));
            }
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Pengaturan website berhasil diperbarui.');
    }
}
