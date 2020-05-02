<?php

namespace App\Http\Controllers;

use App\forum;
use App\forum_commentaire;
use App\forum_commentaire_reponde;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ForumController extends Controller
{
  protected $time;

  public function __construct()
  {
    $this->time = $time = new \Westsworld\TimeAgo(new \Westsworld\TimeAgo\Translations\Fr());
    $this->middleware('auth')->except('index', 'show');
  }

  public function index()
  {
    return view('forums',
      [
        'time' => $this->time,
        'forums' => forum::orderBy('created_at', 'DESC')->get()
      ]);
  }

  public function show($id)
  {
    return view('forum',
      [
        'time' => $this->time,
        'forum' => forum::find($id)
      ]);
  }

  public function store()
  {
    $forum = new forum();
    $forum->theme = \request('theme');
    $forum->description = \request('description');
    $forum->client_id = Auth::user()->id;
    $forum->save();
    return redirect()->back();
  }

  public function edit($id)
  {
    return view('forums',
      [
        'forum' => forum::find($id),
        'time' => $this->time,
        'forums' => forum::orderBy('created_at', 'DESC')->get()
      ]
    );
  }

  public function update($id)
  {
    $forum = forum::find($id);
    $forum->theme = \request('theme');
    $forum->description = \request('description');
    $forum->client_id = Auth::user()->id;
    $forum->save();
    return redirect('forums');
  }

  public function delete($id)
  {
    forum::destroy($id);
    return redirect()->back();
  }
}
