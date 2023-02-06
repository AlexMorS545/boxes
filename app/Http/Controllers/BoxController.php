<?php

namespace App\Http\Controllers;

use App\Services\BoxService;
use Illuminate\Http\JsonResponse;

class BoxController extends Controller
{
    protected BoxService $service;

    public function __construct()
    {
        $this->service = new BoxService();
    }

    /**
     * @param int $countBottle
     * @return JsonResponse
     */
    public function countBoxes(int $countBottle)
    {
        if (!isset($countBottle)) return response()->json(['success' => false]);

        $countBoxMessage = $this->service->getCountBoxMessage($countBottle);
        return response()->json(['success' => true, 'message' =>  $countBoxMessage]);
    }
}
