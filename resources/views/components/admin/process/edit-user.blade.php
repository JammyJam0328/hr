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
                class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                <div>

                    <div class="text-start ">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 uppercase"
                            id="modal-title">
                            Update user
                        </h3>
                        <div class="mt-2">
                            <form action=""
                                class="space-y-2">
                                @csrf
                                <div>
                                    <label for="username"
                                        class="block text-sm font-medium text-gray-700">Username</label>
                                    <div class="mt-1">
                                        <input wire:model.defer="edit_user_name"
                                            type="text"
                                            name="username"
                                            id="username"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <x-shared.error-message name="edit_user_name" />
                                </div>
                                <div>
                                    <label for="email"
                                        class="block text-sm font-medium text-gray-700">Email</label>
                                    <div class="mt-1">
                                        <input wire:model.defer="edit_email"
                                            type="email"
                                            name="email"
                                            id="email"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <x-shared.error-message name="edit_email" />
                                </div>
                                <div>
                                    <label for="password"
                                        class="block text-sm font-medium text-gray-700">Password</label>
                                    <div class="mt-1">
                                        <input wire:model.defer="edit_password"
                                            type="password"
                                            name="password"
                                            id="password"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <x-shared.error-message name="edit_password" />

                                </div>
                                <div>
                                    <label for="role"
                                        class="block text-sm font-medium text-gray-700">Role</label>
                                    <div class="mt-1">
                                        <select wire:model.defer="edit_role"
                                            name="role"
                                            id="role"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md uppercase">
                                            <option value=""></option>
                                            @foreach ($roles as $key => $role)
                                                <option value="{{ $key }}">{{ $role }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <x-shared.error-message name="edit_role" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div
                    class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense border-t border-gray-400 pt-4">
                    <button wire:click.prevent="updateUser()"
                        type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:col-start-2 sm:text-sm">
                        Save
                    </button>
                    <button x-on:click="edit=false"
                        type="button"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
