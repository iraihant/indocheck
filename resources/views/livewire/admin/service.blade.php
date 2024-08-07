<div class="flex flex-col gap-4">
    <div class="w-full lg:w-2/4 md:w-2/4">
        <div class="card mt-4">
            <div class="p-6">
                <h3 class="card-title"> Create Service</h3>
                <div class="pt-5">
                    <form wire:submit='save'>
                        <div class="mb-3">
                            <label for="qty" class="mb-2">Service</label>
                            <input type="number" class="form-input" id="qty" wire:model='form.serviceItem'>
                        </div>
                        <div class="mb-3">
                            <label for="qty" class="mb-2">Price</label>
                            <input type="number" class="form-input" id="qty" wire:model='form.price'>
                        </div>
                        <button type="submit" class="btn bg-primary text-white" wire:loading.attr='disabled'>Submit</button> <!-- end button -->
                    </form> <!-- end form -->
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">Service List</h4>
            </div>
            <div class="p-6">
                <div class="overflow-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500">Service</th>
                                        <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500">Price</th>
                                        <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500">Status</th>
                                        <th scope="col" class="text-start text-sm font-medium text-gray-500">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @forelse ($service as $ser)

                                        <tr>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200">{{$ser->service_name}}</td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">{{ $ser->price }}</td>
                                            <td class="px-4 py-2 my-auto mt-2 whitespace-nowrap text-sm uppercase text-white btn  {{ ($ser->status == false) ? ' bg-danger' : 'bg-success' }}">{{ ($ser->status == false) ? 'INACTIVE' : 'ACTIVE' }}</td>
                                            <td class="whitespace-nowrap text-sm dark:text-gray-200">
                                                <button  type="button" wire:click='ChangeService({{ $ser->id }})' class="btn {{ ($ser->status == true) ?"bg-danger" : "bg-success"}} text-white rounded-full">

                                                    {{ ($ser->status == true) ? "Deactivated" : "Activated" }}</button>

                                                <button type="button" wire:click='delete({{ $ser->id }})' class="btn bg-danger text-white mx-2"><i class="ri-delete-bin-fill text-sm"></i></button>

                                            </td>
                                        </tr>

                                        @empty
                                        <tr>
                                            <td colspan="4" class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200 text-center">DATA SERVICE TIDAK ADA</td>
                                        </tr>
                                    @endforelse




                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
