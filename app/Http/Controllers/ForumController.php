<?php

namespace App\Http\Controllers;

use App\forum;
use Illuminate\Http\Request;

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
}
