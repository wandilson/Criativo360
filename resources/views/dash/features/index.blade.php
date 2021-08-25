<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="inline-block font-semibold text-xl text-gray-800 leading-tight mr-10">
                {{ __('Lista de Detalhes do Plano: ') }} <span class="text-main-cyan">{{ $plan->name }}</span>
            </h2>
            <div class="text-right">
                <a href="{{ route('dash.plans') }}" class="bg-main-blue-capri text-white text-xs px-4 py-2 rounded-lg hover:bg-main-dark-hover uppercase">Listar Planos</a>
                <a href="{{ route('dash.features.create', $plan->id) }}" class="bg-main-blue text-white text-xs px-4 py-2 rounded-lg hover:bg-main-dark-hover uppercase">Novo Item</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @include('dash.includes.alerts')

            <div class="grid grid-cols-4 gap-4">
                @foreach ($features as $item)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="text-xl uppercase font-bold px-5 pt-4">
                            {{ $item->name }}
                        </div>                        

                        <div class="px-5 pt-6 pb-3 flex text-sm">
                            <div><a href="{{ route('dash.features.edit', $item->id) }}" class="mr-6 text-main-cyan"><i class="far fa-edit"></i> Editar</a></div>
                            <form action="{{ route('dash.features.destroy', $item->id) }}" onsubmit="return confirm('Deseja realmente remover o registro, {{ $item->name }}?');" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="text-main-red"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            


        </div>
    </div>
</x-app-layout>
