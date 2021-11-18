<div>
    <div>
        <div class="py-5">
            <h1 class="font-bold">LIST OF ALL PENDING LEAVE APPLICATIONS</h1>
        </div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Employee
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Leave Details
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Application Date
                                    </th>
                                    <th scope="col"
                                        class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($leaves as $key=>$leave)
                                    <!-- Odd row -->
                                    <tr class="{{ $key % 2 == 0 ? 'bg-gray-100' : 'bg-white' }}">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <div class="grid space-y-1">
                                                <span>Employee : {{ $leave->employee->firstname }}
                                                    {{ $leave->employee->middlename }}.
                                                    {{ $leave->employee->lastname }}</span>

                                                <span>Address : {{ $leave->employee->address }}</span>
                                                <span>Contact : {{ $leave->employee->contact }}</span>
                                                <span>Department : {{ $leave->employee->department->name }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="grid space-y-1">
                                                <span>Leave Type : {{ $leave->leaveType->description }}
                                                    ({{ $leave->leaveType->payable == true ? 'Payable' : 'Not Payable' }})</span>
                                                <span>Reason : {{ $leave->reason }}
                                                </span>

                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $leave->status }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $leave->created_at }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#"
                                                wire:click.prevent="approved('{{ $leave->id }}')"
                                                class="text-blue-600 hover:text-blue-900">Approve</a> |
                                            <a href="#"
                                                wire:click.prevent="deny('{{ $leave->id }}')"
                                                class="text-red-600 hover:text-red-900">Deny</a>
                                        </td>
                                    </tr>
                                @empty

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
