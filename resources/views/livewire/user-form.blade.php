<form wire:submit.prevent="save">

    <div class="grid w-full mb-6 md:grid-cols-2">

        <div class="mr-20 md:mr-28">
            <label for="photo" class="flex flex-col mb-2 text-sm font-medium text-gray-900 cursor-pointer dark:text-white">
                <div class="flex items-center space-x-3">
                    <span>Foto de Perfil</span>
                    @if ($photo)
                        <button type="button" wire:click="clearImage" class="close">
                            <x-icon.close />
                        </button> 
                    @endif
                </div>
                <input type="file" id="photo" wire:model="photo" class="hidden">
                @error('photo')<span class="error">{{ $message }}</span>@enderror
                
                
                    @if ($photo ||(isset($user) && $user->photo))        
                        <img class="w-20 h-20 rounded-full" src="{{ optional($photo)->temporaryUrl() ?? url("storage/$user->photo") }} " alt="">
                    @else
                        <div class="avatar-20">
                            <span class="text-xl font-medium text-gray-600 dark:text-gray-300">{{ $this->avatar() }}</span>
                        </div>
                    @endif
                
            </label>
        </div>
        
        <div class="md:mt-14">
            <label for="nick" class="md:hidden">Nick</label>
            <div class="flex">
                <span id="at-sign-nick">@</span>
                <input type="text" id="input-nick" placeholder="NickName" wire:model="nick">
            </div>
            @error('nick')<span class="error">{{ $message }}</span>@enderror
        </div>
    </div>
    
    <div class="mb-6">
        <div>
            <label for="name">Nome</label>
            <input type="text" id="name" wire:model="name" placeholder="Nome completo">
            @error('name')<span class="error">{{ $message }}</span>@enderror
        </div>
    </div>
    
    <div class="mb-6">
        <label for="email">Endereço de Email</label>
        <input type="email" id="email" wire:model="email" placeholder="nome@empresa.com">
        @error('email')<span class="error">{{ $message }}</span>@enderror
    </div>

    <div class="mb-6">
        <label for="password">Senha</label>
        <input type="password" id="password" wire:model="password" placeholder="•••••••••">
        @error('password')<span class="error">{{ $message }}</span>@enderror
    </div>

    <div class="mb-6">
        <label for="password_confirmation">Confirmar senha</label>
        <input type="password" id="password_confirmation" wire:model="password_confirmation" placeholder="•••••••••">
        @error('password_confirmation')<span class="error">{{ $message }}</span> @enderror
    </div>
    
    @if(!$user || !$user->exists)
        <div class="mb-6">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="terms" type="checkbox" wire:model="terms">
                </div>
                <label for="terms" class="ml-2">Eu concordo com <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">termos e condições</a>.</label>
            </div>
            @error('terms')<span class="error">{{ $message }}</span>@enderror
        </div>
    @endif

    <button type="submit">Cadastrar</button>

</form>


<script>
    Livewire.on('clear-photo', function () {
        document.querySelector('input[name="photo"]').value = '';
    });
</script>