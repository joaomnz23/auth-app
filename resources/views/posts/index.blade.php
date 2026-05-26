<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <a href="{{ route('posts.create') }}"
                class="inline-flex items-center px-4 py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-gray-700 mb-6">
                Adicione um novo Post
            </a>
            
            <div class="text-gray-900">
                    
                @forelse($posts as $post)
                    <div class="py-2">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full max-h-96 object-cover rounded-lg mb-4">
                                @else 
                                    <div class="w-full h-64 bg-gray-200 rounded-lg mb-4 flex items-center justify-center">
                                        <span class="text-gray-500">Sem imagem</span>
                                    </div>
                                @endif

                                <div class="flex justify-between items-start mb-2">
                                                                        
                                    <!-- Título à esquerda -->
                                    <h3 class="text-3xl font-bold text-black line-clamp-2 relative z-10">
                                        {{ $post->title }}
                                    </h3>

                                    <!-- Botões à direita -->
                                    <div class="flex gap-2 relative z-10">
                                        <a href="{{ route('posts.edit', $post) }}" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-colors">
                                            Editar
                                        </a>
                                        <form method="POST" action="{{ route('posts.destroy', $post) }}" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Tem certeza?')" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-colors">
                                                Deletar
                                            </button>
                                        </form>
                                    </div>

                                </div>
                                
                                <div class="mb-2">
                                    <span class="inline-block px-4 py-2 text-base font-semibold text-white bg-blue-600 rounded-full">
                                        @foreach ($categorias as $categoria)
                                            @if($categoria->id == $post->categorias_id)
                                               <img src="https://images.icon-icons.com/2406/PNG/512/tags_categories_icon_145927.png"
                                               class="w-6 h-6 inline-block  mr-1"> {{ $categoria->name }}
                                            @endif
                                        @endforeach
                                    </span>
                                </div>

                                <!-- Texto/Descrição -->
                                <p class="pl-1 h-auto text-lg text-black-700 dark:text-black-300 line-clamp-3 mb-4">
                                    {{ $post->text }}
                                </p>

                                <!-- Footer -->
                                <div class="flex justify-between items-center pt-4 border-t border-gray-200 dark:border-gray-700">
                                                             
                                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 font-semibold text-sm transition-colors">
                                        Ler mais
                                    </a>
                                    <p class="text-gray-400 text-sm">Criado em {{ $post->created_at }}</p>
                                    <button class="text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition-colors">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="py-4 text-gray-500">Nenhum post encontrado</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
