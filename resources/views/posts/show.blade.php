

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>



<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow sm:rounded-lg">

            {{-- Blog Post --}}
            <div class="mb-6">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}"
                         alt="Blog Image"
                         class="w-full h-48 object-cover rounded mb-4">
                @endif

                <h1 class="text-xl font-bold text-gray-800 mb-2 text-center">{{ $post->title }}</h1>
                <p class="text-sm text-gray-600">{{ $post->content }}</p>
                <p>By {{$post->user->name}}</p>

                <div class="mt-4 text-center">
                    <a href="{{ route('posts.index') }}" class="text-blue-500 text-sm hover:underline">← Back to Posts</a>
                </div>
            </div>

            {{-- Comments --}}
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2 text-gray-700">Comments</h2>

                @forelse($post->comments as $comment)
                    <div class="border rounded p-3 mb-2">
                        <p class="text-sm text-gray-800">{{ $comment->comment }}</p>
                       By {{auth()->user()->name}} <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                @empty
                    <p class="text-sm text-gray-500">No comments yet.</p>
                @endforelse
            </div>

             @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif


            @if ($errors->any())
                <div class="mb-4 text-sm text-red-600">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- Add Comment Form --}}
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="hidden" value="{{$post->id}}" name="post_id">
                    <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">Add a comment:</label>
                    <textarea name="comment" id="comment" rows="3" class="w-full border rounded px-3 py-2 text-sm"></textarea>
                    @error('body')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="">
                    Post Comment
                </button>
            </form>

        </div>
    </div>
</div>
</x-app-layout>
