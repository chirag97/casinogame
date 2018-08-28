<?php

namespace App\Http\Controllers;

use App\Game;
use App\Products;
use App\User;
use App\Sale;
use Auth;
use Illuminate\Http\Request;

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
        $game = Game::where('user_id', $user->id)->first();
        if (!is_null($game)) {
            //logic if already game and user row exists
            $attempts = $game->attempts;
            $game->update([
                'attempts' => ($attempts + 1)
            ]);
        } else {
            $game = Game::create([
                'user_id' => $user->id,
                'points' => 0,
                'attempts' => 1,
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
        $attempts = $request->attempts;

        $game = Game::where('user_id', Auth::user()->id)->first();
        $game = $game->update([
            'points' => $points,
            'attempts' => ($attempts + 1),
        ]);

        return response()->json([
            'message' => $game,
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

    public function redeemProduct(Request $request)
    {
        $productId = $request->get('id');
        $user = Auth::user();
        $game = Game::where('user_id',$user->id)->first();
        $product = Products::find($productId);

        if($game->points > $product->price_in_points)
        {
            $sale = Sale::make([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'sale_status' => 'Success',
            ]);

            if($sale->save())
            {
                $game->update([
                    'points' => ($game->points - $product->price_in_points)
                ]);
                return response()->json([
                    'status' => 200,
                    'id' => $product->id,
                    'message' => 'sale created successfully',
                ]);
            }else{
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong',
                ]);
            }
        }else{
                return response()->json([
                    'message' => 'Insufficient player balance',
                ]);

        }
    }

    /**
     * Reset game attempts after 30 minutes
     */

     function resetAttempts()
     {
        $user = Auth::user();
        $game = Game::where('user_id', $user->id)->first();

        $game->update([
            'attempts' => 0
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'attempts updated successfully'
        ]);
     }

}
