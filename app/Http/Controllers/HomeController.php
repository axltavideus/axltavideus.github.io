<?php

namespace App\Http\Controllers;

use App\Models\DangerousAccount; // Use the existing DangerousAccount model
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch the last 10 dangerous accounts from the database
        $kasus = DangerousAccount::latest()->take(10)->get();

        // Pass the data to the home view
        return view('home', compact('kasus'));
    }
}