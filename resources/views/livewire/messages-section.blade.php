<div class="shadow p-3 mb-5 bg-body rounded">
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="col-md-12">
        <h3>{{__('message.messages')}} </h3>

        <form wire:submit="postMessage">
            <div class="blog-comment">
                <textarea wire:model="body" id="textareaID" class="form-control"></textarea>

                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <br />
            <div class="col-md-12 text-end">
                <button class="btn btn-colour-1" type="submit">
                    <span class="align-middle d-sm-inline-block d-none">{{__('message.saveMessage')}}</span>
                </button>
            </div>
        </form>

    </div>
    <div class="blog-comment">
        <ul class="comments">
            @forelse ($messages as $message)
                <li class="clearfix">
                    @livewire('message', ['message' => $message],  key('message-'.$message->id))
                </li>

            @empty
                {{__('message.noMessages')}}
            @endforelse
        </ul>
    </div>
    {{ $messages->links('pagination::bootstrap-5') }}
</div>
