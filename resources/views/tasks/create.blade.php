
<div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-xl shadow">
    <h1 class="text-2xl font-bold mb-6">Create New Task</h1>

    <form action="{{ url('/tasks') }}" method="POST" class="space-y-5">
        @csrf

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
                value="{{ old('title') }}"
                required
                class="w-full border rounded-lg p-2"
                placeholder="Enter task title"
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
                placeholder="Enter task description"
            >{{ old('description') }}</textarea>
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
                <option value="">Select Priority</option>
                <option value="Low" {{ old('priority') == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ old('priority') == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ old('priority') == 'High' ? 'selected' : '' }}>High</option>
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
                <option value="Pending" {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="In Progress" {{ old('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Hold" {{ old('status') == 'Hold' ? 'selected' : '' }}>Hold</option>
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
                value="{{ old('due_date') }}"
                class="w-full border rounded-lg p-2"
            >
            @error('due_date')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit -->
        <button
            type="submit"
            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700"
        >
            Create Task
        </button>
    </form>
</div>

