<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\TelegraphText;
use Illuminate\Routing\ResponseFactory;

class TextController extends Controller
{
    public function index(Request $request)
    {
        $texts = TelegraphText::all();
        return view("createText", compact('texts'));
    }
    public function create(Request $request): Response|ResponseFactory
    {
        $text = new TelegraphText();
        $text->title = $request->input('title');
        $text->text = $request->input('text');
        $text->author = $request->input('author');
        $text->published = $request->input('published');
        $text->slug = $request->input('slug');
        $text->save();
        return view('createText')->with(response(200));
    }

    public function update(Request $request, int $id)
    {
        $text = TelegraphText::findOrFail($id);
        $text->fill($request->all());
        $text->save();

        return redirect()->back()->with('status', 'Text updated successfully');
    }



    public function destroy(int $id): Response|ResponseFactory
    {
        $text = TelegraphText::findOrFail($id);

        $text->delete();

        return response('deleted', 200);
    }
}
