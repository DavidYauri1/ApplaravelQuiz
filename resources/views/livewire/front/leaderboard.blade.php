<div>
    <div class="form-group">
        <select class="p-3 w-full text-sm leading-5 rounded border-0 shadow text-blueGray-500" wire:model="quizId">
            <option value="0">--- all quizzes ---</option>
            @foreach($quizzes as $quiz)
                <option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
            @endforeach
        </select>
    </div>

    <table class="table mt-4 w-full table-view">
        <thead>
            <tr>
                <th class="w-9"></th>
                <th class="w-1/2">Username</th>
                <th>Correct answers</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                @if ($loop->index < 100 || $loop->last || (auth()->check() && $user->name == auth()->user()->name))
                    <tr @if (auth()->check() && $user->name == auth()->user()->name) class="bg-blueGray-300" @endif>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->correct }} / {{ $total_questions }}
                            (time: {{ intval($user->time_spent / 60) }}:{{ gmdate('s', $user->time_spent) }} minutes)</td>
                    </tr>
                @endif
            @empty
                <tr>
                    <td colspan="3">No results.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
