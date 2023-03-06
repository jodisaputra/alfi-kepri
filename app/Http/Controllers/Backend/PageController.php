<?php

namespace App\Http\Controllers\Backend;

use App\Models\Page;
use App\Models\TemplatePage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('pages.admin.page.index', [
            'pages' => $pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $templatePages = TemplatePage::all();
        return view('pages.admin.page.form', [
            'action' => route('pages.store'),
            'title' => old('title'),
            'slug' => old('slug'),
            'content' => old('content'),
            'template' => old('template'),
            'templatePages' => $templatePages,
            'type' => 'add'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'slug' => ['required'],
            'content' => ['required'],
            'image' => ['required', 'mimes:jpg,jpeg,png'],
            'template' => ['required'],
        ]);

        if ($request->hasFile('image')) {
            $pageValue = $request->image;
            $filename = time() . date('Y-m-d') . '.' . $pageValue->getClientOriginalExtension();
            $request->image->storeAs('page', $filename, 'public');
        }
        Page::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'image' => $filename,
            'template_id' => $request->template,
        ]);
        Alert::toast('Page added Successfully', 'success');
        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $templatePages = TemplatePage::all();
        $page = Page::find($id);
        return view('pages.admin.page.form', [
            'action' => route('pages.update', $page->id),
            'title' => old('title', $page->title),
            'slug' => old('slug', $page->slug),
            'content' => old('content', $page->content),
            'template' => old('template', $page->template_id),
            'templatePages' => $templatePages,
            'type' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Page::find($id);
        $request->validate([
            'title' => ['required'],
            'slug' => ['required'],
            'content' => ['required'],
            'image' => ['mimes:jpg,jpeg,png'],
            'template' => ['required']
        ]);

        if ($request->hasFile('image')) {
            $pageValue = $request->image;
            $filename = time() . date('Y-m-d') . '.' . $pageValue->getClientOriginalExtension();
            $request->image->storeAs('page', $filename, 'public');
        }
        $page->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'image' => $request->has('image') ? $filename : $page->image,
            'template_id' => $request->template,
        ]);
        Alert::toast('Page updated Successfully', 'success');
        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        if(file_exists(public_path('storage/page/' . $page->image))) {
            unlink(public_path('storage/page/'. $page->image));
        }
        $page->delete();

        Alert::toast('Data deleted successfully', 'success');
        return redirect()->route('pages.index');
    }
}
