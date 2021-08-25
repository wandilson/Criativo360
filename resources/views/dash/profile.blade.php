<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meu Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            
            @include('dash.includes.alerts')

            {{-- 
                Dados Pessoais    
            --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mt-5">
                <form method="POST" action="{{ route('dash.profile.update') }}">
                    @csrf
                    @method('PUT')

                    <h2 class="pb-5 uppercase font-bold">Dados Pessoais</h2>
                    <div>
                        <span class="text-sm">Seu nome:</span>
                        <input type="text" class="w-full border border-gray-100 rounded-lg" name="name" value="{{ $profile->name }}">
                    </div>
                    <div class="my-5">
                        <span class="text-sm">E-mail:</span>
                        <input type="email" class="w-full border border-gray-100 rounded-lg" name="email" value="{{ $profile->email }}">
                    </div>
                    <div class="text-right">
                        <button class="bg-main-green text-white hover:bg-main-green-hover rounded-lg px-4 py-2 mb-4 mr-6">Salvar</button>
                    </div>
                </form>
            </div>



            {{-- 
                Redefinir Senha
            --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mt-5">
                <form method="POST" action="{{ route('dash.profile.redefinePass') }}">
                    @csrf
                    @method('PUT')

                    <h2 class="pb-5 uppercase font-bold">Alterar Senha</h2>
                    <div>
                        <span class="text-sm">Senha:</span>
                        <input type="password" class="w-full border border-gray-100 rounded-lg" name="password">
                    </div>
                    <div class="my-5">
                        <span class="text-sm">Confirmar Senha:</span>
                        <input type="password" class="w-full border border-gray-100 rounded-lg" name="password_confirmation">
                    </div>
                    <div class="text-right">
                        <button class="bg-main-green text-white hover:bg-main-green-hover rounded-lg px-4 py-2 mb-4 mr-6">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
