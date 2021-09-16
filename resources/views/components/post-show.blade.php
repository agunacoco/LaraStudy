<div class="m-4 p-4">
    <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4 p-4">
              @if ($post->image)
                <img src="{{ '/storage/images/'.$post->image }}" class="img-fluid rounded-start" alt="my post">
              @else
                  <span>사진 없음.</span>
              @endif
            
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{ $post->title }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">작성자: {{ $post->user->name }}</h6>
              <p class="card-text">{{ $post->content }}</p>
              <p class="card-text"><small class="text-muted">{{ $post->updated_at->diffForHumans() }}</small></p>
            </div>
            <div class="card-body">
                <a href="" class="card-link">Update</a>
                <a href="" class="card-link">Delete</a>
            </div>
          </div>
          
        </div>
      </div>
</div>