<div>
    <div wire:loading>
        Please wait ...
    </div>
    @if ($createRole)
    @livewire('role.create')
    @endif
    @if ($editRole)
    @livewire('role.update')
    @endif
    @if ($deleteRole)
    @livewire('role.delete')
    @endif
    <h1 class="text-3xl text-black pb-6">Roles</h1>

    @if (session()->has('message'))
    {{-- alert --}}
    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-{{session('color')}}-500 alert">
        <span class="text-xl inline-block mr-5 align-middle">
            <i class="fas fa-check"></i>
        </span>
        <span class="inline-block align-middle mr-8">
            {{session('message')}}
        </span>
        <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none"
                onclick="closeAlert(event)">
            <span>×</span>

        </button>
    </div>
    @endif

    <div class="w-full">

        <div class="grid grid-cols-6">

            @if (Auth::user()->hasPermissionTo('create roles'))
            <div>
                <button wire:click="createRole"
                        class="px-4 py-2 text-white font-light tracking-wider bg-gray-900 rounded">Add</button>
                @endif
            </div>
            <div class="col-start-5 col-span-2 text-right">
                <select wire:model="paginate"
                        class="px-3 py-2 bg-gray-200">
                    <option value="
                5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
                <input wire:model="search"
                       type="text"
                       class="px-3 py-2 bg-gray-200"
                       placeholder="Search">
            </div>
        </div>

        <div class="bg-white overflow-auto mt-5">
            <table class="min-w-full bg-white"
                   style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Permissions</th>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($roles as $key => $role)
                    <tr>
                        <td class="w-1/3 text-left py-3 px-4">{{$role->name}}</td>
                        <td class="w-1/3 text-left py-3 px-4">
                            <div class="flex space-x-2">
                                <ul>
                                    @foreach ($permissions[$key] as $permission)
                                    <li>{{ $permission['name']}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </td>
                        <td class="w-1/3 text-left py-3 px-4">
                            <div class="flex space-x-2">
                                @if (Auth::user()->hasPermissionTo('update roles'))
                                <button wire:click="editRole({{$role->id}})"
                                        class="px-3 py-2 text-white font-light tracking-wider bg-yellow-700 rounded">Edit</button>
                                @else
                                <button class="px-3 py-2 text-white font-light tracking-wider bg-yellow-700 rounded opacity-50"
                                        disabled>Edit</button>
                                @endif
                                <button wire:click="deleteRole({{$role->id}})"
                                        class="px-3 py-2 text-white font-light tracking-wider bg-red-700 rounded"
                                        onclick="scrollUp()">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$roles->links()}}
    </div>

    @push('js')
    <script>
        function closeAlert(event){
          let element = event.target;
          while(element.nodeName !== "BUTTON"){
            element = element.parentNode;
          }
          element.parentNode.parentNode.removeChild(element.parentNode);
        }

    </script>
    @endpush
</div>