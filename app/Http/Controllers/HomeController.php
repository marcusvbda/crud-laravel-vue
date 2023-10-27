<?php

namespace App\Http\Controllers;

use App\Models\NewModel;

class HomeController extends Controller
{
    public function __construct(
        protected NewModel $newsRepository,
    ) {
        // 
    }

    public function index()
    {
        $list = $this->newsRepository->paginate(10)->withQueryString();
        return view('index', compact('list'));
    }
}
