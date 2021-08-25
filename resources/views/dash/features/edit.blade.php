<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="inline-block font-semibold text-xl text-gray-800 leading-tight mr-10">
                {{ __('Editar detalhe do Plano: ') }} <span class="text-main-cyan">{{ $feature->plan->name }}</span>
            </h2>
            <div class="text-right">
                <a href="{{ route('dash.features', $feature->plan_id) }}" class="bg-main-blue text-white text-xs px-4 py-2 rounded-lg hover:bg-main-dark-hover uppercase">Voltar</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            @include('dash.includes.alerts')
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('dash.features.update', $feature->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    @include('dash.features._partials.form')

                    <div class="text-right mt-4">
                        <button class="bg-main-green text-white hover:bg-main-green-hover rounded-lg px-4 py-2 mb-4 mr-6">Salvar</button>
                    </div>
                </form>
            </div>
            

        </div>
    </div>
</x-app-layout>
