@foreach ($users as $user)
<div id="modalEdit{{ $user->id }}" class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
  <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

  <div class="modal-container bg-white dark:bg-gray-800 w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

    <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
      <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
      </svg>
      <span class="text-sm">(Esc)</span>
    </div>

    <!-- Add margin if you want to see some of the overlay behind the modal-->
    <div class="modal-content py-4 text-left px-6">
      <!--Title-->
      <div class="flex justify-between items-center pb-3">
        <p class="text-2xl font-bold">Edit Status</p>
        <div class="modal-close cursor-pointer z-50">
          <svg class="fill-current text-black dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
          </svg>
        </div>
      </div>

      <!--Body-->
      <form action="{{ route('users.update', $user->id) }}" method="post">
        <label class="mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Status User
          </span>
          <h1>{{$user->name}}</h1>
          @csrf
          @method('patch')
          @if ($user->status == 'active')
          <select name="category" required class="w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <option value="active" selected>Active</option>
            <option value="inactive">Inactive</option>
          </select>
          @else if ($user->status == 'inactive')
          <select name="category" required class="w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <option value="active">Active</option>
            <option value="inactive" selected>Inactive</option>
          </select>
          @endif
        </label>

        <!--Footer-->
        <div class="flex justify-end pt-2">
          <button type="submit" class="px-4 bg-transparent p-3 rounded-lg text-purple-600 hover:bg-gray-200 hover:text-purple-600 dark:hover:bg-gray-900 mr-2">Action</button>
          <button class="modal-close px-4 bg-purple-600 p-3 rounded-lg text-white hover:bg-purple-700">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach