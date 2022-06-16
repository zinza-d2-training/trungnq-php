<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Config;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::with('post')->paginate(Config::get('constants.paginate'));
        return view('pages.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('pages.tag.create');
    }

    public function store(TagRequest $request)
    {
        Tag::create($request->input());
        return back()->with('message', ['type' => 'success', 'content' => 'Tạo tag thành công']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('pages.tag.edit', compact('tag'));
    }

    public function update(TagRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update($request->input());
        return back()->with('message', ['type' => 'success', 'content' => 'Cập nhật thành công!!!']);
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return response()->json(['info', 'Xóa tag thành công!!!']);
    }
}
