<div class="flex justify-center my-9">
    <div class="w-96">
        <x-input wire:model="name" label="Name" placeholder="Name" />
        <x-input wire:model="email" label="Email" placeholder="Email" />
        <x-input wire:model="password" type="password" label="Password" placeholder="Password" />

        <x-native-select
            label="I am a"
            placeholder="Select one status"
            :options="['Fresher', 'Experienced']"
            wire:model="user_type"
        />


        <x-checkbox id="lg" lg wire:model="is_admin"  label="Admin" />
        
        <x-button primary label="Register"  wire:click="register"/>


        
    </div>

</div>
