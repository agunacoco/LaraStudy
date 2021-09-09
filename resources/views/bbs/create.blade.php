<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between"> 
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Writing') }}
            </h2>
            <button onclick=location.href="{{ route('posts.index') }}" type="button" class="btn btn-info text-white hover:bg-blue-700">PostList</button>
        </div>
    </x-slot>
    <div class="p-4 m-4">
        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="mb-4">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name='title' id="title" placeholder="title" value="{{ old('title') }}">
                    @error('title')
                        <div class="text-red-600">{{ $message }} </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" name="content" id="content" rows="3" placeholder="content" >{{ old('content') }}</textarea>
                    @error('content')
                        <div class="text-red-600">{{ $message }} </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="file" class="form-label">File</label>
                    <input type="file" class="form-control" name="image" id="image" rows="3" />
                </div>
                <button type="submit" class="btn btn-primary  hover:bg-blue-700">Submit</button>
            </div>
            
        </form>
    </div>
</x-app-layout>