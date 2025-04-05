<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = [
            ['id' => 1 , 'title' => 'First Post', 'posted_by' => 'Rahma', 'created_at' => '2025-4-4 16:43:00'],
            ['id' => 2 , 'title' => 'Second Post','posted_by' => 'Gohar', 'created_at' => '2025-4-4 16:43:00'],
            ['id' =>3 , 'title' => 'Third Post','posted_by' => 'Said', 'created_at' => '2025-4-4 16:43:00'],
        ];
        return view('posts.index', ['posts' => $posts]);
    }
    public function create(){
        return view('posts.create');
    }
    public function store(Request $request){
         dd($request->all());
        return to_route('posts.create');
    }
    public function show(){
        $post = [
            'title' => 'Hello Post',
            'description' => 'this is some post',
            'user' => [
                'name' => 'Ahmed',
                'email' => 'ahmed@gmail.com',
                'created_at' => '2024-10-01 10:00:00'
            ]
        ];
        return view('posts.show',[
            'post' => $post,
        ]);
    }
    public function editPage($id){
        $posts = [
            ['id' => 1 , 'title' => 'First Post', 'posted_by' => 'Rahma','description'=>'1223', 'created_at' => '2025-4-4 16:43:00'],
            ['id' => 2 , 'title' => 'Second Post','posted_by' => 'Nouran','description'=>'1223', 'created_at' => '2025-4-4 16:43:00'],
            ['id' =>3 , 'title' => 'Third Post','posted_by' => 'Said','description'=>'1223', 'created_at' => '2025-4-4 16:43:00'],
        ];
        return view('posts.edit', ['posts' => $posts[$id-1]]);
    }
    public function edit(Request $request, $id){
        dd($request->all());
    }
}
