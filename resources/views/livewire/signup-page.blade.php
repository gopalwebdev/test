<div class="flex justify-center my-9">
    <div class="w-96">
        <x-input wire:model="name" label="Name" placeholder="Name" />
        <x-input wire:model="email" label="Email" placeholder="Email" />
        <x-input wire:model="password" type="password" label="Password" placeholder="Password" />
        <x-button primary label="Login"  wire:click="login"/>


        
    </div>

</div>
