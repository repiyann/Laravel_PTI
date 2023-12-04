@extends('admin.app')

@section('content')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
  Users
</h2>
<div class="mb-8">
  <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
      <table class="w-full table-auto">
        <thead>
          <tr class="text-xl font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">User</th>
            <th class="px-4 py-3">Email</th>
            <th class="px-4 py-3">Status</th>
            <th class="px-4 py-3">Actions</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          @forelse ($users as $user)
          <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3">
              <div class="flex items-center text-base">
                <!-- <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block"> -->
                <!-- <img src="" class="object-cover w-full h-full rounded-full" /> -->
                <!-- <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div> -->
                <!-- </div> -->
                <div>
                  <p class="font-semibold">{{ $user->name }}</p>
                </div>
              </div>
            </td>
            <td class="px-4 py-3 text-base">
              {{ $user->email }}
            </td>
            @if ($user->status == 'active')
            <td class="px-4 py-3 text-base">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                Active
              </span>
            </td>
            @else
            <td class="px-4 py-3 text-base">
              <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                Inactive
              </span>
            </td>
            @endif
            <td class="px-4 py-3">
              <div class="flex items-center space-x-4 text-sm">
                <a href="javascript:void(0)" data-target="#modalEdit{{ $user->id }}" data-id="{{ $user->id }}" class="modal-open flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                  </svg>
                </a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                  </button>
              </div>
              </form>
              @include('admin/modal-edit')
            </td>
            @empty
            <td colspan=5>
              <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block text-center">
                  <strong class="font-bold justify-center">Database Empty!</strong>
                </span>
                <span class="block sm:inline text-center">Table not yet filled!</span>
              </div>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    {{ $users->links() }}
  </div>
</div>
@endsection