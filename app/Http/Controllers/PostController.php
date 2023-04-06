<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\facades\storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request->all());
        $post = Post::all();
        return view('post.index',compact('post'));
     

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$data = $request->all();
        //$product = Product::create($data);

        $file =$request->file('photo');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path =$request->file('photo')->storeAs('public/posts',$filename);
        $path = str_replace('public/','',$path);
        
        //dd($path);
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'stocks' => $request->stocks,
            'photo' => $path
        ];
        $posts = Post::create($data);
        return redirect()->route('post.index');
        //return response()->json(['succes' =>'File Upload Successfully.']);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.update', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $file =$request->file('photo');
        $filename = time() . '.' .
        $file->getClientOriginalExtension();
        $path =$request->file('photo')->storeAs('public/post',$filename);

        $path = str_replace('public/','',$path);
        $post = Post::find($id);

        $post->name = $request->name;
        $post->price = $request->price;
        $post->stocks = $request->stocks;
        $post->photo = $path;
        $post->save();
        Storage::delete(['public/storage/posts'.$post->photo]);
        return redirect()->route('post.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('post.index');
    }
}
