<div>
   <x-title-menu :title="'Dashboard'" :subtitle="['Dashboard']"></x-title-menu>
   <div class="grid xl:grid-cols-2 lg:grid-cols-2 grid-cols-1 gap-6 mb-6">
      <div class="card">
          <div class="p-6">
              <h3 class="card-title">Time</h3>
              <div class="flex items-center">
                  <div x-data="clockComponent()" x-init="init()" class="mx-auto">
                     <h1 class="text-5xl my-3 py-0.5 text-center" x-text="time"></h1>
                     <h1 class="text-lg my-3 py-0.5 text-center" x-text="date"></h1>
               </div>
              </div>
          </div>
          <!-- end p-6 -->
      </div>
   
      <div class="card">
          <div class="p-6">
              <h3 class="card-title">Redeem Voucher</h3>
               <div class="mt-5">
                  @if(session('success'))
                  <div class="bg-success/10 text-success   border border-success/20 text-sm rounded-md py-3 px-5" role="alert">
                     <span class="font-bold">Success</span> - {{ session('success') }}
                  </div>
                  @elseif(session('error'))
                  <div class="bg-danger/10 text-danger border border-danger/20 text-sm rounded-md py-3 px-5" role="alert">
                     <span class="font-bold">Error</span> - {{ session('error') }}
                  </div>
                  @endif
                  <x-input-error :messages="$errors->all()" class="mt-2" />
                  <form wire:submit='redeemVoucher' class="mt-2">
                     <div class="flex flex-col">
                        <div class="mb-5">
                              <input type="text" class="form-input" placeholder="IDCHK-XXXX-XXXX-XXXX" wire:model='voucher'>
                        </div>
                        <div>
                              <button type="submit" class="btn bg-primary text-white "wire:loading.attr='disabled'>Submit</button>
                        </div>
                     </div>
                  </form>
            </div>
          </div> <!-- end row-->
      </div> <!-- end p-6 -->
   </div> <!-- end card -->
   
   <div class="grid gap-6 mb-6">
      <div class="card">
          <div class="card-header flex justify-between items-center">
              <h4 class="card-title">History Vouchers</h4>
          </div>
          <div class="p-6">
            <button wire:click="showAlert">Show Alert</button>
            {{-- <livewire:dashboard.voucherTable-dashboard> --}}
        </div>
   
      </div>
   </div>
</div>
<script>
   
   function clockComponent() {
      
      return {
            time: '',
            date: '',
            init() {
               this.updateDateTime();
               setInterval(() => {
                  this.updateDateTime();
               }, 1000);
            },
            updateDateTime() {
               const now = new Date();
               this.time = now.toTimeString().split(' ')[0];
               this.date = now.toLocaleDateString('en-GB', {
                  day: 'numeric',
                  month: 'long',
                  year: 'numeric'
               });
            }
      };
   }
</script>
