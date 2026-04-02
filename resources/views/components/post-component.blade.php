<div class="{{Auth::user()->id === $post->user_id ? "bg-blue-100" : "bg-white"}} overflow-hidden shadow-sm sm:rounded-lg">
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
                <p>Criado em: <span> {{ $post->created_at->format('d/m/Y H:i') }}</span></p>
            </div>
        </div>

        {{-- conteúdo --}}
        <div class="p-4">
            {{-- título do post --}}
            <h3 class="font-bold text-2xl pb-2">{{ $post->title }}</h3>
            {{-- conteúdo do post --}}
            <p>{{ $post->body }}</p>
        </div>

        {{-- ==================================================== --}}
        {{-- Habilita o botão de deletar post de acordo com o gate --}}
        {{-- ==================================================== --}}
        @can('delete-post', $post)
            <div class="text-end">
                <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">Deletar</button>
                </form>
            </div>
        @endcan
        {{-- ==================================================== --}}
        {{-- ==================================================== --}}

    </div>
</div>
