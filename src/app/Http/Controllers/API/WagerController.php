<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Wager;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class WagerController extends Controller
{
    /**
     *  Get wagers list.
     *  Method: GET.
     *  URL Path: /wagers?page=:page&limit=:limit
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $query = Wager::query()
            ->select('*')
            ->sort();

        $wagers = $query->paginate($request->get('limit', 20));

        return response()->json($wagers->items());
    }

    /**
     * Store a wager.
     * Method: POST.
     * URL Path: /wagers
     *
     * @param Request $request
     * @return JsonResponse
     * @throws HttpException
     */
    public function store(Request $request): JsonResponse {
        $validated = $request->validate([
            'total_wager_value' => 'required|integer|min:1',
            'odds' => 'required|integer|min:1',
            'selling_percentage' => 'required|integer|min:1|max:100',
            'selling_price' => 'required|numeric|gt:0',
        ]);

        if ($validated['total_wager_value'] * $validated['selling_percentage'] / 100 > $validated['selling_price']) {
            throw new HttpException(400, 'The selling price is be greater than total_wager_value * (selling_percentage / 100)');
        }

        $validated['current_selling_price'] = $validated['selling_price'];
        $wager = Wager::query()->create($validated);

        return response()->json($wager);
    }
}
