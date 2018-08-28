<?php

namespace App\Http\Controllers;

use App\Game;
use App\Products;
use App\Sale;
use App\User;
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
        $game = Game::where('user_id', Auth::user()->id)->first();

        $playerPoints = $game ? $game->points : null;
        $attempts = $game ? $game->attempts : null;
        // dd($playerPoints,$attempts);
        $user = Auth::user();
        $products = Products::all();

        $sales = Sale::where('user_id',$user->id)->get();

        return view('casino.index', compact(['playerPoints', 'products','user','attempts']));
    }
}
