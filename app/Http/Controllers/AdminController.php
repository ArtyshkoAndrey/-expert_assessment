<?php

namespace App\Http\Controllers;

use App\Group;
use App\Rating;
use Illuminate\Http\Request;

class AdminController extends Controller {

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $groups = Group::all();

    $Bjk = array();
    $Ajk = array();
    $Ck = array();
    $Bk = array();
    $Ak = array();
    $C0 = 0;
    $sumForBk = 0;
    if (Rating::count() > 0) {
      foreach ($groups as $group) {
        $Bjk[$group->id] = array();
        $Ajk[$group->id] = array();
        $qs = $group->questions()->get();
        foreach ($qs as $q) {
          $Bjk[$group->id][$q->id] = ($q->ratings()->get()->sum('mark') / $q->ratings()->count()) / 100;
        }
        foreach ($qs as $q) {
          $Ajk[$group->id][$q->id] = $Bjk[$group->id][$q->id] / array_sum($Bjk[$group->id]);
        }
        $sumForBk += array_sum($Bjk[$group->id]);
        $Ck[$group->id] = array_sum($Bjk[$group->id]) / count($qs);
        $Bk[$group->id] = $Ck[$group->id];
      }
      foreach ($groups as $group) {
        $Ak[$group->id] = ($Bk[$group->id] / $sumForBk) * 100;
      }
      $C0 = ($sumForBk / count($groups)) * 100;
    }

    return view('admin.home', compact('Ak', 'C0', 'groups'));
  }

  function clear(Request $request) {
    Rating::truncate();
    return redirect()->route('home')->with('message', 'Данные обнулились');
  }
}
