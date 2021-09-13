<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// controller를 만들기 전에 php artisan make:controller PhotoController --resource를 입력하는데
// --resource는 이 컨트롤러는 각각의 resource에 해당하는 메소드들을 가지고 있다.
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get 메소드를 사용하여 결과를 가져올 수 있다.
        // $posts = Post::orderBy('updated_at', 'desc')->get();
        
        // latest 와 oldest 메소드는 여러준이 손쉽게 날짜를 기반으로 결과를 정렬. 
        // 기본적으로 결과는 created_at 컬럼을 기준으로 정렬.
        $posts = Post::latest('updated_at')->paginate(5);
        
        return view('bbs.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bbs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required|min:3',
        ]);

        $filename = null;
        // hasFile 메소드를 사용하면 request에 파일을 가지고 있는지 확인가능하다.
        if($request->hasFile('image')){
            // dd($request->file('image'));
            $filename = time().'_'.$request->file('image')->getClientOriginalName();
            // php artisan storage:link를 걸면 public 밑에 링크가 걸린다.
            $path = $request->file('image')->storeAs('public/images', $filename);
        }
        // array_merge는 배열끼리 합쳐서 새로운 배열을 생성해주는 함수.
        $input = array_merge($request->all(), ['user_id'=> Auth::user()->id]);
        if($filename){
            $input = array_merge($input, ['image'=>$filename]);
        }
        // create 메소드는 Post 모델 인스턴스를 생성하고 save() 메소드를 사용하여 데이터베이스에 저장한다.
        // mass assignment
        // Eloquent model의 white list인 $fillable에 기술해야 한다.
        // post 모델에 정의된 $fillable에 정의된 컬럼만 사용가능하다.
        Post::create($input);

        // post방식으로 전달하면 view보다 redirect를 한다.
        return redirect()->route('posts.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
