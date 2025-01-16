<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    // Core Uniqの紹介ページを表示
    public function index()
    {
        return view('coreuniqIntro'); // coreuniqIntro.blade.php を表示
    }

    // Core Uniqの使い方ページを表示
    public function howToUse()
    {
        return view('howToUse'); // howToUse.blade.php を表示
    }

    // Core Uniqの体験紹介ページを表示
    public function experienceIntro()
    {
        return view('experience-intro'); // experience-intro.blade.php を表示
    }
}

