<div>
    <x-title-menu :title="'Payment'" :subtitle="['Transaction', 'Payment']"></x-title-menu>
    <div class="flex flex-col lg:flex-row md:flex-row gap-4">
        <div class="w-full lg:w-1/2 md:w-1/2">
            <div class="card mt-4">
                <div class="p-6">
                    <h3 class="card-title">Payment</h3>
                    <div class="pt-5">
                        <div class="flex flex-col lg:flex-row md:flex-row gap-12">
                            <div class="w-full lg:w-1/2 md:w-1/2">
                                <div class="text-gray-500 mb-5">
                                    <h5 class="text-base">Transaction ID. </h5>
                                    <p>{{ $trans->transactions_id }}</p>
                                </div>
                                <div class="text-gray-500 mb-5">
                                    <h5 class="text-base">Date Transaction. </h5>
                                    @php
                                        $timestamp = strtotime($trans->created_at);
                                        $date_formatted = date("D, d M Y", $timestamp);
                                    @endphp
                                    <p>{{ $date_formatted }}</p>
                                </div>
                                
                                <div class="text-gray-500 mb-5">
                                    <h5 class="text-base">Service. </h5>
                                    <p>{{ $trans->service->service_name }} Credits</p>
                                </div>

                                <div class="text-gray-500 mb-5">
                                    <h5 class="text-base">Status Payment. </h5>
                                        @if($trans->status == 0)
                                        <p class="btn bg-warning uppercase text-white">pending</p>
                                    @endif
                                    @if($trans->status == -1)
                                        <p class="btn bg-danger uppercase text-white">failed</p>
                                    @endif
                                    @if($trans->status == 1)
                                        <p class="btn bg-success uppercase text-white">success</p>
                                    @endif
                                </div>
                            </div>
                            <div class="w-full lg:w-1/2 md:w-1/2">
                                <div class="text-gray-500 mb-5">
                                    <h5 class="text-base">Payment Method. </h5>
                                    <p>QRIS</p>
                                </div>
                                <div class="text-gray-500 mb-5">
                                    <h5 class="text-base">Address. </h5>
                                    <p class="">A/n CheckerinAja</p>
                                    <p>Scan This QR Code</p>
                                    <img src="{{ asset('./qrQris.jpg') }}" alt="ALAMAT" class="img-fluid" width="200" height="200">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/2 md:w-1/2">
            <div class="card mt-4">
                <div class="p-6">
                    <h3 class="card-title"></h3>
                    <h4 class="text-center text-muted text-bold text-uppercase text-lg mb-2"> How to Top Up Credits ?</h4>
                    <ol class="list-decimal list-inside" role="list">
                        <li>Choose credit amount.</li>
                        <li>Select the payment method (QRIS).</li>
                        <li>Click "Deposit Now."</li>
                        <li>Review the displayed transaction details.</li>
                        <li>Scan the QRIS and enter the correct amount.</li>
                        <li>Upload the payment proof.</li>
                        <li>Confirm the transaction.</li>
                        <li>Check the credit balance to ensure a successful top-up.</li>
                        <li>Save the transaction proof as a reference.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
</div>