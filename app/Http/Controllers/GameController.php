<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Game;
use App\User;

class GameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware(['auth']);
    }


/**
 * spin start.
 *
 * @return void
 */

    public function spinStart()
    {
        $user = Auth::user();
        $game = Game::where('user_id',$user->id)->first();
        if(!is_null($game))
        {
            //logic if already game and user row exists
        }else{
            $game = Game::create([
                'user_id' => $user->id,
                'points' => 0,
                'attempts' => 1
            ]);
        }
        return response()->json(['game' => $game]);
    }



    /**
 * spin stop.
 *
 * @return void
 */

    public function spinStop(Request $request)
    {
        $points = $request->result;
        $attepts = $request->attempts;

        $game = Game::where('user_id',Auth::user()->id)->first();
        $game = $game->update([
            'points' => $points,
            'attempts' => $attepts
        ]);

        return response()->json([
            'message' => $game
        ]);

    }


    /**
     * Check the number of made by player.
     *
     * @return void
     */
    public function gameAttemptsChecker()
    {

    }

}
