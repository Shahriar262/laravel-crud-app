
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="max-w-6xl mx-auto px-6 py-10">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    My Tasks
                </h1>
                <p class="text-gray-500 mt-1">
                    Manage and track your tasks
                </p>
            </div>

            <a href="{{ url('/tasks/create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg">
                + Create Task
            </a>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Task Count -->
        <div class="bg-white rounded-xl shadow-sm p-5 mb-6">
            <p class="text-gray-500 text-sm">Total Tasks</p>

            <h2 class="text-3xl font-bold text-gray-800">
                {{ $tasks->count() }}
            </h2>
        </div>

        <!-- Task Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

            @forelse ($tasks as $task)

                <div class="bg-white rounded-xl shadow-sm p-6">

                    <!-- Title and Priority -->
                    <div class="flex justify-between items-start mb-4 gap-3">

                        <h2 class="text-lg font-semibold text-gray-800">
                            {{ $task->title }}
                        </h2>

                        <span class="text-xs font-medium px-3 py-1 rounded-full whitespace-nowrap
                            {{ $task->priority == 'High' ? 'bg-red-100 text-red-700' : ($task->priority == 'Medium' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700') }}">
                            {{ $task->priority }}
                        </span>

                    </div>

                    <!-- Description -->
                    <p class="text-gray-600 text-sm mb-5">
                        {{ $task->description ?? 'No description provided.' }}
                    </p>

                    <!-- Task Details -->
                    <div class="border-t pt-4 space-y-3 text-sm">

                        <div class="flex justify-between">
                            <span class="text-gray-500">Status</span>

                            <span class="font-medium text-gray-800">
                                {{ $task->status }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-500">Due Date</span>

                            <span class="font-medium text-gray-800">
                                {{ $task->due_date ?? 'Not set' }}
                            </span>
                        </div>

                    </div>

                    <!-- Action Buttons -->
                    <div class="border-t mt-5 pt-4 flex justify-end gap-2">

                        <!-- Edit Button -->
                        <a
                            href="{{ url('/tasks/' . $task->id . '/edit') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm"
                        >
                            Edit
                        </a>

                        <!-- Delete Form -->
                        <form
                            action="{{ url('/tasks/' . $task->id) }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this task?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm"
                            >
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <!-- Empty State -->
                <div class="col-span-full bg-white rounded-xl p-10 text-center">

                    <h2 class="text-xl font-semibold text-gray-700">
                        No tasks found
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Create your first task to get started.
                    </p>

                    <a
                        href="{{ url('/tasks/create') }}"
                        class="inline-block mt-5 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg"
                    >
                        Create Task
                    </a>

                </div>

            @endforelse

        </div>

    </div>

</body>
</html>
