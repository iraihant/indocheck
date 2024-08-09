<div>
    <x-title-menu :title="'History Transaction'" :subtitle="['Transaction', 'History']"></x-title-menu>
    <div class="grid gap-6 mb-6">
        <div class="card">
            <div class="p-6">
              <div class="overflow-auto">
                 <div class="min-w-full inline-block align-middle">
                     <div class="overflow-hidden">
                         <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                             <thead>
                                 <tr>
                                     <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-gray-300">Trx ID</th>
                                     <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-gray-300">Date</th>
                                     <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-gray-300">Status</th>
                                     <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-gray-300">Service</th>
                                     <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-gray-300">Total Amount</th>
                                     <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-gray-300">Action</th>




                                 </tr>
                             </thead>
                             <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($trans as $tr)
                                <tr>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200"> {{ $tr->transactions_id }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">@php
                                                    $timestamp = strtotime($tr->created_at);
                $date_formatted = date("D, d M Y", $timestamp);
                                                @endphp
                                                {{ $date_formatted }}</td>
                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">@if($tr->status == 0)
                                                    <p class="my-auto py-2 bg-warning text-center text-white text-uppercase rounded-full">PENDING</p>
                                                @endif
                                                @if($tr->status == -1)
                                                <p class="my-auto py-2 bg-danger text-center text-white text-uppercase rounded-full">FAILED</p>
                                                @endif
                                                @if($tr->status == 1)
                                                <p class="my-auto py-2 bg-success text-center text-white text-uppercase rounded-full">SUCCESS</p>
                                                @endif</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">{{ $tr->service->service_name }} Credits</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">@php
                                        $rupiah = "Rp " . number_format($tr->total_amount,2,',','.');

                                    @endphp
                                    {{ $rupiah }}</td>


                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200"> <a href="{{ route('trans_payment', $tr->transactions_id) }}" wire:navigate class="btn bg-info text-white"><i class="ri-external-link-line mr-2"></i>Details</a></td>

                                </tr>
                                @empty
                                    <tr colspan='5' class="text-center">
                                        <td>Not Found Transaction</td>
                                    </tr>
                                @endforelse
                               



                             </tbody>
                         </table>
                         <div class="mt-4">
                             {{ $trans->links() }}
                         </div>
                     </div>
                 </div>
             </div>

          </div>

        </div>
    </div>
</div>
