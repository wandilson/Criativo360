<x-app-layout>
    <x-slot name="search">
        <form action="">
            <div class="p-2">
                <div class="bg-white flex items-center rounded-full shadow-xl">
                    <input class="rounded-l-full w-full py-4 ml-6 px-6 text-gray-700 leading-tight focus:outline-none border-none" id="search" type="text" placeholder="Pesquisar por Conteúdo">
                    
                    <div class="p-4">
                        <button class="bg-blue-500 text-white rounded-full p-2 hover:bg-blue-400 focus:outline-none w-12 h-12 flex items-center justify-center">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </x-slot>

    <div class="py-6">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">

            <div class="grid md:grid-cols-4 2xl:grid-cols-6 gap-8">
                @for ($i = 1; $i <= 12; $i++)
                    <div class="">
                        <div class="shadow-xl rounded-lg">
                            <div style="background-image: url('{{ asset('images/produtos/0'.$i.'.png') }}')" class="h-72 bg-gray-200 bg-cover bg-center rounded-t-lg flex items-center justify-center"> 
                                
                            </div>
                            <div class="bg-white rounded-b-lg">
                                <div class="relative">
                                    <div class="right-0 px-3 py-1 bg-main-red shadow-lg absolute -mt-4 text-sm text-white">P/Assinante</div>
                                </div>
                                <div class="pt-3 pb-4 px-8">
                                    <h1 class="text-2xl font-bold text-gray-700">Club Acquatico</h1>
                                    <p class="text-sm text-gray-600">.PSD / Feed Redes Sociais</p>

                                    <div class="w-full text-right mt-4">
                                        <a href=""><i class="fas fa-cloud-download-alt text-2xl"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                @endfor
            </div>
            
        </div>
    </div>
</x-app-layout>
