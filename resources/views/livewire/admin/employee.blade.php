<div x-data="{add:@entangle('add'),edit:@entangle('edit'),creditModal:@entangle('creditModal')}">
    <div class="py-4 flex justify-between">
        <button x-on:click="add=true"
            type="button"
            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="-ml-1 mr-3 h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 4v16m8-8H4" />
            </svg>
            Add Employee
        </button>
        <div>
            <div class=" relative rounded-md shadow-sm">
                <input wire:model.debounce="searchQuery"
                    type="text"
                    name="Search"
                    id="Search"
                    class="focus:ring-blue-500 focus:border-blue-500 block w-full pr-10 sm:text-sm border-gray-300 rounded-md"
                    placeholder="Search">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <!-- Heroicon name: solid/question-mark-circle -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 text-gray-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>

                </div>
            </div>
        </div>
    </div>
    <div>
        <div x-cloak
            x-show="add"
            class="fixed z-10 inset-0 overflow-y-auto"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                <div x-show="add"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                    aria-hidden="true"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                    aria-hidden="true">&#8203;</span>

                <div x-show="add"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-on:click.outside="add=false"
                    class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle   sm:p-6 w-1/3">

                    @if ($selected_id == '')
                        <div>
                            <div class="sm:col-span-3">
                                <label for="first-name"
                                    class="block text-sm font-medium text-gray-700">
                                    Select User
                                </label>
                                <div class="mt-1">
                                    <input wire:model.debounce="searchUser"
                                        type="text"
                                        name="user"
                                        id="user"
                                        autocomplete="user"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>

                                @if ($searchUser)
                                    <div class=" p-4 shadow-md">
                                        <div>
                                            <div class="flow-root mt-6">
                                                <ul role="list"
                                                    class="-my-5 divide-y divide-gray-200">
                                                    @forelse ($users as $key=>$user)
                                                        <li class="py-4">
                                                            <div class="flex items-center space-x-4">
                                                                <div class="flex-shrink-0">
                                                                    <img class="h-8 w-8 rounded-full"
                                                                        src="{{ $user->profile_photo_url }}"
                                                                        alt="">
                                                                </div>
                                                                <div class="flex-1 min-w-0">
                                                                    <p
                                                                        class="text-sm font-medium text-gray-900 truncate">
                                                                        {{ $user->name }}
                                                                    </p>
                                                                    <p class="text-sm text-gray-500 truncate">
                                                                        {{ $user->email }}
                                                                    </p>
                                                                </div>
                                                                <div>
                                                                    <a href="#"
                                                                        wire:click.prevent="selectUser('{{ $user->id }}')"
                                                                        class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                                        Select
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @empty
                                                        <li class="py-4">
                                                            <div class="flex items-center text-center space-x-4">
                                                                User not found
                                                            </div>
                                                        </li>
                                                    @endforelse

                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    @else
                        <div>
                            <div class="text-start ">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 uppercase"
                                    id="modal-title">
                                    Create Employee information
                                </h3>
                                <div class="mt-2">
                                    <form action=""
                                        class="space-y-2">
                                        @csrf
                                        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                            <div class="sm:col-span-3">
                                                <label for="first-name"
                                                    class="block text-sm font-medium text-gray-700">
                                                    First name
                                                </label>
                                                <div class="mt-1">
                                                    <input wire:model.defer="create_firstname"
                                                        type="text"
                                                        name="first-name"
                                                        id="first-name"
                                                        autocomplete="given-name"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                                <x-shared.error-message name="create_firstname" />
                                            </div>

                                            <div class="sm:col-span-3">
                                                <label for="middle-name"
                                                    class="block text-sm font-medium text-gray-700">
                                                    Middle name
                                                </label>
                                                <div class="mt-1">
                                                    <input wire:model.defer="create_middlename"
                                                        type="text"
                                                        name="middle-name"
                                                        id="middle-name"
                                                        autocomplete="family-name"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                                <x-shared.error-message name="create_middlename" />
                                            </div>
                                            <div class="sm:col-span-3">
                                                <label for="last-name"
                                                    class="block text-sm font-medium text-gray-700">
                                                    Last name
                                                </label>
                                                <div class="mt-1">
                                                    <input wire:model.defer="create_lastname"
                                                        type="text"
                                                        name="last-name"
                                                        id="last-name"
                                                        autocomplete="family-name"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                                <x-shared.error-message name="create_lastname" />
                                            </div>
                                            <div class="sm:col-span-3">
                                                <label for="contact"
                                                    class="block text-sm font-medium text-gray-700">
                                                    Contact
                                                </label>
                                                <div class="mt-1">
                                                    <input wire:model.defer="create_contact"
                                                        type="text"
                                                        name="contact"
                                                        id="contact"
                                                        autocomplete="contact"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                                <x-shared.error-message name="create_contact" />
                                            </div>

                                            <div class="sm:col-span-6">
                                                <label for="address"
                                                    class="block text-sm font-medium text-gray-700">
                                                    Address
                                                </label>
                                                <div class="mt-1">
                                                    <input wire:model.defer="create_address"
                                                        id="address"
                                                        name="address"
                                                        type="text"
                                                        autocomplete="email"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                                <x-shared.error-message name="create_address" />
                                            </div>

                                            <div class="sm:col-span-3">
                                                <label for="Departments"
                                                    class="block text-sm font-medium text-gray-700">
                                                    Departments
                                                </label>
                                                <div class="mt-1">
                                                    <select wire:model.defer="create_department_id"
                                                        id="country"
                                                        name="Departments"
                                                        autocomplete="Departments"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                        <option value=""></option>
                                                        @foreach ($departments as $key => $department)
                                                            <option value="{{ $department->id }}">
                                                                {{ $department->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <x-shared.error-message name="create_department_id" />
                                            </div>
                                            <div class="sm:col-span-3">
                                                <label for="Departments"
                                                    class="block text-sm font-medium text-gray-700">
                                                    Approver
                                                </label>
                                                <div class="mt-1">
                                                    <select wire:model.defer="create_approver_id"
                                                        id="Approver"
                                                        name="Approver"
                                                        autocomplete="Approver"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                        <option value=""></option>
                                                        @foreach ($heads as $key => $head)
                                                            <option value="{{ $head->id }}">
                                                                {{ $head->firstname }}
                                                                {{ $head->middlename }} {{ $head->lastname }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <x-shared.error-message name="create_approver_id" />
                                            </div>
                                            <div class="sm:col-span-3">
                                                <label for="Departments"
                                                    class="block text-sm font-medium text-gray-700">
                                                    Position
                                                </label>
                                                <div class="mt-1">
                                                    <select wire:model.defer="create_position"
                                                        id="Approver"
                                                        name="Approver"
                                                        autocomplete="Approver"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                        <option value=""></option>
                                                        @foreach ($positions as $key => $position)
                                                            <option value="{{ $position->id }}">
                                                                {{ $position->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <x-shared.error-message name="create_position" />
                                            </div>
                                            <div class="sm:col-span-3">
                                                <label for="Departments"
                                                    class="block text-sm font-medium text-gray-700">
                                                    Departments
                                                </label>
                                                <div class="mt-1">
                                                    <select wire:model.defer="position_department"
                                                        id="country"
                                                        name="Departments"
                                                        autocomplete="Departments"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                        <option value=""></option>
                                                        @foreach ($departments as $key => $department)
                                                            <option value="{{ $department->id }}">
                                                                {{ $department->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <x-shared.error-message name="position_department" />
                                            </div>



                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="mt-5 sm:mt-6 flex justify-end space-x-3 border-t border-gray-400 pt-4">

                                <button wire:click.prevent="cancel()"
                                    type="button"
                                    class="mt-3 inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                                    Cancel
                                </button>
                                <button wire:click.prevent="create()"
                                    type="button"
                                    class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:col-start-2 sm:text-sm">
                                    Save
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    {{-- edit --}}
    <div>
        <div x-cloak
            x-show="edit"
            class="fixed z-10 inset-0 overflow-y-auto"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                <div x-show="edit"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                    aria-hidden="true"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                    aria-hidden="true">&#8203;</span>

                <div x-show="edit"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-on:click.outside="edit=false"
                    class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle   sm:p-6 w-1/3">


                    <div>
                        <div class="text-start ">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 uppercase"
                                id="modal-title">
                                Edit Employee information
                            </h3>
                            <div class="mt-2">
                                <form action=""
                                    class="space-y-2">
                                    @csrf
                                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                        <div class="sm:col-span-3">
                                            <label for="first-name"
                                                class="block text-sm font-medium text-gray-700">
                                                First name
                                            </label>
                                            <div class="mt-1">
                                                <input wire:model.defer="edit_firstname"
                                                    type="text"
                                                    name="first-name"
                                                    id="first-name"
                                                    autocomplete="given-name"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <x-shared.error-message name="edit_firstname" />
                                        </div>

                                        <div class="sm:col-span-3">
                                            <label for="middle-name"
                                                class="block text-sm font-medium text-gray-700">
                                                Middle name
                                            </label>
                                            <div class="mt-1">
                                                <input wire:model.defer="edit_middlename"
                                                    type="text"
                                                    name="middle-name"
                                                    id="middle-name"
                                                    autocomplete="family-name"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <x-shared.error-message name="edit_middlename" />
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label for="last-name"
                                                class="block text-sm font-medium text-gray-700">
                                                Last name
                                            </label>
                                            <div class="mt-1">
                                                <input wire:model.defer="edit_lastname"
                                                    type="text"
                                                    name="last-name"
                                                    id="last-name"
                                                    autocomplete="family-name"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <x-shared.error-message name="edit_lastname" />
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label for="contact"
                                                class="block text-sm font-medium text-gray-700">
                                                Contact
                                            </label>
                                            <div class="mt-1">
                                                <input wire:model.defer="edit_contact"
                                                    type="text"
                                                    name="contact"
                                                    id="contact"
                                                    autocomplete="contact"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <x-shared.error-message name="edit_contact" />
                                        </div>

                                        <div class="sm:col-span-6">
                                            <label for="address"
                                                class="block text-sm font-medium text-gray-700">
                                                Address
                                            </label>
                                            <div class="mt-1">
                                                <input wire:model.defer="edit_address"
                                                    id="address"
                                                    name="address"
                                                    type="text"
                                                    autocomplete="email"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <x-shared.error-message name="edit_address" />
                                        </div>

                                        <div class="sm:col-span-3">
                                            <label for="Departments"
                                                class="block text-sm font-medium text-gray-700">
                                                Departments
                                            </label>
                                            <div class="mt-1">
                                                <select wire:model.defer="edit_department_id"
                                                    id="country"
                                                    name="Departments"
                                                    autocomplete="Departments"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                    <option value=""></option>
                                                    @foreach ($departments as $key => $department)
                                                        <option value="{{ $department->id }}">
                                                            {{ $department->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <x-shared.error-message name="edit_department_id" />
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label for="Departments"
                                                class="block text-sm font-medium text-gray-700">
                                                Approver
                                            </label>
                                            <div class="mt-1">
                                                <select wire:model.defer="edit_approver_id"
                                                    id="Approver"
                                                    name="Approver"
                                                    autocomplete="Approver"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                    <option value=""></option>
                                                    @foreach ($heads as $key => $head)
                                                        <option value="{{ $head->id }}">
                                                            {{ $head->firstname }}
                                                            {{ $head->middlename }} {{ $head->lastname }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <x-shared.error-message name="edit_approver_id" />
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label for="Departments"
                                                class="block text-sm font-medium text-gray-700">
                                                Position
                                            </label>
                                            <div class="mt-1">
                                                <select wire:model.defer="edit_position"
                                                    id="Approver"
                                                    name="Approver"
                                                    autocomplete="Approver"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                    <option value=""></option>
                                                    @foreach ($positions as $key => $position)
                                                        <option value="{{ $position->id }}">
                                                            {{ $position->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <x-shared.error-message name="edit_position" />
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label for="Departments"
                                                class="block text-sm font-medium text-gray-700">
                                                Departments
                                            </label>
                                            <div class="mt-1">
                                                <select wire:model.defer="edit_position_department"
                                                    id="country"
                                                    name="Departments"
                                                    autocomplete="Departments"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                    <option value=""></option>
                                                    @foreach ($departments as $key => $department)
                                                        <option value="{{ $department->id }}">
                                                            {{ $department->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <x-shared.error-message name="position_department" />
                                        </div>



                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-6 flex justify-end space-x-3 border-t border-gray-400 pt-4">

                            <button wire:click.prevent="cancel()"
                                type="button"
                                class="mt-3 inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                                Cancel
                            </button>
                            <button wire:click.prevent="update()"
                                type="button"
                                class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:col-start-2 sm:text-sm">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 ">
                        <thead class="bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Department
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Approver
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Position
                                </th>
                                <th scope="col"
                                    class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Odd row -->
                            @forelse ($employees as $key => $employee)
                                <tr class="{{ $key % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 space-y-1 grid">
                                        <span>Name : {{ $employee->firstname }} {{ $employee->middlename }}.
                                            {{ $employee->lastname }}</span>
                                        <span>Address : {{ $employee->address }}</span>
                                        <span>Contact : {{ $employee->contact_number }}</span>

                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $employee->department->name }}

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                        @if ($employee->approver_id)
                                            @php
                                                $approver = App\Models\Employee::where('id', $employee->approver_id)->first();
                                            @endphp
                                            {{ $approver->firstname }} {{ $approver->middlename }}.
                                            {{ $approver->lastname }}
                                        @else
                                            Not Set
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                        @if ($employee->designation)
                                            {{ $employee->designation->position->name }}

                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium ">
                                        <div class="flex  space-x-2 justify-end items-center">
                                            <a href="#"
                                                wire:click.prevent="getCredits({{ $employee->id }})"
                                                class="text-green-600 hover:bg-green-600 hover:text-white p-2 rounded-md border border-green-600">Credits</a>
                                            <a href="#"
                                                wire:click.prevent="edit({{ $employee->id }})"
                                                class="text-yellow-400 hover:bg-yellow-600 hover:text-white p-2 rounded-md border border-yellow-400">Edit</a>
                                            <a href="#"
                                                wire:click.prevent="deleteEmployee({{ $employee->id }})"
                                                class="text-red-600 hover:bg-red-600 hover:text-white p-2 rounded-md border border-red-600">Delete</a>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4"
                                        class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500 uppercase ">
                                        No record
                                        found </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="py-2">
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>

    {{--  --}}

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div x-cloak
        x-show="creditModal"
        class="fixed z-10 inset-0 overflow-y-auto"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                aria-hidden="true">&#8203;</span>

            <div
                class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle  sm:p-6">
                <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                    <button x-on:click="creditModal=false"
                        type="button"
                        class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="sr-only">Close</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="sm:flex sm:items-start">

                    <div class="mt-3 text-center sm:mt-0  sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900"
                            id="modal-title">
                            Leave Credits

                        </h3>
                        <div class="mt-2">
                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Leave Type
                                                        </th>

                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Used
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Balance
                                                        </th>
                                                        <th scope="col"
                                                            class="relative px-6 py-3">
                                                            <span class="sr-only">Edit</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Odd row -->
                                                    @forelse ($credits as $key=>$credit)
                                                        <tr class="bg-white">
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                                {{ $credit->leave_type->description }}
                                                            </td>

                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                {{ $credit->used }}
                                                            </td>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                {{ $credit->balance }}
                                                            </td>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                                <div class="flex space-x-2">
                                                                    <form action="">
                                                                        @csrf
                                                                        <input :key="$key"
                                                                            type="number"
                                                                            wire:model.defer="credit_number"
                                                                            name="count"
                                                                            id="count">
                                                                    </form>
                                                                    <button wire:click="addCredit({{ $credit->id }})"
                                                                        class="focus:outline-non border hover:bg-gray-200 rounded-md px-2">Update</button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty

                                                    @endforelse

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
