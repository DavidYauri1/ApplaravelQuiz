<div>
    @auth
    <h6 class="text-sm font-bold uppercase text-blueGray-400">
        Leave a comment
    </h6>
    @endauth

    @if($success)
        <div class="relative px-6 py-4 mt-4 text-white bg-green-500 rounded border-0">
            <span class="inline-block mr-8 align-middle">
                Your comment added successfully.
            </span>
        </div>
    @endif

    <div class="mt-4">
        @foreach($comments as $comment)
            <span class="font-bold">{{ $comment->name }}</span> <span class="italic">({{ $comment->created_at }})</span>
            <p>{{ $comment->comment_text }}</p>

            @if(!$loop->last)
                <hr class="my-4 md:min-w-full">
            @endif
        @endforeach
    </div>

    @auth
        <form class="mt-4" wire:submit.prevent="submit">
            <div class="form-group {{ $errors->has('comment') ? 'invalid' : '' }}">
                <label for="comment" class="form-label required">Text</label>
                <textarea name="comment" id="comment" class="form-control" wire:model="comment"></textarea>
                @error('comment')
                    <div class="validation-message">
                        {{ $errors->first('comment') }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <button class="mr-2 btn btn-indigo" type="submit">
                    Submit comment
                </button>
            </div>
        </form>
    @endauth
</div>
