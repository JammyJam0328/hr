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
            Add new user
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
    <x-admin.process.create-user :roles="$roles" />
    <x-admin.process.edit-user :roles="$roles" />
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 ">
                        <thead class="bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Username
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Role
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">

                                </th>
                                <th scope="col"
                                    class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Odd row -->
                            @forelse ($users as $key => $user)
                                <tr class="{{ $key % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $user->name }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                        {{ $user->role }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                                        @if ($user->is_hr)
                                            <span class="text-green-600 font-bold">Current HR</span>
                                        @else
                                            <button wire:click.prevent="setHR({{ $user->id }})"
                                                class="inline-flex items-center px-2 py-1 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                Set as HR
                                            </button>

                                        @endif
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap  text-sm font-medium flex space-x-2 justify-end">
                                        <a href="#"
                                            wire:click.prevent="edit({{ $user->id }})"
                                            class="text-yellow-400 hover:bg-yellow-600 hover:text-white p-2 rounded-md border border-yellow-400">Edit</a>
                                        <a href="#"
                                            wire:click.prevent="deleteUser({{ $user->id }})"
                                            class="text-red-600 hover:bg-red-600 hover:text-white p-2 rounded-md border border-red-600">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4"
                                        class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500 uppercase">
                                        No record
                                        found </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="py-2">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
