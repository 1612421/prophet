<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BuyWager;
use App\Models\Wager;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BuyWagerController extends Controller
{
    /**
     * Buy a wager.
     * Method: POST.
     * URL Path: /buy/:wager_id
     *
     * @param Request $request
     * @param Wager $wager
     * @return JsonResponse
     */
    public function store(Request $request, Wager $wager): JsonResponse {
        $validated = $request->validate([
            'buying_price' => 'required|numeric|gt:0',
        ]);

        if ($validated['buying_price'] > $wager->current_selling_price) {
            throw new HttpException(422, 'The buying price must be lesser or equal to current selling price of the wager');
        }

        $validated['wager_id'] = $wager->id;
        $buy_wager = BuyWager::query()->create($validated);

        return response()->json($buy_wager);
    }
}
