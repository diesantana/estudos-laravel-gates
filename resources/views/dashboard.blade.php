<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Posts</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-8">
            {{-- ==================================================== --}}
            {{-- Habilita o botão de criar post de acordo com o gate --}}
            {{-- ==================================================== --}}
            @can('create-post')
                <div>
                    <a href="{{route('post.create')}}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Criar Post
                    </a>
                </div>
            @endcan
            {{-- ==================================================== --}}
            {{-- ==================================================== --}}

            @forelse ($posts as $post)
                <x-post-component :post='$post' />
            @empty
                <p class="text-gray-900">Nennhum POST cadastrado!</p>
            @endforelse

        </div>
    </div>
</x-app-layout>
