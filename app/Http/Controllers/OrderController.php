<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pizza;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return response()->json($orders);
    }

    public function list()
    {
        $orders = Order::all();
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'adress' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required',
            'items' => 'required|array',
            'items.pizza_id' => 'required|exists:pizzas,id',
            'items.quantity' => 'required|integer|min:1|max:1000'
        ]);

        try {
            $order = new Order([
                'adress' => $request->get('adress'),
                'phone' => $request->get('phone'),
                'email' => $request->get('email'),
            ]);
            $order->save();
            $items = $request->get('items');

            foreach ($items as $item) {
                $pizza = Pizza::find($item['pizza_id']);
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->pizza_id = $item['pizza_id'];
                $orderItem->quantity = $item['quantity'];
                $orderItem->price = $pizza->price;
                $orderItem->save();
            }

            return response()->json([
                'message' => 'Order Created Successfully!!'
            ]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json([
                'message' => 'Something goes wrong while creating a order!!'
            ], 500);
        }
        return response()->json($newComment);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
