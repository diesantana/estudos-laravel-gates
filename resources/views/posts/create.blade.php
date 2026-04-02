<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Criar um novo Post</h2>
    </x-slot>

    <section class="h-full p-12">
        <form action="{{ route('post.store') }}" method="POST"
            class="max-w-3xl mx-auto sm:px-6 lg:px-8 flex flex-col bg-white p-8 gap-6 shadow-md rounded-md text-gray-800">

            @csrf
            <div class="flex flex-col gap-2">
                <label for="title" class="font-medium text-lg">Título</label>
                <input type="text" name="title" placeholder="Define um título para o Post" value="{{old('title')}}">
                @error('title')
                    <div class="text-red-600">{{$message}}</div>
                @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label for="body" class="font-medium text-lg">Conteúdo</label>
                <textarea name="body" placeholder="Define um conteúdo para o Post">{{old('body')}}</textarea>
                @error('body')
                    <div class="text-red-600">{{$message}}</div>
                @enderror
            </div>

            <div class="flex justify-between">
                <a href="{{route('dashboard')}}" class="w-25 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">Cancelar</a>

                <button type="submit" class="w-25 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cadastrar</button>
            </div>

        </form>
    </section>
</x-app-layout>
