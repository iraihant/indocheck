<div>
    <div class="grid gap-6 mb-6">
        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h4 class="card-title dark:text-white">Users List</h4>
            </div>
            <div class="p-6">
              <div class="overflow-auto">
                 <div class="min-w-full inline-block align-middle">
                     <div class="overflow-hidden">
                         <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                             <thead>
                                 <tr>
                                     <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-gray-300">Username</th>
                                     <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-gray-300">Email</th>
                                     <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-gray-300">Balance</th>
                                     <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-gray-300">Role</th>
                                     <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500 dark:text-gray-300">Action</th>
                                 </tr>
                             </thead>
                             <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($users as $user)
                                <tr class="{{ $user->isBanned() ? 'bg-red-400/40 text-white' : '' }}">
                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200"> {{ $user->name }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">{{ $user->email }}</td>
                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">{{ $user->balance }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">Member</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">
                                        <button type="button" class="btn {{ $user->isBanned() ? 'bg-primary' : 'bg-danger' }}  text-white" wire:click='bannedUser({{$user->id}})'>
                                            {{ $user->isBanned() ? 'Unbanned' : 'Banned' }}
                                        </button>
                                        
                                    </td>
                                </tr>
                                @empty
                                    <tr colspan='5' class="text-center">
                                        <td>Not Found Transaction</td>
                                    </tr>
                                @endforelse
                               



                             </tbody>
                         </table>
                         <div class="mt-4">
                             {{-- {{ $trans->links() }} --}}
                         </div>
                     </div>
                 </div>
             </div>

          </div>

        </div>
    </div>
</div>
