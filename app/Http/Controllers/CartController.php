<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'course_id' => 'required|integer|exists:courses,id',
        ]);

        $user = Auth::user();

        if ($user && Order::where('user_id', $user->id)->where('course_id', $request->course_id)->exists()) {
            return redirect()->route('home')->with('info', 'Курс уже был куплен!');
        }

        $cart = session()->get('cart', []);

        if (!array_key_exists($request->course_id, $cart)) {
            $cart[$request->course_id] = [
                'id' => $request->course_id,
            ];

            session()->put('cart', $cart);

            return redirect()->route('home')->with('success', 'Курс добавлен в корзину!');
        } else {
            return redirect()->route('home')->with('info', 'Курс уже в корзине!');
        }
    }
}
