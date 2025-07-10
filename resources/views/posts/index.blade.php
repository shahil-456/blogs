<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">
           <div class="grid grid-cols-1 md:grid-cols-3 gap-6">


                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @foreach($posts as $post)
        <div class="bg-white rounded-lg shadow overflow-hidden relative group">
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}"
                     alt="Blog Image"
                     class="w-full h-48 object-cover">
                @endif

                
            <!-- Acation buttons -->
           
            <div class="p-4">
                <h3 class="text-lg font-bold text-gray-800">{{ $post->title }}</h3>
                <p class="text-sm text-gray-600 mt-2">{{ Str::limit($post->content, 80) }}</p>
                <a href="{{ route('posts.show', $post->id) }}"
                   class="inline-block mt-3 text-blue-500 text-sm hover:underline">Read More</a>

                 @php if($post->user_id==auth()->id()){ @endphp   

                   <div class="flex justify-end gap-2 mt-4">
                    <a href="{{ route('posts.edit', $post->id) }}"
                    class="bg-yellow-400 text-white px-4 py-2 text-sm rounded hover:bg-yellow-500">
                        ✏️ Edit
                    </a>

                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 text-white px-4 py-2 text-sm rounded hover:bg-red-600">
                            🗑️ Delete
                        </button>
                    </form>
                </div>

                @php } @endphp   
                <p>By {{$post->user->name}}</p>

            </div>
        </div>
    @endforeach
</div>


                {{-- <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach($posts as $blog)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            @if($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="w-full h-48 object-cover">
                            @endif
                            <div class="p-4">
                                <h3 class="text-lg font-bold text-gray-900">{{ $blog->title }}</h3>
                                <p class="text-sm text-gray-600 mt-2">{{ Str::limit($blog->content, 100) }}</p>
                                <a href="{{ route('posts.show', $blog->id) }}" class="inline-block mt-3 text-blue-600 hover:underline text-sm">Read More</a>
                            </div>
                        </div>
                    @endforeach
                </div> --}}

                

            </div>
        </div>

        
    </div>


    
</x-app-layout>
