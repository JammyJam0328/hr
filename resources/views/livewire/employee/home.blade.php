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
                    class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                    <div>

                        <div class="text-start ">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 uppercase"
                                id="modal-title">
                                Leave Application
                            </h3>
                            <div class="mt-2">
                                <div class="py-2">
                                    @error('leave_credits')
                                        <span class="text-red-600">You don't have enough leave credits</span>
                                    @enderror
                                </div>
                                <form action=""
                                    class="space-y-2">
                                    @csrf
                                    <div>
                                        <label for="role"
                                            class="block text-sm font-medium text-gray-700">Leave Type</label>
                                        <div class="mt-1">
                                            <select wire:model.defer="create_type"
                                                name="role"
                                                id="role"
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md uppercase">
                                                <option value=""></option>
                                                @foreach ($leaveTypes as $key => $leaveType)
                                                    <option value="{{ $leaveType->id }}">
                                                        {{ $leaveType->description }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <x-shared.error-message name="create_type" />
                                    </div>
                                    <div>
                                        <label for="username"
                                            class="block text-sm font-medium text-gray-700">Reason</label>
                                        <div class="mt-1">
                                            <input wire:model.defer="create_reason"
                                                type="text"
                                                name="username"
                                                id="username"
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <x-shared.error-message name="create_reason" />
                                    </div>

                                    <div>
                                        <label for="role"
                                            class="block text-sm font-medium text-gray-700">Type</label>
                                        <div class="mt-1">
                                            <select wire:model.defer="create_day_type"
                                                name="role"
                                                id="role"
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md uppercase">
                                                <option value=""></option>
                                                @foreach ($types as $key => $type)
                                                    <option value="{{ $key }}">{{ $type }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <x-shared.error-message name="create_day_type" />
                                    </div>

                                    <div class="flex  space-x-2 w-full">
                                        <div class="w-full">
                                            <label for="username"
                                                class="block text-sm font-medium text-gray-700">Start Date</label>
                                            <div class="mt-1">
                                                <input wire:model.defer="create_start_date"
                                                    type="date"
                                                    name="start"
                                                    id="start"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <x-shared.error-message name="create_start_date" />
                                        </div>

                                        <div class="w-full">
                                            <label for="username"
                                                class="block text-sm font-medium text-gray-700">End Date</label>
                                            <div class="mt-1">
                                                <input wire:model.defer="create_end_date"
                                                    type="date"
                                                    name="end"
                                                    id="end"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <x-shared.error-message name="create_end_date" />
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div
                        class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense border-t border-gray-400 pt-4">
                        <button wire:click.prevent="create()"
                            type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:col-start-2 sm:text-sm">
                            Save
                        </button>
                        <button x-on:click="add=false"
                            type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                            Cancel
                        </button>
                    </div>
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
                                        Leave Type
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Reason
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date from-to
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col"
                                        class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Odd row -->

                                @forelse ($leaves as $leave)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $leave->leaveType->description }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $leave->reason }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $leave->start_date }} - {{ $leave->end_date }} ({{ $leave->type }})
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $leave->status }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            @if ($leave->status == 'pending')
                                                <a href="#"
                                                    wire:click.prevent="cancelLeave('{{ $leave->id }}')"
                                                    class="text-red-600 hover:text-red-900">Cancel</a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5"
                                            class="text-center">
                                            No data
                                        </td>
                                    </tr>
                                @endforelse


                                <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
