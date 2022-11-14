<div class="flex justify-center my-9">
    <div class="w-96">
        <x-input wire:model="name" label="Name" placeholder="Name" />
        <x-input wire:model="email" label="Email" placeholder="Email" />
        <x-input wire:model="mobile" label="mobile" placeholder="Mobile" />

    

        <x-input wire:model="collage" label="collage" placeholder="collage" />
        <x-input wire:model="branch" label="branch" placeholder="branch" />
        <x-input wire:model="passed_out_year" label="passed_out_year" placeholder="passed_out_year" />



        <x-input wire:model="company_name" label="company_name" placeholder="company_name" />
        <x-input wire:model="designation" label="designation" placeholder="designation" />
        <x-input wire:model="location" label="location" placeholder="location" />

        
        <x-button primary label="Register"  wire:click="register"/>


        
    </div>

</div>
