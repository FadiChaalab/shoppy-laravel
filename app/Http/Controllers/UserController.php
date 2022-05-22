<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function recover()
    {
        return view('recover');
    }

    public function user_home()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(4);
        $carts = Cart::orderBy('created_at', 'desc')->where('user_id', auth()->user()->id)->paginate(4);
        return view('users.home', compact('products', 'carts'));
    }

    public function profile()
    {
        return view('profile');
    }

    public function home()
    {
        $products = Product::orderBy('created_at', 'desc')->take(8)->get();
        $orders = Order::orderBy('created_at', 'desc')->get();
        $total_orders = Order::count();
        $total_products = Order::sum('quantity');
        $total_revenue = Order::sum('total');
        $average_revenue = number_format(($total_revenue / $total_orders) / 100, 2);
        $average_products = number_format(($total_products / $total_orders) / 100, 2);
        $average_orders = number_format(($total_orders / $total_products) / 100, 2);
        $average_price = number_format(($total_revenue / $total_products) / 100, 2);
        return view('home', compact('products', 'orders', 'total_orders', 'total_products', 'total_revenue', 'average_revenue', 'average_products', 'average_orders', 'average_price'));
    }

    public function calendar()
    {
        return view('calendar');
    }

    public function users()
    {
        $users = User::where('id', '!=', auth()->user()->id)->where('is_admin', '!=', 1)->paginate(5);
        return view('users.show', compact('users'));
    }

    public function user_profile()
    {
        $user = auth()->user();
        return view('users.profile', compact('user'));
    }

    public function login_post(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        $user = User::where('email', $formFields['email'])->first();

        if ($user) {
            if ($user->is_admin) {
                if ($request->has('is_admin')) {
                    if (auth()->attempt($formFields)) {
                        $request->session()->regenerate();
                        return redirect('/home')->with('success', 'You are now logged in!');
                    }
                } else {
                    return redirect('/login')->with('error', 'You are not an admin!');
                }
            } else {
                if ($request->has('is_admin') == 0) {
                    if (auth()->attempt($formFields)) {
                        $request->session()->regenerate();
                        return redirect('/users/home')->with('success', 'You are now logged in!');
                    }
                } else {
                    return redirect('/login')->with('error', 'You are not an admin!');
                }
            }
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function register_post(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);
        $formFields['is_admin'] = $request->input('is_admin') == 'admin' ? true : false;

        $user = User::create($formFields);

        auth()->login($user);
        $request->session()->put('user', $user);
        if($user->is_admin) {
            return redirect('/home')->with('success', 'You are now logged in!');
        } else {
            return redirect('/users/home')->with('success', 'You are now logged in!');
        }
    }

    public function recover_post(Request $request)
    {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        if ($user) {
            return redirect('/recover')->with('success', 'Email sent');
        } else {
            return redirect('/recover')->with('error', 'User not found');
        }
    }

    public function update_image(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'avatar' => 'required',
        ]);
        
        if ($request->has('avatar')) {
            $avatar = $request->file('avatar');
            $filename = 'profile_'. $user->id . '.' . $avatar->getClientOriginalExtension();
            $path = $request->file('avatar')->storeAs('public/images/avatars', $filename);

            if (file_exists(public_path($name =  $path))) 
            {
                unlink(public_path($name));
            }
            $user->avatar = $filename;
            $user->save();
            return back()->with('success', 'Image updated');
        }else{
            return back()->with('error', 'Image not updated');
        }
        
    }

    public function update_profile(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'phone' => 'required',
            'address' => 'required',
            'age' => 'required',
        ]);

        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->age = $request->input('age');
        $user->save();

        return back()->with('success', 'Profile updated');
    }

    public function contact()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(8);
        return view('contact', compact('contacts'));
    }

    public function show_contact($id)
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        $contact = Contact::find($id);
        $user = User::find($contact->user_id);
        return view('read', compact('contact', 'contacts', 'user'));
    }

    public function contact_post(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'phone' => 'required',
        ]);

        $contact = new Contact();
        $contact->user_id = auth()->user()->id;
        $contact->name = auth()->user()->name;
        $contact->email = auth()->user()->email;
        $contact->phone = $request->phone;
        $contact->message = $request->input('message');
        $contact->save();
        
        return back()->with('success', 'Message sent');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out!');
    }

    public function delete_user($id)
    {
        $user = User::find($id);
        if (Storage::disk('avatars')->exists($user->avatar)) 
        {
            Storage::disk('avatars')->delete($user->avatar);
        }
        $user->delete();
        return redirect('/users')->with('success', 'User deleted');
    }
    
}