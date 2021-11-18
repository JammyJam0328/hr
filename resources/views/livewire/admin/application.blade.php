<div>
    <div class="py-2 flex space-x-3 mb-3">
        <div class="flex space-x-2">
            <span class="mt-2">Filter : </span>
            <span class="mt-2">From </span>

            <input wire:model.debounce="from"
                type="date"
                name="from"
                id="from"
                class="p-1 rounded-md">
            <span class="mt-2">To </span>

            <input wire:model.debounce="to"
                type="date"
                name="to"
                id="to"
                class="p-1 rounded-md">

        </div>

        <div class="flex space-x-4">
            <div>
                <span class="mt-2">Status </span>
                <select wire:model.debounce="status"
                    class="rounded-md">
                    <option value="">All</option>
                    <option value="pending">Pending</option>
                    <option value="processing">Approved by Approver</option>
                    <option value="approved">Approved</option>
                    <option value="denied">Denied</option>
                </select>
            </div>
            <div>
                <span class="mt-2">Employee ID </span>
                <select wire:model.debounce="order"
                    class=" rounded-md">
                    <option value="ASC">Ascending</option>
                    <option value="DESC">Descending</option>
                </select>
            </div>

            <div>
                <span class="mt-2">Type </span>
                <select wire:model.debounce="type"
                    class=" rounded-md">
                    <option value="">All</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->description }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div>
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
                                                <span>Contact : {{ $leave->employee->contact_number }}</span>
                                                <span>Department : {{ $leave->employee->department->name }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="grid space-y-1">
                                                <span>Leave Type : {{ $leave->leaveType->description }}
                                                    ({{ $leave->leaveType->payable == true ? 'Payable' : 'Not Payable' }})</span>
                                                <span>Reason : {{ $leave->reason }}
                                                </span>

                                                <span>From : {{ $leave->start_date }} To :
                                                    {{ $leave->end_date }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @if ($leave->status == 'approved')
                                                <span class="text-green-600">Approved</span>
                                            @elseif ($leave->status == 'pending')
                                                <span class="text-orange-600">Pending</span>
                                            @elseif ($leave->status == 'denied')
                                                <span class="text-red-600">Denied</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $leave->created_at }}
                                        </td>
                                    </tr>
                                @empty

                                @endforelse



                                <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                    <div class="py-2">
                        {{ $leaves->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
