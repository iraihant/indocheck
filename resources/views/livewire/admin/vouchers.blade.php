<div class="flex flex-col gap-4">
    <div class="w-full lg:w-2/4 md:w-2/4">
        @if(session('error'))
        <div id="error" class="border bg-danger/10 text-danger border-danger/20 rounded py-3 px-5 flex justify-between items-center">
            <p>
                <span class="font-bold">Error  </span> {{ session('error') }}!
            </p>
            <button class="text-xl/[0]" data-fc-dismiss="error" type="button">
                <i class="ri-close-line text-xl"></i>
            </button> <!-- button end -->
        </div>

    @endif
    @if(session('success'))
    <div class="bg-success/10 text-success   border border-success/20 text-sm rounded-md py-3 px-5" role="alert">
        <span class="font-bold">Success</span> - {{ session('success') }}
    </div>
    @endif
    <x-input-error :messages="$errors->all()" class="mt-2" />

        <div class="card mt-4">
            <div class="p-6">
                <h3 class="card-title"> Create Voucher</h3>
                <div class="pt-5">
                    {{-- <form wire:submit='submit_service'>
                        <div class="mb-3">
                            <label for="service" class="mb-2">Service</label>
                            <select class="form-select" id="service" name="service" wire:model='serviceSelect'>
                                <option value="" selected>-- SELECT SERVICE --</option>
                                @foreach ($service as $s)
                                    <option value="{{ $s->id }}">{{ $s->service_name }} Cree</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="qty" class="mb-2">Qty</label>
                            <input type="number" class="form-input" id="qty" wire:model='qty'>
                        </div>
                        <button type="submit" class="btn bg-primary text-white" wire:loading.attr='disabled'>Submit</button> <!-- end button -->
                    </form> <!-- end form --> --}}
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">Vouchers List</h4>
            </div>
            <div class="p-6">
                <div data-fc-type="tab">

                    <nav class="relative z-0 flex border rounded-xl overflow-hidden dark:border-gray-600" aria-label="Tabs" role="tablist">
                        <button data-fc-target="#bar-with-underline-1" type="button" class="fc-tab-active:border-b-primary fc-tab-active:text-gray-900 dark:fc-tab-active:text-white relative min-w-0 flex-1 bg-white first:border-l-0 border-l border-b-2 py-4 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 dark:bg-gray-800 dark:border-l-gray-700 dark:border-b-gray-700 dark:hover:bg-gray-700 dark:hover:text-gray-400 active" id="bar-with-underline-item-1" aria-controls="bar-with-underline-1" role="tab">
                            UnRedeem
                        </button> <!-- button-end -->
                        <button data-fc-target="#bar-with-underline-2" type="button" class="fc-tab-active:border-b-primary fc-tab-active:text-gray-900 dark:fc-tab-active:text-white relative min-w-0 flex-1 bg-white first:border-l-0 border-l border-b-2 py-4 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 dark:bg-gray-800 dark:border-l-gray-700 dark:border-b-gray-700 dark:hover:bg-gray-700 dark:hover:text-gray-400" id="bar-with-underline-item-2" aria-controls="bar-with-underline-2" role="tab">
                            Redeemed
                        </button> <!-- button-end -->
                    </nav> <!-- nav-end -->

                    <div class="mt-3">
                        <div id="bar-with-underline-1" role="tabpanel" aria-labelledby="bar-with-underline-item-1" class="active">
                            <div class="overflow-auto">
                                <div class="min-w-full inline-block align-middle">
                                    <div class="overflow-hidden">
                                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500">Created At</th>
                                                    <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500">Voucher Code</th>
                                                    <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500">Service</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                                {{-- @foreach ($vouchers as $vocUnRed)
                                                    @if($vocUnRed->redeemed_at == null)
                                                    <tr>
                                                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200">{{$vocUnRed->created_at}}</td>
                                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">{{ $vocUnRed->code }}</td>
                                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">{{ $vocUnRed->metadata['credits'] }} Credits</td>
                                                    </tr>

                                                    @endif
                                                @endforeach --}}



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- bar-with-underline-1 end -->

                        <div id="bar-with-underline-2" class="hidden" role="tabpanel" aria-labelledby="bar-with-underline-item-2">
                            <div class="overflow-auto">
                                <div class="min-w-full inline-block align-middle">
                                    <div class="overflow-hidden">
                                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500">Created At</th>
                                                    <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500">Voucher Code</th>
                                                    <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500">Service</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                                {{-- @foreach ($vouchers as $vocUnRed)
                                                    @if($vocUnRed->redeemed_at != null)
                                                    <tr>
                                                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200">{{$vocUnRed->created_at}}</td>
                                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">{{ $vocUnRed->code }}</td>
                                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">{{ $vocUnRed->metadata['credits'] }} Credits</td>
                                                    </tr>

                                                    @endif
                                                @endforeach --}}



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- bar-with-underline-2 end -->
                        <div class="mt-4">
                             <!-- Pagination links -->
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
