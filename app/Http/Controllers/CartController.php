<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CartRepository;
use Illuminate\Http\Request;
use Flash;

class CartController extends AppBaseController
{
    /** @var CartRepository $cartRepository*/
    private $cartRepository;

    public function __construct(CartRepository $cartRepo)
    {
        $this->cartRepository = $cartRepo;
    }

    /**
     * Display a listing of the Cart.
     */
    public function index(Request $request)
    {
        $carts = $this->cartRepository->paginate(10);

        return view('carts.index')
            ->with('carts', $carts);
    }

    /**
     * Show the form for creating a new Cart.
     */
    public function create()
    {
        return view('carts.create');
    }

    /**
     * Store a newly created Cart in storage.
     */
    public function store(CreateCartRequest $request)
    {
        $input = $request->all();

        $cart = $this->cartRepository->create($input);

        Flash::success('Cart saved successfully.');

        return redirect(route('carts.index'));
    }

    /**
     * Display the specified Cart.
     */
    public function show($id)
    {
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            Flash::error('Cart not found');

            return redirect(route('carts.index'));
        }

        return view('carts.show')->with('cart', $cart);
    }

    /**
     * Show the form for editing the specified Cart.
     */
    public function edit($id)
    {
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            Flash::error('Cart not found');

            return redirect(route('carts.index'));
        }

        return view('carts.edit')->with('cart', $cart);
    }

    /**
     * Update the specified Cart in storage.
     */
    public function update($id, UpdateCartRequest $request)
    {
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            Flash::error('Cart not found');

            return redirect(route('carts.index'));
        }

        $cart = $this->cartRepository->update($request->all(), $id);

        Flash::success('Cart updated successfully.');

        return redirect(route('carts.index'));
    }

    /**
     * Remove the specified Cart from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cart = $this->cartRepository->find($id);

        if (empty($cart)) {
            Flash::error('Cart not found');

            return redirect(route('carts.index'));
        }

        $this->cartRepository->delete($id);

        Flash::success('Cart deleted successfully.');

        return redirect(route('carts.index'));
    }
}
