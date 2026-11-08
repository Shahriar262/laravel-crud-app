
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-xl shadow">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">
                Edit Task
            </h1>

            <a href="{{ url('/') }}" class="text-blue-600 hover:underline">
                Back to Tasks
            </a>
        </div>

        <form action="{{ url('/tasks/' . $task->id) }}" method="POST" class="space-y-5">

            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label for="title" class="block font-medium mb-2">
                    Title
                </label>

                <input
                    type="text"
                    name="title"
                    id="title"
                    maxlength="100"
                    value="{{ old('title', $task->title) }}"
                    required
                    class="w-full border rounded-lg p-2"
                >

                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block font-medium mb-2">
                    Description
                </label>

                <textarea
                    name="description"
                    id="description"
                    maxlength="500"
                    rows="4"
                    class="w-full border rounded-lg p-2"
                >{{ old('description', $task->description) }}</textarea>

                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Priority -->
            <div>
                <label for="priority" class="block font-medium mb-2">
                    Priority
                </label>

                <select
                    name="priority"
                    id="priority"
                    required
                    class="w-full border rounded-lg p-2"
                >
                    <option value="Low" {{ old('priority', $task->priority) == 'Low' ? 'selected' : '' }}>Low</option>
                    <option value="Medium" {{ old('priority', $task->priority) == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="High" {{ old('priority', $task->priority) == 'High' ? 'selected' : '' }}>High</option>
                </select>

                @error('priority')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block font-medium mb-2">
                    Status
                </label>

                <select
                    name="status"
                    id="status"
                    required
                    class="w-full border rounded-lg p-2"
                >
                    <option value="Pending" {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="In Progress" {{ old('status', $task->status) == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Completed" {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Hold" {{ old('status', $task->status) == 'Hold' ? 'selected' : '' }}>Hold</option>
                </select>

                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Due Date -->
            <div>
                <label for="due_date" class="block font-medium mb-2">
                    Due Date
                </label>

                <input
                    type="date"
                    name="due_date"
                    id="due_date"
                    value="{{ old('due_date', $task->due_date) }}"
                    class="w-full border rounded-lg p-2"
                >

                @error('due_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg"
            >
                Update Task
            </button>

        </form>
    </div>

</body>
</html>
