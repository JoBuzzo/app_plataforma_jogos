<form wire:submit.prevent="save">
    @csrf
    <div class="grid grid-cols-2 gap-6 mb-6">
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
            <input type="text" id="name" wire:model="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Nome completo">
            @error('name')
                <span class="absolute text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="nick" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nick</label>
            <div class="flex">
                <span
                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    @
                </span>
                <input type="text" id="nick" placeholder="NickName" wire:model="nick"
                    class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            @error('nick')
                <span class="absolute text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Endereço de
            Email</label>
        <input type="email" id="email" wire:model="email"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="nome@empresa.com">
        @error('email')
            <span class="absolute text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-6">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Senha</label>
        <input type="password" id="password" wire:model="password"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="•••••••••">
        @error('password')
            <span class="absolute text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-6">
        <label for="password_confirmation"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmar senha</label>
        <input type="password" id="password_confirmation" wire:model="password_confirmation"
            name="password_confirmation"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="•••••••••">
        @error('password_confirmation')
            <span class="absolute text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>
    @if(Route::currentRouteName() === 'user.create')
    <div class="mb-6">
        <div class="flex items-start">
            <div class="flex items-center h-5">
                <input id="terms" type="checkbox" wire:model="terms"
                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
            </div>
            <label for="terms" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Eu concordo com <a
                    href="#" class="text-blue-600 hover:underline dark:text-blue-500">termos e
                    condições</a>.</label>
        </div>
        @error('terms')
            <span class="absolute text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>
    @endif
    <div class="flex items-center justify-center space-x-6">
        <button type="submit"
            class="text-white bg-blue-700 mt-2 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Cadastrar
        </button>
        <x-stepper />
    </div>

</form>
