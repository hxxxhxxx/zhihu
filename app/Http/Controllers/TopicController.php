<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopicController extends Controller
{
    // 我的话题动态
    public function index()
    {
        return view('topic.index');
    }

    // 话题广场
    public function topicPlaza()
    {
        return view('topic.plaza');
    }
}
