<?php

namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class AdminController extends Controller
{
    public function adminProfile()
    {
        $categories = Category::all();
//        dd($categories[0]->subcategories()->get());

        return view('admin.admin', [
            'categories' => $categories
        ]);
    }

    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.admin-login');
        }

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return back()->with('Not valid credentials');

        }
        $request->session()->regenerate();

        if (!Auth::user()->is_admin) {
            throw new AccessDeniedException('Access denied');
        }




        return redirect()->intended(route('admin.profile', Auth::id()));

    }


    public function logout()
    {
        Auth::logout();
        return redirect(route('admin.login'));
    }

    public function subcategoryTable()
    {
        $subcategories = Subcategory::paginate(15);

        return view('admin.subcategories-table', ['subcategories' => $subcategories]);
    }

    public function categoryTable()
    {
        $categories = Category::all();

        return view('admin.categories-table', ['categories' => $categories]);
    }
}
