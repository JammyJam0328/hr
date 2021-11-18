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

                    <div class="">
                        <h3 class="text-lg leading-6 font-medium text-gray-900"
                            id="modal-title">
                            Create Leave Type
                        </h3>
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="rounded-md bg-blue-50 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <!-- Heroicon name: solid/information-circle -->
                                    <svg class="h-5 w-5 text-blue-400"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3 flex-1 md:flex md:justify-between">
                                    <p class="text-sm text-blue-700">
                                        After creating a leave type, Credits will be added to the employee's account. 10
                                        Credits are added by default.
                                    </p>

                                </div>
                            </div>
                        </div>

                        <div class="mt-2">
                            <form action="">
                                @csrf
                                <div>
                                    <label for="email"
                                        class="block text-sm font-medium text-gray-700">Type</label>
                                    <div class="mt-1">
                                        <input wire:model.defer='create_type'
                                            type="text"
                                            name="name"
                                            id="name"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <x-shared.error-message name="create_name" />

                                </div>
                                <div>
                                    <label for="email"
                                        class="block text-sm font-medium text-gray-700">Desciption</label>
                                    <div class="mt-1">
                                        <input wire:model.defer='create_description'
                                            type="text"
                                            name="name"
                                            id="name"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <x-shared.error-message name="create_description" />
                                </div>

                                <div class="relative flex items-start mt-2">
                                    <div class="flex items-center h-5">
                                        <input wire:model.defer="create_payable"
                                            id="comments"
                                            aria-describedby="comments-description"
                                            name="comments"
                                            type="checkbox"
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="comments"
                                            class="font-medium text-gray-700">Payable</label>

                                    </div>
                                </div>

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
                                        class="block text-sm font-medium text-gray-700">Type</label>
                                    <div class="mt-1">
                                        <input wire:model.defer='edit_type'
                                            type="text"
                                            name="name"
                                            id="name"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <x-shared.error-message name="edit_name" />

                                </div>
                                <div>
                                    <label for="email"
                                        class="block text-sm font-medium text-gray-700">Desciption</label>
                                    <div class="mt-1">
                                        <input wire:model.defer='edit_description'
                                            type="text"
                                            name="name"
                                            id="name"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <x-shared.error-message name="edit_description" />
                                </div>

                                <div class="relative flex items-start mt-2">
                                    <div class="flex items-center h-5">
                                        <input wire:model.defer="edit_payable"
                                            id="comments"
                                            aria-describedby="comments-description"
                                            name="comments"
                                            type="checkbox"
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="comments"
                                            class="font-medium text-gray-700">Payable</label>
                                    </div>
                                </div>

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
                                        Type
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Payable
                                    </th>


                                    <th scope="col"
                                        class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($leaveTypes as $key=>$leaveType)
                                    <tr class="{{ $key % 2 == 0 ? 'bg-gray-100' : 'bg-white' }}">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $leaveType->type }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $leaveType->description }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            @if ($leaveType->payable)
                                                <span class="text-green-600">Yes</span>
                                            @else
                                                <span class="text-red-600">No</span>
                                            @endif
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex  space-x-2 justify-end items-center">
                                                <a href="#"
                                                    wire:click.prevent="edit({{ $leaveType->id }})"
                                                    class="text-yellow-400 hover:bg-yellow-600 hover:text-white p-2 rounded-md border border-yellow-400">Edit</a>
                                                <a href="#"
                                                    wire:click.prevent="deleteType({{ $leaveType->id }})"
                                                    class="text-red-600 hover:bg-red-600 hover:text-white p-2 rounded-md border border-red-600">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4"
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
