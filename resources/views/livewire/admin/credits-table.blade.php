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
                                 <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                     {{ $credit->leave_type->description }}
                                 </td>

                                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                     {{ $credit->used }}
                                 </td>
                                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                     {{ $credit->balance }}
                                 </td>
                                 <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                     <div class="flex space-x-2">
                                         <button
                                             class="p-1 rounded-md border bg-red-500 text-white text-xl font-bold">-</button>
                                         <button
                                             class="p-1 rounded-md border bg-green-500 text-white text-xl font-bold">+</button>
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
