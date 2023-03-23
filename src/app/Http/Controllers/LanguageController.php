<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudyLanguage;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = StudyLanguage::all();
        return view('admin.languages.managelanguages', compact('languages'));
    }
    public function create()
    {
        return view('admin.languages.addlanguage');
    }

    public function add(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => '名前',
        ]);

        // レコード追加
        $new_language = new StudyLanguage;
        $new_language->name = $request->input('name');
        $new_language->color = $request->input('color');
        $new_language->save();
        return redirect('/admin/managelanguages');
    }

    public function edit($id)
    {
        $language = StudyLanguage::find($id);
        return view('admin.languages.editlanguage', compact('language'));
    }

    public function update(Request $request, $id)
    {
        $language = StudyLanguage::find($id);
        $language->name = $request->input('name');
        $language->color = $request->input('color');
        $language->save();
        return redirect('/admin/managelanguages');
    }

    public function delete($id)
    {
        $language = StudyLanguage::find($id);
        $language->display = 0;
        $language->save();
        return redirect('/admin/managelanguages');
    }
}
