<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCartAPIRequest;
use App\Http\Requests\API\UpdateCartAPIRequest;
use App\Models\Cart;
use App\Repositories\CartRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CartResource;

/**
 * Class CartAPIController
 */
class CartAPIController extends AppBaseController
{
    /** @var  CartRepository */
    private $cartRepository;

    public function __construct(CartRepository $cartRepo)
    {
        $this->cartRepository = $cartRepo;
    }

    /**
     * Display a listing of the Carts.
     * GET|HEAD /carts
     */
    public function index(Request $request): JsonResponse
    {
        $carts = $this->cartRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CartResource::collection($carts), 'Carts retrieved successfully');
    }

    /**
     * Store a newly created Cart in storage.
     * POST /carts
     */
    public function store(CreateCartAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $cart = $this->cartRepository->create($input);

        return $this->sendResponse(new CartResource($cart), 'Cart saved successfully');
    }

    /**
     * Display the specified Cart.
     * GET|HEAD /carts/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Cart $cart */
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            return $this->sendError('Cart not found');
        }

        return $this->sendResponse(new CartResource($cart), 'Cart retrieved successfully');
    }

    /**
     * Update the specified Cart in storage.
     * PUT/PATCH /carts/{id}
     */
    public function update($id, UpdateCartAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Cart $cart */
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            return $this->sendError('Cart not found');
        }

        $cart = $this->cartRepository->update($input, $id);

        return $this->sendResponse(new CartResource($cart), 'Cart updated successfully');
    }

    /**
     * Remove the specified Cart from storage.
     * DELETE /carts/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Cart $cart */
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            return $this->sendError('Cart not found');
        }

        $cart->delete();

        return $this->sendSuccess('Cart deleted successfully');
    }
}
