<?php

namespace App\Http\Controllers\Admin;

use App\Entities\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::get();
        return view('admin.about.index', ['about' => $about]);
    }

    public function editAbout(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string|min:4|max:25',
                'description' => 'required|string|min:10|max:25',
            ]);
            $about = About::get()->first();
            if (!$about) {
                return abort(404);
            }

            $about->title = $request->input('title');
            $about->description = $request->input('description');

            if ($about->save()) {
                return redirect()->route('about')->with('success', 'Описание компании изменено');
            }
            return back()->with('error', 'Описание компании не изменено');

        } catch (ValidationException $e) {
            \Log::error($e->getMessage());
            return back()->with('error', $e->getMessage());
        }

    }

}
