<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>MINHAS RESERVAS</h1>
                    @foreach (Auth::user()->myReserve as $Reserve)
                <div> 
                <div x-data="{ showEdit: false }">
                            <div class="flex justify-between border-b mb-4">
                                <div>{{$Reserve->nome}}</div>
                                <div>{{$Reserve->endereco}}</div>
                                <div>{{$Reserve->numero_de_quartos}}</div>
                                <div>{{$Reserve->classificacao}}</div>
                                <div>{{$Reserve->cafe}}</div>
                                <form action="{{ route('reserve.destroy', $Reserve) }}" method="POST" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Excluir</button>
                                </form>
                                <div>
                                    <span  type="submit" class="text-blue-600 hover:text-blue-800" x-on:click="showEdit = true">Editar</span>
                                </div>
                            </div>
                            <template x-if="showEdit">
                                <form action="{{ route('reserve.update', $Reserve) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="nome" placeholder="Nome" x-model="nome" value="{{$Reserve->nome}}" />
                                    <input type="text" name="endereco" placeholder="Endereço" x-model="endereco" value="{{$Reserve->endereco}}" />
                                    <input type="text" name="numero_de_quartos" inputmode="numeric" pattern="[0-9]*" placeholder="Número de Quartos" 
                                    x-model="numero_de_quartos" value="{{$Reserve->numero_de_quartos}}" />
                                    <select name="classificacao" class="rounded-md" x-model="classificacao">
                                        <option value="">Classificação</option>
                                        <option value="5 estrelas">5 estrelas</option>
                                        <option value="4 estrelas">4 estrelas</option>
                                        <option value="3 estrelas">3 estrelas</option>
                                        <option value="2 estrelas">2 estrelas</option>
                                        <option value="1 estrela">1 estrela</option>
                                    </select>
                                    <select name="cafe" class="rounded-md" x-model="cafe">
                                        <option value="">Café da manhã?</option>
                                        <option value="sim">Sim</option>
                                        <option value="não">Não</option>
                                    </select>
                                    <button type="submit" class="text-blue-600 hover:text-blue-800">Salvar</button>
                                    <x-danger-button @click="showEdit = false">Cancelar</x-danger-button>
                                </form>
                            </template>                        
                    </div>
                    @endforeach

                    <form action="{{route('reserve.store')}}" method="POST">
                        @csrf
                        <x-text-input name="nome" placeholder="Nome" />
                        <x-text-input name="endereco" placeholder="Endereço" />
                        <input type="text" name="numero_de_quartos" inputmode="numeric" pattern="[0-9]*" placeholder="Número de Quartos" />
                        <select name="classificacao" class="rounded-md">
                            <option value="">Classificação</option>
                            <option value="5 estrelas">5 estrelas</option>
                            <option value="4 estrelas">4 estrelas</option>
                            <option value="3 estrelas">3 estrelas</option>
                            <option value="2 estrelas">2 estrelas</option>
                            <option value="1 estrela">1 estrela</option>
                        </select>
                        <select name="cafe" class="rounded-md">
                            <option value="">Café da manhã?</option>
                            <option value="sim">Sim</option>
                            <option value="não">Não</option>
                        </select>
                        <x-primary-button>Salvar</x-primary-button>
                    </form>
                    <script>
                        function confirmDelete() {
                            return confirm('Tem certeza de que deseja excluir esta reserva?');
                        }
                    </script>
            </div>
        </div>
    </div>
</x-app-layout>
