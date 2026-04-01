<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Posts</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse ($posts as $post)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    {{-- post card --}}
                    <div class="p-6 text-gray-900">
                        {{-- header card --}}
                        <div class="flex justify-between text-zinc-500 font-medium pb-3">
                            {{-- autor --}}
                            <div>
                                <p class="">Autor: <span class="text-blue-700">{{ $post->user->name }}</span></p>
                            </div>
                            {{-- Data de criação --}}
                            <div>
                                <p>Criado em: <span> {{ $post->created_at->format('d/m/Y H:i')}}</span></p>
                            </div>
                        </div>

                        {{-- conteúdo --}}
                        <div class="p-4">
                            {{-- título do post --}}
                            <h3 class="font-bold text-2xl pb-2">{{ $post->title}}</h3>
                            {{-- conteúdo do post --}}
                            <p>{{ $post->body}}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-900">Nennhum POST cadastrado!</p>
            @endforelse

        </div>
    </div>
</x-app-layout>
