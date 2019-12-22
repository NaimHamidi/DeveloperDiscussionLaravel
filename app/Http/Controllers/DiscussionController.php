<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Reply;
use App\User;
use App\Discussion;

class DiscussionController extends Controller
{
    public function index()
    {
        $discussions = Discussion::orderBy('created_at','DESC')->paginate(5);
        $userid = Auth::id();

        return view('discussions.index')->with('discussions', $discussions)->with('userid', $userid);
    }

    public function create()
    {
        return view('discussions.create');
    }

    public function store(Request $request)
    {
        $r = request();

        $this->validate($r,[
            'content' => 'required',
            'title' => 'required'
        ]);

        Discussion::create([
            'title' => $r->title,
            'content' => $r->content,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('home');
    }

    public function show($id)
    {
        $discussion = Discussion::find($id);

        return view('discussions.show')->with('discussion', $discussion);
    }

    public function reply(Request $request, $id)
    {
        $r = request();

        $this->validate($r,[
            'content' => 'required'
        ]);


        $d = Discussion::find($id);

        Reply::create([
            'user_id' => Auth::id(),
            'discussion_id' => $id,
            'content' => request()->content
        ]);

        return redirect()->back();
    }

    public function edit($id)
    {
        $d = Discussion::find($id);

        return view('discussions.edit')->with('d', $d);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $d = Discussion::find($id);

        $d->title = $request->title;
        $d->content = $request->content;

        $d->save();

        return redirect()->route('home');
    }

    public function delete($id)
    {
        $d = Discussion::find($id);

        $d->delete();

        return redirect()->route('home');
    }
}
