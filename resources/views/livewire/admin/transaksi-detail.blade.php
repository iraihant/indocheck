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
                                    <h5 class="text-base dark:text-white">Transaction ID. </h5>
                                    <p class="dark:text-gray-400">{{ $trans->transactions_id }}</p>
                                </div>
                                <div class="text-gray-500 mb-5">
                                    <h5 class="text-base dark:text-white">Date Transaction. </h5>
                                    @php
                                        $timestamp = strtotime($trans->created_at);
                                        $date_formatted = date("D, d M Y", $timestamp);
                                    @endphp
                                    <p class="dark:text-gray-400">{{ $date_formatted }}</p>
                                </div>

                                <div class="text-gray-500 mb-5">
                                    <h5 class="text-base dark:text-white">Service. </h5>
                                    <p class="dark:text-gray-400">{{ $trans->service->service_name }} Credits</p>
                                </div>

                                <div class="text-gray-500 mb-5">
                                    <h5 class="text-base dark:text-white">Total Amount. </h5>
                                    <p class="text-success "> @php
                                        $rupiah = "Rp " . number_format($trans->total_amount,0,',','.');
                                        @endphp
                                        {{ $rupiah}}</p>
                                </div>

                                <div class="text-gray-500 mb-5">
                                    <h5 class="text-base dark:text-white">Status Payment. </h5>
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
                                    <h5 class="text-base dark:text-white">Payment Method. </h5>
                                    <p class="dark:text-gray-400">QRIS</p>
                                </div>
                                @if($trans->status == 0)
                                <div class="text-gray-500 mb-5">
                                    <h5 class="text-base dark:text-white">Address. </h5>
                                    <p class="dark:text-gray-400">A/n CheckerinAja</p>
                                    <p class="dark:text-gray-400">Scan This QR Code</p>
                                    <img src="{{ asset('./qrQris.jpg') }}" alt="ALAMAT" class="img-fluid" width="200" height="200">

                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($trans->status == 0)
        <div class="w-full lg:w-1/2 md:w-1/2">
            <div class="card mt-4">
                <div class="p-6">
                    <h5 class="card-title dark:text-white">Payment Proof :</h5>
                    <div class="flex flex-col">
                        @if ($trans->proof_of_payment != null)
                        <div class="justify-self-center mt-5">
                            
                            <img src="{{ $trans->proof_of_payment }}" class="h-52 w-48 mb-5">
                        
                        </div>
                        @else
                        <div class=" justify-self-center mt-5">
                            
                            <p>Bukti Belum Di Upload, Silahkan Cek Mutasi Rekening Anda</p>
                        
                        </div>
                        @endif
                        <div class="mt-1">
                            <div class="mt-3 flex gap-3">
                                <button type="button" wire:click='submit' class="btn bg-primary text-white" wire:loading.attr='disabled'>Submit</button>
                                <button type="button" wire:click='cancelPayment' class="justify-self-end btn bg-danger text-white" wire:loading.attr='disabled'>Cancel Payment</button>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

</div>
