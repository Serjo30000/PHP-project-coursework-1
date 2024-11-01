<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        $coursesForPrice = Course::whereIn('id', $cart)->get();

        $final_price = 0;

        foreach ($coursesForPrice as $course){
            $final_price+= $course->price;
        }

        $courses = Course::whereIn('id', $cart)->paginate(10);

        return view('cart', compact('courses','final_price'));
    }

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

            return redirect()->route('cart')->with('success', 'Курс добавлен в корзину!');
        } else {
            return redirect()->route('home')->with('info', 'Курс уже в корзине!');
        }
    }

    public function pay(Request $request)
    {
        $user = Auth::user();

        if (!$user){
            return redirect()->route('cart')->with('error', 'Order not pay successfully.');
        }

        $request->validate([
            'number_card' => 'required|integer',
            'owner' => 'required|string',
            'data_activity' => 'required|date',
            'cvc_code' => 'required|integer',
        ]);

        $currentDate = date('Y-m-d');

        if ($request->input('data_activity') < $currentDate) {
            return redirect()->route('cart')->with('error', 'Order not pay successfully.');
        }

        $cart = session()->get('cart', []);

        $courses = Course::whereIn('id', $cart)->get();

        if ($courses->isEmpty()){
            return redirect()->route('cart')->with('error', 'Order not pay successfully.');
        }

        foreach ($courses as $course){
            $order = Order::create([
                'course_id' => $course->id,
                'user_id' => $user->id,
            ]);
        }

        session()->forget('cart');

        return redirect()->route('myCourses')->with('success', 'Курс успешно оплачен!');
    }

    public function deletes()
    {
        session()->forget('cart');

        return redirect()->route('cart')->with('success', 'Courses deleted successfully from cart.');
    }

    public function destroy(Course $course)
    {
        $cart = session()->get('cart', []);

        foreach ($cart as $key => $item) {
            if ($item['id'] == $course->id) {
                unset($cart[$key]);

                break;
            }
        }

        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Course deleted successfully from cart.');
    }
}
