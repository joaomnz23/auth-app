<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('categorias.create') }}"
                class="inline-flex items-center px-4 py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-gray-700 mb-6">
                Adicione uma nova categoria
            </a>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    

                    @forelse($categorias as $categoria)
                            <div class="p-6 text-gray-900">
                                <div class="flex justify-between items-start mb-2">
                                <!-- Título à esquerda -->
                                    <h3 class="text-3xl font-bold text-black line-clamp-2 relative z-10">
                                        {{ $categoria->name }}
                                    </h3>

                                    <!-- Botões à direita -->
                                    <div class="flex gap-2 relative z-10">
                                        <a href="{{ route('categorias.edit', $categoria) }}" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-colors">
                                            Editar
                                        </a>
                                        <form method="POST" action="{{ route('categorias.destroy', $categoria) }}" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Tem certeza?')" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-colors">
                                                Deletar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                      
                    @empty
                        <p class="py-4 text-gray-500">Nenhum post encontrado</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>