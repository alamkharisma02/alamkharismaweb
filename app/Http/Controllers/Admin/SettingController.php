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
            
            // Workflow images & URLs
            'workflow_step1_img' => Setting::get('workflow_step1_img'),
            'workflow_step2_img' => Setting::get('workflow_step2_img'),
            'workflow_step3_img' => Setting::get('workflow_step3_img'),
            'workflow_step4_img' => Setting::get('workflow_step4_img'),
            'workflow_step5_img' => Setting::get('workflow_step5_img'),
            'workflow_step1_url' => Setting::get('workflow_step1_url'),
            'workflow_step2_url' => Setting::get('workflow_step2_url'),
            'workflow_step3_url' => Setting::get('workflow_step3_url'),
            'workflow_step4_url' => Setting::get('workflow_step4_url'),
            'workflow_step5_url' => Setting::get('workflow_step5_url'),

            // Social Media
            'social_facebook' => Setting::get('social_facebook', 'https://facebook.com'),
            'social_instagram' => Setting::get('social_instagram', 'https://instagram.com'),
            'social_twitter' => Setting::get('social_twitter', 'https://twitter.com'),
            'social_tiktok' => Setting::get('social_tiktok', 'https://tiktok.com'),
            'social_youtube' => Setting::get('social_youtube', 'https://youtube.com'),

            // Banner images & URLs
            'banner_profile_img' => Setting::get('banner_profile_img'),
            'banner_profile_url' => Setting::get('banner_profile_url'),
            'banner_services_img' => Setting::get('banner_services_img'),
            'banner_services_url' => Setting::get('banner_services_url'),
            'banner_projects_img' => Setting::get('banner_projects_img'),
            'banner_projects_url' => Setting::get('banner_projects_url'),
            'banner_gallery_img' => Setting::get('banner_gallery_img'),
            'banner_gallery_url' => Setting::get('banner_gallery_url'),
            'banner_video_gallery_img' => Setting::get('banner_video_gallery_img'),
            'banner_video_gallery_url' => Setting::get('banner_video_gallery_url'),
            'banner_testimonials_img' => Setting::get('banner_testimonials_img'),
            'banner_testimonials_url' => Setting::get('banner_testimonials_url'),
            'banner_articles_img' => Setting::get('banner_articles_img'),
            'banner_articles_url' => Setting::get('banner_articles_url'),
            'banner_contact_img' => Setting::get('banner_contact_img'),
            'banner_contact_url' => Setting::get('banner_contact_url'),
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
            
            // Workflow inputs
            'workflow_step1_url' => 'nullable|url',
            'workflow_step2_url' => 'nullable|url',
            'workflow_step3_url' => 'nullable|url',
            'workflow_step4_url' => 'nullable|url',
            'workflow_step5_url' => 'nullable|url',
            'workflow_step1_file' => 'nullable|image|max:4096',
            'workflow_step2_file' => 'nullable|image|max:4096',
            'workflow_step3_file' => 'nullable|image|image|max:4096',
            'workflow_step4_file' => 'nullable|image|max:4096',
            'workflow_step5_file' => 'nullable|image|max:4096',

            // Social Media
            'social_facebook' => 'nullable|url',
            'social_instagram' => 'nullable|url',
            'social_twitter' => 'nullable|url',
            'social_tiktok' => 'nullable|url',
            'social_youtube' => 'nullable|url',

            // Page banners inputs
            'banner_profile_url' => 'nullable|url',
            'banner_profile_file' => 'nullable|image|max:4096',
            'banner_services_url' => 'nullable|url',
            'banner_services_file' => 'nullable|image|max:4096',
            'banner_projects_url' => 'nullable|url',
            'banner_projects_file' => 'nullable|image|max:4096',
            'banner_gallery_url' => 'nullable|url',
            'banner_gallery_file' => 'nullable|image|max:4096',
            'banner_video_gallery_url' => 'nullable|url',
            'banner_video_gallery_file' => 'nullable|image|max:4096',
            'banner_testimonials_url' => 'nullable|url',
            'banner_testimonials_file' => 'nullable|image|max:4096',
            'banner_articles_url' => 'nullable|url',
            'banner_articles_file' => 'nullable|image|max:4096',
            'banner_contact_url' => 'nullable|url',
            'banner_contact_file' => 'nullable|image|max:4096',
        ]);

        $textSettings = [
            'site_name', 'site_tagline', 'hero_title', 'hero_subtitle', 'hero_video_url',
            'featured_video_url', 'featured_video_title', 'featured_video_subtitle',
            'contact_whatsapp', 'contact_phone', 'contact_email', 'contact_address', 'contact_map_iframe',
            'legal_nib', 'legal_siujk', 'company_established_year', 'company_about_us_title',
            'company_about_us_text',
            
            // Social Media
            'social_facebook', 'social_instagram', 'social_twitter', 'social_tiktok', 'social_youtube'
        ];

        foreach ($textSettings as $key) {
            Setting::set($key, $request->input($key));
        }

        // Handle workflow images and their URL fields
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
                Setting::set($dbKey, '/storage/' . $path);
                Setting::set($urlKey, ''); // Clear input URL when file is uploaded
            } else {
                // Save URL in db if set
                $urlVal = $request->input($urlKey);
                Setting::set($urlKey, $urlVal);
                if ($urlVal) {
                    Setting::set($dbKey, $urlVal);
                }
            }
        }

        // Handle page banner images and their URL fields
        $bannerPages = ['profile', 'services', 'projects', 'gallery', 'video_gallery', 'testimonials', 'articles', 'contact'];
        foreach ($bannerPages as $page) {
            $urlKey = "banner_{$page}_url";
            $fileKey = "banner_{$page}_file";
            $dbKey = "banner_{$page}_img";

            if ($request->hasFile($fileKey)) {
                // Delete old file if it was locally uploaded
                $oldUrl = Setting::get($dbKey);
                if ($oldUrl && str_contains($oldUrl, '/storage/settings/')) {
                    $oldPath = str_replace('/storage/', '', $oldUrl);
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($oldPath);
                }

                $path = $request->file($fileKey)->store('settings', 'public');
                Setting::set($dbKey, '/storage/' . $path);
                Setting::set($urlKey, ''); // Clear input URL when file is uploaded
            } else {
                // Save URL in db if set
                $urlVal = $request->input($urlKey);
                Setting::set($urlKey, $urlVal);
                if ($urlVal) {
                    Setting::set($dbKey, $urlVal);
                }
            }
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Pengaturan website berhasil diperbarui.');
    }
}
