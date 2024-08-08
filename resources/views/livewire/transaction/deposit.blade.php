<div>
    <x-title-menu :title="'Deposit'" :subtitle="['Transaction', 'Deposit']"></x-title-menu>
    <div class="flex flex-col lg:flex-row md:flex-row gap-4">
        <div class="w-full lg:w-2/4 md:w-2/4">
            <div class="card mt-4">
                <div class="p-6">
                    <h3 class="card-title">Deposit</h3>
                    <div class="pt-5">
                        <span class="py-2 px-2 bg-info text-white rounded">
                            Your Credit : {{ Auth::user()->balance }}
                        </span>
                        <form wire:submit='save' class="mt-3">
                            <div class="mb-3">
                                <label for="service" class="mb-2">Service</label>
                                <select class="form-select" id="service" name="service" wire:model.change="selectedService" wire.model='service'>
                                    <option value="" selected>-- SELECT SERVICE --</option>
                                    @foreach ($services as $s)
                                        <option value="{{ $s->id }}">{{ $s->service_name }} Credit</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="mb-2">Price</label>
                                <span class="block text-lg px-5">Rp {{ number_format($price, 0, ',', '.') }}</span>
    
                            </div>
                            <div class="mb-3">
                                <label for="payment" class="col-md-3 col-form-label">Payment</label>
                                <div class="flex flex-col md:flex-row lg:flex-row mt-2">
                                    <div>
                                        <input type="checkbox" class="hidden peer" id="pay" name="paymentMethod" wire:model="paymentMethod" value="qris">
                                        <label for="pay" class="transition ease-in-out text-center text-gray-500 border border-gray-300 hover:bg-gray-300 rounded px-4 py-4 peer-checked:bg-blue-500 peer-checked:border-sky-400 peer-checked:text-white cursor-pointer">
                                            <i class="ri-money-dollar-box-line mb-1 block text-lg"></i> QRIS
                                        </label>
                                        {{-- @error('paymentMethod') <span class="text-danger">{{ $message }}</span> @enderror --}}
                                    </div>
                                    
                                </div>
    
                            </div>
                            <button type="submit" class="btn bg-primary text-white w-full" wire:loading.attr='disabled'>Deposit Now</button> <!-- end button -->
                        </form> <!-- end form -->
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-2/4 md:w-2/4">
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


