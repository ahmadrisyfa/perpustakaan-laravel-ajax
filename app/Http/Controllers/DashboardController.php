<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rak;
use App\Models\Category;
use App\Models\Buku;
use App\Models\User;
use App\Models\Murid;

class DashboardController extends Controller
{
    public function index()
    {
        $rak = Rak::count();
        $category = Category::count();
        $buku = Buku::count();
        $user = User::count();
        $murid = Murid::count();

        return view('admin.dashboard.index',compact('rak','category','buku','user','murid'));
    }
}
