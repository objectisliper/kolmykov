<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::get();
        return view('admin.tags.index', ['tags' => $tags]);

    }

    public function addTag()
    {
        return view('admin.tags.add');

    }

    public function addRequestTag(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string|min:2|max:40'
            ]);
            $tags = Tag::create([
                'title' => $request->input('title'),
                'description' => $request->input('description')
            ]);
            if ($tags) {
                return back()->with('success', 'Тег создан');
            }
            return back()->with('error', 'Тег не создан');


        } catch (ValidationException $e) {
            \Log::error($e->getMessage());
            return back()->with('error', $e->getMessage());

        }
    }

    public function editTag(int $id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            return abort(404);
        }
        return view('admin.tags.edit', ['tag' => $tag]);
    }

    public function editRequestTag(Request $request, int $id)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string|min:4|max:25'
            ]);
            $objCategory = Tag::find($id);
            if (!$objCategory) {
                return abort(404);
            }

            $objCategory->title = $request->input('title');
            $objCategory->description = $request->input('description');

            if ($objCategory->save()) {
                return redirect()->route('tags')->with('success', 'Тег успешно изменен');
            }
            return back()->with('error', 'Тег не изменен');

        } catch (ValidationException $e) {
            \Log::error($e->getMessage());
            return back()->with('error', $e->getMessage());

        }
    }

    public function deleteTag(Request $request)
    {
        if ($request->ajax()) {
            $id = (int)$request->input('id');
            $objCategory = new Tag();

            $objCategory->where('id', $id)->delete();

            echo "succes";
        }
    }
}
