<div class="m-4 p-4">
  <div class="row row-cols-1 row-cols-md-2 g-4">
      @foreach ($posts as $post )
      <div class="col mb-3">
          <div class="card">
            <a href="{{ route('posts.show', ['post'=>$post->id]) }}">
            @if ($post->image)
              <img src="{{ '/storage/images/'.$post->image }}" class="card-img-top p-2 mt-3 ml-auto mr-auto" style="width:60%" alt="my post">
            @else
              <img src="{{ '/storage/images/'.'no_image.png' }}" class="card-img-top p-2 mt-3 ml-auto mr-auto" style="width:60%" alt="no image">
            @endif
            
            <div class="card-body">
              <h5 class="card-title text-xl font-bold">{{ $post->title }}</h5>
            </a>
            <div class="flex justify-between ">
              <h6 class="card-subtitle text-muted pt-3">{{ $post->user->name}}</h6>
              <div class="flex justify-end pb-2">
                @if ($post->likers->contains(auth()->user()->id))
                    <svg
                    class="_8-yf5"
                    color="#ed4956"
                    fill="#ed4956"
                    height="24"
                    role="img"
                    viewBox="0 0 48 48"
                    width="24"
                    >
                    <path
                      d="M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"
                    ></path>
                  </svg>
                @else
                <svg
                  class="_8-yf5"
                  color="#262626"
                  fill="#262626"
                  height="24"
                  role="img"
                  viewBox="0 0 48 48"
                  width="24">
                  <path
                    d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"
                  ></path>
                </svg>
                @endif
                <p class="ml-2">{{ $post->likers->count() }}</p>
              </div>
            </div><hr>
              {{-- html 글자수 제한, 뒤에 생략하기. 밑에는 링크 --}}
              {{-- https://m.blog.naver.com/PostView.naver?isHttpsRedirect=true&blogId=kjcc2012&logNo=220640250414 --}}
              <p class="card-text mt-3" style="width:130px; text-overflow:ellipsis; white-space:nowrap; overflow:hidden; ">{{ $post->content }}</p>
            </div>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated {{ $post->updated_at->diffForHumans() }}</small>
          </div>
        
      </div>
      @endforeach
  </div>
  {{ $posts->links(); }}
</div>