<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListNewsRequest;
use App\Models\NewModel;

class HomeController extends Controller
{
    public function __construct(
        protected NewsController $newsController,
    ) {
        // 
    }

    public function index(ListNewsRequest $request)
    {
        $list = $this->newsController->list($request);
        return view('index', compact('list'));
    }
}
