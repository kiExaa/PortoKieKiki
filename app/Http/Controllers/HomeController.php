<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Certificate;
use App\Models\Document;
use App\Models\SocialLink;
use App\Models\Setting;

class HomeController
{
    public function index()
    {
        $profile = Profile::first();
        $educations = Education::orderBy('start_year')->get();
        $experiences = Experience::orderBy('start_date')->get();
        $skills = Skill::orderBy('category')->orderBy('sort_order')->get()->groupBy('category');
        $projects = Project::where('status', 'published')->orderBy('sort_order')->get();
        $certificates = Certificate::orderBy('sort_order')->get();
        $documents = Document::all();
        $socialLinks = SocialLink::orderBy('sort_order')->get();
        $spotifyUrl = Setting::where('key', 'spotify_playlist_url')->value('value');

        return view('public.home', compact(
            'profile', 'educations', 'experiences', 'skills', 'projects',
            'certificates', 'documents', 'socialLinks', 'spotifyUrl'
        ));
    }
}
