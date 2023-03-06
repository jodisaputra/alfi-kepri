<?php

namespace App\Http\Controllers\Backend;

use App\Models\TemplatePage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = TemplatePage::all();
        return view('pages.admin.template.index', [
            'templates' => $templates
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.template.form', [
            'action' => route('templates.store'),
            'name' => old('name'),
            'path' => old('path'),
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
        $this->validate($request, [
            'name'     => 'required',
            'path' => 'required'
        ]);

        TemplatePage::create([
            'name'     => $request->name,
            'path'     => $request->path
        ]);

        Alert::toast('Data added successfully', 'success');
        return redirect()->route('templates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $template = TemplatePage::find($id);
        return view('pages.admin.template.form', [
            'action' => route('templates.update', $id),
            'back' => route('templates.index'),
            'type' => 'edit',
            'name' => old('name', $template->name),
            'path' => old('path', $template->path),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $template = TemplatePage::find($id);
        $this->validate($request, [
            'name'     => 'required',
            'path' => 'required'
        ]);

        $template->update([
            'name'     => $request->name,
            'path'     => $request->path
        ]);

        Alert::toast('Data has been updated!', 'success');
        return redirect()->route('templates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $template = TemplatePage::find($id);
        $template->delete();

        Alert::toast('Data deleted successfully', 'success');
        return redirect()->route('templates.index');
    }
}
