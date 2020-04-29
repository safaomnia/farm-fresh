<?php

namespace App\Http\Controllers;

use App\forum;
use App\forum_commentaire;
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
  }

  public function show()
  {
    return view('forums',
      [
        'time' => $this->time,
        'forums' => forum::orderBy('created_at', 'DESC')->get()
      ]);
  }

  public function details($id)
  {
    return view('forum',
      [
        'time' => $this->time,
        'forum' => forum::find($id)
      ]);
  }

  public function add()
  {
    $forum = new forum();
    $forum->theme = \request('theme');
    $forum->description = \request('description');
    $forum->client_id = Auth::user()->id;
    $forum->save();
    return redirect()->back();
  }

  public function form($id)
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

  public function commenter($ferme)
  {
    User::find(Auth::user()->id)->forumCommentaires()->attach('', ['client_id' => Auth::user()->id, 'commentaire' => request('commentaire'), 'forum_id' => $ferme]);
    return redirect()->back();
  }

  public function commentaire_form($ferme, $id)
  {
    return view('forum',
      [
        'time' => $this->time,
        'forum' => forum::find($ferme),
        'Commentaire' => forum_commentaire::find($id)
      ]);
  }

  public function commentaire_update($id)
  {

    $ferme_avis = forum_commentaire::find($id);
    $ferme_avis->commentaire = request('commentaire');
    $ferme_avis->save();
    return redirect()->back();
  }

  public function commentaire_delete($id)
  {
    forum_commentaire::destroy($id);
    return redirect()->back();
  }

  public function delete($id)
  {
    forum::destroy($id);
    return redirect()->back();
  }
}
