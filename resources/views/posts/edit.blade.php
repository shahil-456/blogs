<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                   
                </div>
            </div>
            <div class="container">
    <h2 class="mb-4">Add New Post</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    
    <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="$post->title" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <div class="mb-3">
        <x-input-label for="content" :value="__('Content')" />
        <textarea id="content" name="content" class="mt-1 block w-full">{{ $post->content }}</textarea>
        <x-input-error :messages="$errors->get('content')" class="mt-2" />
    </div>

    <div class="mb-3">
        <x-input-label for="image" :value="__('Image')" />
        <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" />
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>

    @if($post->image)
        <div class="mb-3">
            <img src="{{ asset('storage/' . $post->image) }}" class="w-32 h-20 object-cover rounded" alt="Current Image">
        </div>
    @endif
        


    <div class="mt-4">
        <x-primary-button>{{ __('Update') }}</x-primary-button>
    </div>
</form>



        

        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>
        

          
        </div>
    </div>
</x-app-layout>
