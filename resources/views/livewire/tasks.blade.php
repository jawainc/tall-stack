<div>
    <h1 class="mb-20 text-2xl font-semibold">Tasks</h1>

    <div class="mb-10">



        <form wire:submit.prevent="saveTask" >
            <div>
                @if (session()->has('message'))
                    <div class="p-5 text-sm text-green-500 bg-green-100">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
          <div class="shadow sm:rounded-md sm:overflow-hidden">

            <div class="px-4 py-5 text-lg font-semibold">
                Add Task
            </div>

            <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="name" class="block mb-4 text-sm font-medium text-gray-700 rounded-md">
                    Task Name
                  </label>
                  <div class="">
                    <input wire:model="name" type="text" name="name" id="name" class="flex-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
                    @error('name')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                  </div>
                </div>
              </div>






            </div>
            <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
              <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
              </button>
            </div>
          </div>
        </form>


    </div>

    <div class="flex flex-col">

        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                      Name
                    </th>

                    <th scope="col" class="relative px-6 py-3">
                      <span class="sr-only">Edit</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($task_list as $index => $task)
                    <tr>

                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($editedTaskIndex == $index)
                                <div class="">
                                    <input wire:model.defer="tasks.{{ $index }}.name" type="text" name="name" id="name" class="flex-1 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
                                </div>
                            @else
                                <div class="text-sm text-gray-900">{{$task['name']}}</div>
                            @endif


                        </td>

                        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            @if ($editedTaskIndex == $index)
                            <button wire:click.prevent="updateTask({{$index}}) type="button" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Update
                              </button>
                              <button wire:click.prevent="cancelEdit()" type="button" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-black bg-white border border-gray-200 rounded-md shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Cancel
                              </button>
                            @else
                                <a wire:click.prevent="setEdit({{$index}})" href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            @endif

                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
