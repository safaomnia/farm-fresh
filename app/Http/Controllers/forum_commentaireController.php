<?php

namespace App\Http\Controllers;

use App\forum;
use App\forum_commentaire;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class forum_commentaireController extends Controller
{
  protected $time;

  public function __construct()
  {
    $this->time = $time = new \Westsworld\TimeAgo(new \Westsworld\TimeAgo\Translations\Fr());
    $this->middleware('auth');
  }

  public function store($forum)
  {
    User::find(Auth::user()->id)->forumCommentaires()->attach('', ['client_id' => Auth::user()->id, 'commentaire' => request('commentaire'), 'forum_id' => $forum]);
    return redirect()->back();
  }

  public function edit($forum, $id)
  {
    return view('forum',
      [
        'time' => $this->time,
        'forum' => forum::find($forum),
        'Commentaire' => forum_commentaire::find($id)
      ]);
  }

  public function update($id)
  {
    $forum_avis = forum_commentaire::find($id);
    $forum_avis->commentaire = request('commentaire');
    $forum_avis->save();
    return redirect()->back();
  }

  public function delete($id)
  {
    forum_commentaire::destroy($id);
    return redirect()->back();
  }
}
