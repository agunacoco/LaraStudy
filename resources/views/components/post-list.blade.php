<div>
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
    <h1>나의 이름은 {{ $name }}입니다. </h1>
    @foreach ($posts as $post)
        <div class="my-2">
            <p>{{ $post->title }}</p>
            <p>{{ $post->content }}</p> 
            <p>{{ $post->created_at }}</p>
        </div>
    @endforeach
</div>