<div>
    <div class="flex-flex-wrap">
        <div class="w-full my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                Delete Role
            </p>
            <div class="leading-loose p-5 bg-white rounded shadow-xl">
                Are you sure to delete role {{ $name }}?
                <div class="mt-6">
                    <button wire:click="destroyRole"
                            class="px-4 py-1 text-white font-light tracking-wider bg-red-700 rounded"
                            type="submit">Delete</button>
                    <button wire:click="$emit('closeRole')"
                            class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>