<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Rating;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
//        $this->middleware('auth');
  }

  function expert (Request $request) {
//    dd($request);
    foreach ($request->all() as $key=>$val) {
      if ($key !== '_token') {
        $rating = new Rating();
        $rating->mark = $val;
        $rating->question()->associate(Question::find($key));
        $rating->save();
      }
    }
    return redirect()->route('expert')->with('status', 'Ваши данные успешно сохранены');
  }
}
