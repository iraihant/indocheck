<div>
    <div class="grid gap-6 mb-6">
        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title dark:text-white">Transaction List</h4>
            </div>
            <div class="p-6">
              <div class="overflow-auto">
                 <div class="min-w-full inline-block align-middle">
                     <div class="overflow-hidden">
                         <div class="p-6">
                            <div data-fc-type="tab">

                                <nav class="relative z-0 flex border rounded-xl overflow-hidden dark:border-gray-600" aria-label="Tabs" role="tablist">
                                    <button data-fc-target="#bar-with-underline-1" type="button" class="fc-tab-active:border-b-warning fc-tab-active:text-gray-900 dark:fc-tab-active:text-white fc-tab-active:bg-warning/70 relative min-w-0 flex-1 bg-warning/30 first:border-l-0 border-l border-b-2 py-4 px-4 text-gray-700 hover:text--700 text-sm font-medium text-center overflow-hidden hover:bg-warning/50 focus:z-10 dark:bg-warning/30 dark:border-l-gray-700 dark:border-b-gray-700 dark:hover:bg-warning/50 dark:hover:text-gray-300 dark:fc-tab-active:border-b-warning dark:text-white active" id="bar-with-underline-item-1" aria-controls="bar-with-underline-1" role="tab">
                                        PENDING
                                    </button> <!-- button-end -->
                                    <button data-fc-target="#bar-with-underline-2" type="button" class="fc-tab-active:border-b-success fc-tab-active:text-gray-900 dark:fc-tab-active:text-white fc-tab-active:bg-success/70 relative min-w-0 flex-1 bg-success/30 first:border-l-0 border-l border-b-2 py-4 px-4 text-gray-700 hover:text--700 text-sm font-medium text-center overflow-hidden hover:bg-success/50 focus:z-10 dark:bg-success/30 dark:border-l-gray-700 dark:border-b-gray-700 dark:hover:bg-success/50 dark:hover:text-gray-300 dark:fc-tab-active:border-b-success dark:text-white" id="bar-with-underline-item-2" aria-controls="bar-with-underline-2" role="tab">
                                        SUCCESS
                                    </button> <!-- button-end -->
                                    <button data-fc-target="#bar-with-underline-3" type="button" class="fc-tab-active:border-b-danger fc-tab-active:text-gray-900 dark:fc-tab-active:text-white fc-tab-active:bg-danger/70 relative min-w-0 flex-1 bg-danger/30 first:border-l-0 border-l border-b-2 py-4 px-4 text-gray-700 hover:text--700 text-sm font-medium text-center overflow-hidden hover:bg-danger/50 focus:z-10 dark:bg-danger/30 dark:border-l-gray-700 dark:border-b-gray-700 dark:hover:bg-danger/50 dark:hover:text-gray-300 dark:fc-tab-active:border-b-danger dark:text-white" id="bar-with-underline-item-3" aria-controls="bar-with-underline-3" role="tab">
                                        FAILED
                                    </button> <!-- button-end -->
                                </nav> <!-- nav-end -->

                                <div class="mt-3">
                                    <div id="bar-with-underline-1" role="tabpanel" aria-labelledby="bar-with-underline-item-1" class="active">
                                        <div class="overflow-auto mt-5">
                                            <div class="min-w-full inline-block align-middle">
                                                <div class="overflow-hidden">
                                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-white">Trx ID</th>
                                                                <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-white">Date</th>
                                                                <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-white">Username</th>
                                                                <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-white">Service</th>
                                                                <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-white">Amount</th>
                                                                <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-white">Action</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            
                                                            @foreach ($pending as $pen)
                                                                
                                                                <tr>
                                                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200">{{$pen->transactions_id}}</td>
                                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">@php
                                                                    $timestamp = strtotime($pen->created_at);
                                $date_formatted = date("D, d M Y", $timestamp);
                                                                @endphp
                                                                {{ $date_formatted }}</td>
                                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">{{ $pen->user->name }}</td>
                                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">{{ $pen->service->service_name }}</td>
                                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">@php
                                                                    $rupiah = "Rp " . number_format($pen->total_amount,2,',','.');
                            
                                                                @endphp
                                                                {{ $rupiah }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200"> <a href="{{ route('admin.transaksiDetail', $pen->transactions_id) }}" wire:navigate class="btn bg-info text-white"><i class="ri-external-link-line mr-2"></i>Details</a></td>



                                                                </tr>
            
                                                               
                                                            @endforeach
            
            
            
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="mt-4">
                                                    {{ $pending->links() }}
                                               </div>
                                            </div>
                                        </div>
                                    </div> <!-- bar-with-underline-1 end -->

                                    <div id="bar-with-underline-2" class="hidden" role="tabpanel" aria-labelledby="bar-with-underline-item-2">
                                        <div class="overflow-auto mt-5">
                                            <div class="min-w-full inline-block align-middle">
                                                <div class="overflow-hidden">
                                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-white">Trx ID</th>
                                                                <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-white">Date</th>
                                                                <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-white">Username</th>
                                                                <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-white">Service</th>
                                                                <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-white">Amount</th>
                                                                <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-white">Action</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            
                                                            @foreach ($success as $succ)
                                                                
                                                                <tr>
                                                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200">{{$succ->transactions_id}}</td>
                                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">@php
                                                                    $timestamp = strtotime($succ->created_at);
                                $date_formatted = date("D, d M Y", $timestamp);
                                                                @endphp
                                                                {{ $date_formatted }}</td>
                                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">{{ $succ->user->name }}</td>
                                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">{{ $succ->service->service_name }}</td>
                                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">@php
                                                                    $rupiah = "Rp " . number_format($succ->total_amount,2,',','.');
                            
                                                                @endphp
                                                                {{ $rupiah }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200"> <a href="{{ route('admin.transaksiDetail', $succ->transactions_id) }}" wire:navigate class="btn bg-info text-white"><i class="ri-external-link-line mr-2"></i>Details</a></td>



                                                                </tr>
            
                                                               
                                                            @endforeach
            
            
            
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="mt-4">
                                                    {{ $success->links() }}
                                               </div>
                                            </div>
                                        </div>
                                    </div> <!-- bar-with-underline-2 end -->

                                    <div id="bar-with-underline-3" class="hidden" role="tabpanel" aria-labelledby="bar-with-underline-item-3">
                                        <div class="overflow-auto mt-5">
                                            <div class="min-w-full inline-block align-middle">
                                                <div class="overflow-hidden">
                                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-white">Trx ID</th>
                                                                <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-white">Date</th>
                                                                <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-white">Username</th>
                                                                <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-white">Service</th>
                                                                <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-white">Amount</th>
                                                                <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-white">Action</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            
                                                            @foreach ($failed as $fail)
                                                                
                                                                <tr>
                                                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200">{{$fail->transactions_id}}</td>
                                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">@php
                                                                    $timestamp = strtotime($fail->created_at);
                                $date_formatted = date("D, d M Y", $timestamp);
                                                                @endphp
                                                                {{ $date_formatted }}</td>
                                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">{{ $fail->user->name }}</td>
                                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">{{ $fail->service->service_name }}</td>
                                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">@php
                                                                    $rupiah = "Rp " . number_format($fail->total_amount,2,',','.');
                            
                                                                @endphp
                                                                {{ $rupiah }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200"> <a href="{{ route('admin.transaksiDetail', $fail->transactions_id) }}" wire:navigate class="btn bg-info text-white"><i class="ri-external-link-line mr-2"></i>Details</a></td>



                                                                </tr>
            
                                                               
                                                            @endforeach
            
            
            
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="mt-4">
                                                    {{ $failed->links() }}
                                               </div>
                                            </div>
                                        </div>
                                    </div> <!-- bar-with-underline-3 end -->
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
