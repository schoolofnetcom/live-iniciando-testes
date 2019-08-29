<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class VideoController extends Controller
{
    private $rules = [
        'title' => 'required|max:255',
        'file' => 'required|file|max:'. (1024 * 500) //500MB
    ];

    public function index()
    {
        $videos = Video::all();
        return view('video.index', compact('videos'));
    }

    public function create()
    {
        return view('video.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        $video = Video::create($request->all());
        $request->file('file')->store($video->id);
        $video->file = $request->file('file')->hashName();
        $video->save();
        return redirect()->route('videos.index');
    }

    public function show(Video $video)
    {
        return view('video.show', compact('video'));
    }

    public function edit(Video $video)
    {
        return view('video.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $this->rules['file'] = str_replace('required','nullable', $this->rules['file']);
        $this->validate($request, $this->rules);
        $video->update($request->except('file'));
        return redirect()->route('videos.index');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('videos.index');
    }
}
