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
        $playerPoints = Game::where('user_id', Auth::user()->id)->first()->points;
        $user = Auth::user();
        $products = Products::all();

        $sales = Sale::where('user_id',$user->id)->get();

        return view('casino.index', compact(['playerPoints', 'products','user']));
    }
}
