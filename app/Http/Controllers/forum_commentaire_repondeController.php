<?php

namespace App\Http\Controllers;

use App\forum;
use App\forum_commentaire;
use App\forum_commentaire_reponde;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class forum_commentaire_repondeController extends Controller
{
  protected $time;

  public function __construct()
  {
    $this->time = $time = new \Westsworld\TimeAgo(new \Westsworld\TimeAgo\Translations\Fr());
    $this->middleware('auth');
  }

  public function store($commentaire)
  {
    forum_commentaire::find($commentaire)->repondes()->attach('', ['client_id' => Auth::user()->id, 'reponde' => request('reponde'), 'forum_commentaire_id' =>
      $commentaire]);
    return redirect()->back();
  }


  public function edit($forum, $commentaire, $id)
  {
    return view('forum',
      [
        'time' => $this->time,
        'forum' => forum::find($forum),
        'Reply_commentaire' => forum_commentaire_reponde::find($commentaire),
        'Reply' => forum_commentaire_reponde::find($id)
      ]);
  }

  public function update($forum, $id)
  {
    $forum_commentaire_reponde = forum_commentaire_reponde::find($id);
    $forum_commentaire_reponde->reponde = \request('reponde');
    $forum_commentaire_reponde->save();
    return redirect()->route('forum', ['id' => $forum]);
  }

  public function delete($id)
  {
    forum_commentaire_reponde::destroy($id);
    return redirect()->back();
  }

}

