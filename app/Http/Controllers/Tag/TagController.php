<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Config;

use function App\Http\Helpers\responseSuccess;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::withCount('post')->paginate(Config::get('constants.paginate'));

        return responseSuccess($tags, "", 200);
    }

    public function create()
    {
        return view('pages.tag.create');
    }

    public function store(TagRequest $request)
    {
        Tag::create($request->input());

        return responseSuccess(true, 'Create tag success', 201);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        return responseSuccess($tag, "", 200);
    }

    public function update(TagRequest $request)
    {
        $tag = Tag::findOrFail($request->id);
        $tag->update($request->input());

        return responseSuccess($tag, "Update tag success", 200);
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return responseSuccess(null, "Delete tag success", 200);
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        Tag::whereIn('id', $ids)->delete();

        return responseSuccess(null, "Delete tag success", 200);
    }
}
