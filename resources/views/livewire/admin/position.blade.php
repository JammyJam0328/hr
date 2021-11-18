<div x-data="{add:@entangle('add'),edit:@entangle('edit')}">
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

    <!-- This example requires Tailwind CSS v2.0+ -->
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

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                aria-hidden="true">&#8203;</span>

            <div x-show="add"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                <div>

                    <div class="mt-3  sm:mt-5">
                        <h3 class="text-lg leading-6 font-medium text-gray-900"
                            id="modal-title">
                            Create Department
                        </h3>
                        <div class="mt-2">
                            <form action="">
                                @csrf
                                <div>
                                    <label for="email"
                                        class="block text-sm font-medium text-gray-700">Name</label>
                                    <div class="mt-1">
                                        <input wire:model.defer='create_name'
                                            type="text"
                                            name="name"
                                            id="name"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>
                                <x-shared.error-message name="create_name" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                    <button wire:click.prevent="create()"
                        type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:col-start-2 sm:text-sm">
                        Save
                    </button>
                    <button wire:click="cancel()"
                        type="button"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>


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

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                aria-hidden="true">&#8203;</span>

            <div x-show="edit"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                <div>

                    <div class="mt-3  sm:mt-5">
                        <h3 class="text-lg leading-6 font-medium text-gray-900"
                            id="modal-title">
                            Create Department
                        </h3>
                        <div class="mt-2">
                            <form action="">
                                @csrf
                                <div>
                                    <label for="email"
                                        class="block text-sm font-medium text-gray-700">Name</label>
                                    <div class="mt-1">
                                        <input wire:model.defer='edit_name'
                                            type="text"
                                            name="name"
                                            id="name"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>
                                <x-shared.error-message name="edit_name" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                    <button wire:click.prevent="update()"
                        type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:col-start-2 sm:text-sm">
                        Save
                    </button>
                    <button wire:click="cancel()"
                        type="button"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>







    <div>
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
                                        Name
                                    </th>


                                    <th scope="col"
                                        class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($positions as $key=>$position)
                                    <tr class="{{ $key % 2 == 0 ? 'bg-gray-100' : 'bg-white' }}">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $position->name }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex  space-x-2 justify-end items-center">
                                                <a href="#"
                                                    wire:click.prevent="edit({{ $position->id }})"
                                                    class="text-yellow-400 hover:bg-yellow-600 hover:text-white p-2 rounded-md border border-yellow-400">Edit</a>
                                                <a href="#"
                                                    wire:click.prevent="deletePosition({{ $position->id }})"
                                                    class="text-red-600 hover:bg-red-600 hover:text-white p-2 rounded-md border border-red-600">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2"
                                            class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">
                                            No records found
                                        </td>
                                    </tr>
                                @endforelse




                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
