<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('quiz_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Quiz" format="csv" />
                <livewire:excel-export model="Quiz" format="xlsx" />
                <livewire:excel-export model="Quiz" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.quiz.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.quiz.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                            {{ trans('cruds.quiz.fields.slug') }}
                            @include('components.table.sort', ['field' => 'slug'])
                        </th>
                        <th>
                            {{ trans('cruds.quiz.fields.description') }}
                            @include('components.table.sort', ['field' => 'description'])
                        </th>
                        <th>
                            {{ trans('cruds.quiz.fields.questions') }}
                            @include('components.table.sort', ['field' => 'questions_count'])
                        </th>
                        <th>
                            {{ trans('cruds.quiz.fields.published') }}
                            @include('components.table.sort', ['field' => 'published'])
                        </th>
                        <th>
                            {{ trans('cruds.quiz.fields.public') }}
                            @include('components.table.sort', ['field' => 'public'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($quizzes as $quiz)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $quiz->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $quiz->id }}
                            </td>
                            <td>
                                {{ $quiz->title }}
                            </td>
                            <td>
                                {{ $quiz->slug }}
                            </td>
                            <td>
                                {{ $quiz->description }}
                            </td>
                            <td>
                                <a href="{{ route('questions.index') }}?quiz_id={{ $quiz->id }}">{{ $quiz->questions_count }}</a>
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $quiz->published ? 'checked' : '' }}>
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $quiz->public ? 'checked' : '' }}>
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('quiz_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('quizzes.show', $quiz) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('quiz_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('quizzes.edit', $quiz) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('quiz_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $quiz->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $quizzes->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush
