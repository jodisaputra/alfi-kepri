<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Page::with(['template'])->where('slug', $slug)->firstOrFail();
        $templatePath = $page->template->path;
        return view($templatePath, compact('page'));
    }
}
