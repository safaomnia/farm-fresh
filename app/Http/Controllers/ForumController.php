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

  public function delete($id)
  {
    forum::destroy($id);
    return redirect()->back();
  }

  public function commenter($forum)
  {
    User::find(Auth::user()->id)->forumCommentaires()->attach('', ['client_id' => Auth::user()->id, 'commentaire' => request('commentaire'), 'forum_id' => $forum]);
    return redirect()->back();
  }

  public function commentaire_form($forum, $id)
  {
    return view('forum',
      [
        'time' => $this->time,
        'forum' => forum::find($forum),
        'Commentaire' => forum_commentaire::find($id)
      ]);
  }

  public function commentaire_update($id)
  {

    $forum_avis = forum_commentaire::find($id);
    $forum_avis->commentaire = request('commentaire');
    $forum_avis->save();
    return redirect()->back();
  }

  public function commentaire_delete($id)
  {
    forum_commentaire::destroy($id);
    return redirect()->back();
  }

  public function reply($commentaire)
  {
    forum_commentaire::find($commentaire)->repondes()->attach('', ['client_id' => Auth::user()->id, 'reponde' => request('reponde'), 'forum_commentaire_id' =>
      $commentaire]);
    return redirect()->back();
  }


  public function reply_form($forum, $commentaire, $id)
  {
    return view('forum',
      [
        'time' => $this->time,
        'forum' => forum::find($forum),
        'Reply_commentaire' => forum_commentaire_reponde::find($commentaire),
        'Reply' => forum_commentaire_reponde::find($id)
      ]);
  }

  public function reply_update($forum, $id)
  {
    $forum_commentaire_reponde = forum_commentaire_reponde::find($id);
    $forum_commentaire_reponde->reponde = \request('reponde');
    $forum_commentaire_reponde->save();
    return redirect()->route('forum', ['id' => $forum]);
  }

  public function reply_delete($id)
  {
    forum_commentaire_reponde::destroy($id);
    return redirect()->back();
  }
}
