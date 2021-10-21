<div class="m-4 p-3">
  <div class="card mb-3">
      <div class="row">
        <div class="col">
          @if ($post->image)
          <img src="{{ '/storage/images/'.$post->image }}" class="card-img-top p-2 mt-3 ml-auto mr-auto" alt="my post image" style="width:100%">  
          @else
          <img src="{{ '/storage/images/'.'no_image.png' }}" class="img-fluid rounded-start" alt="no image" style="width:100%">
          @endif
          
        </div>
        <div class="col-md-8">
          <div class="card-body mt-3">
            <h5 class="card-title text-2xl md:font-black">{{ $post->title }}</h5>
            <div class="flex">
              <h6 class="card-subtitle mb-2 text-lg text-muted">{{ $post->user->name}}</h6>
              <div class="ml-3">
                {{-- lazy lodding --}}
                <like-button :post="{{ $post}}" :loginuser="{{  auth()->user()->id }}"/>
              </div>
            </div><hr>
            
            <p class="card-text text-lg md:font-bold mt-3 mb-4">{{ $post->content }}</p>
            <p class="card-text mb-2 text-lg text-muted">Created {{ $post->created_at }}</p>
            <p class="card-text mb-2 text-lg text-muted">Last updated {{ $post->updated_at->diffForHumans() }}</p>
          </div>
        </div>
      </div>
      <div class="card-body flex">

        {{-- a태그로 보내면 get 방식으로 간다.   --}}
        <a href="{{ route( 'posts.edit', ['post'=>$post->id] ) }}" class="card-link">Update</a>
        
        {{-- post 방식의 delete 방식인 destroy 라우터는 form 태그를 사용해야한다. --}}
        {{-- post 방식은 무조건 form 태그 --}}
        
        {{-- a 태그나 submit 태그는 누르게 되면 href 를 통해 이동하거나, 창이 새로고침하여 실행됩니다. --}}
        {{-- preventDefault 를 통해 이러한 동작을 막아줄 수 있습니다. --}}
        {{-- 1. a 태그를 눌렀을때도 href 링크로 이동하지 않게 할 경우 --}}
        {{-- 2. form 안에 submit 역할을 하는 버튼을 눌렀어도 새로 실행하지 않게 하고싶을 경우 (submit은 작동됨) --}}
        
        <form id="form" class="ml-4" action="{{ route( 'posts.destroy', ['post'=>$post->id] )}}" method="post"
          onsubmit="onDelete(event)">
          {{-- form 태그는 put, patch, delete 액션을 지원하지 않는다. --}}
          {{-- 따라서 PUT, PATCH 나 DELETE 로 지정된 라우트를 호출하는 HTML form을 정의한다면 _method 의 숨겨진 필드를 지정해야합니다. --}}
          
          {{-- <input type="hidden" name="_method" value="delete" >
          <input type="hidden" name="_token" value="{{ csrf_token() }}" > --}}
          
          {{-- _method 입력을 생성하기 위해서 @method 블레이드 지시어를 사용할 수 있습니다. --}}
          @csrf
          @method('delete')
          <button type="submit">Delete</button>
        </form>
      </div>
  </div>

  <div class="card mb-3">
    <comment-list :post="{{ $post }}" :loginuser="{{ auth()->user()->id }}"/>
  </div>
</div>
