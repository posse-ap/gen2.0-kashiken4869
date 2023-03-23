<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudyContent;

class ContentController extends Controller
{
    public function index()
    {
        $contents = StudyContent::where('display', 1)->get();
        return view('admin.contents.managecontent', compact('contents'));
    }
    public function create()
    {
        return view('admin.contents.addcontent');
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
        $new_content = new StudyContent;
        $new_content->name = $request->input('name');
        $new_content->color = $request->input('color');
        $new_content->save();
        return redirect('/admin/managecontent');
    }

    public function edit($id)
    {
        $content = StudyContent::find($id);
        return view('admin.contents.editcontent', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $content = StudyContent::find($id);
        $content->name = $request->input('name');
        $content->color = $request->input('color');
        $content->save();
        return redirect('/admin/managecontent');
    }

    public function delete($id)
    {
        $content = StudyContent::find($id);
        $content->display = 0;
        $content->save();
        return redirect('/admin/managecontent');
    }
}
