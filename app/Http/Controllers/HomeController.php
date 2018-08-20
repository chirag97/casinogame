<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Game;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the Casino Game dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playerPoints = Game::where('user_id',Auth::user()->id)->first()->points;
        return view('casino.index',compact(['playerPoints']));
    }
}
