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
        $tags = Tag::withCount('post')->paginate(Config::get('constants.paginate'));
        return response()->json(['data' => $tags, "success" => true], 200);
    }

    public function create()
    {
        return view('pages.tag.create');
    }

    public function store(TagRequest $request)
    {
        Tag::create($request->input());

        return response()->json(['success' => 'true', 'message' => 'Tạo tag thành công'], 201);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        return response()->json(['success' => true, 'data' => $tag]);
    }

    public function update(TagRequest $request)
    {
        $tag = Tag::findOrFail($request->id);
        $tag->update($request->input());

        return response()->json(['success' => true, 'message' => 'Cập nhật thành công!!!']);
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return response()->json(['success' => true, 'message' => 'Xóa tag thành công!!!']);
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        Tag::whereIn('id', $ids)->delete();

        return response()->json(['success' => true, 'message' => 'Xóa tag thành công!!!']);
    }
}
