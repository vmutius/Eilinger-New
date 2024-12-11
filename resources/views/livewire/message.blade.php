<div class="post-comments">
    <p class="meta">{{ $message->created_at->diffForHumans() }} <a href="#">{{ $message->user->username }}</a>
        says : <i class="pull-right">
            @if (!$message->main_message_id)
                <button wire:click="$toggle('isReplying')" type="button" class="btn btn-success btn-sm">{{__('message.reply')}}</button>
            @endif

            @can ('update', $message)
                <button wire:click="$toggle('isEditing')" type="button" class="btn btn-primary btn-sm">{{__('message.edit')}}
                </button>
            @endcan

            @can ('destroy', $message)
                <button type="button"
                        class="btn btn-danger btn-sm"
                        x-on:click="confirmMessageDeletion"
                        x-data="{
                    confirmMessageDeletion () {
                       const message = this.$el.getAttribute('data-confirm-message');
                        if (window.confirm(message)) {
                            @this.call('deleteMessage')
                        }
                    }
                }"
                        data-confirm-message="{{ __('message.confirmDelete') }}"
                >{{ __('message.delete') }}
                </button>
            @endcan
        </i>
    </p>
    @if ($isEditing)
        <form wire:submit="editMessage">
            <div class="blog-comment">
                <textarea wire:model="body" id="textareaID" class="form-control"></textarea>

                @error('body')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <br/>
            <div class="col-md-12 text-end">
                <button class="btn btn-colour-1" type="submit">
                    <span class="align-middle d-sm-inline-block d-none">{{__('message.editMessage')}}</span>
                </button>
            </div>
        </form>
    @else
        {{ $message->body }}
    @endif
    @if ($isReplying)
        <form wire:submit="postReply">
            <div class="blog-comment">
                <textarea wire:model="body" id="textareaID" class="form-control"></textarea>

                @error('body')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <br/>
            <div class="col-md-12 text-end">
                <button class="btn btn-colour-1" type="submit">
                    <span class="align-middle d-sm-inline-block d-none">{{__('message.saveReply')}}</span>
                </button>
            </div>
        </form>
    @endif
    <div>
        @foreach ($message->replies as $reply)
            <ul class="comments">
                <li class="clearfix">
                    @livewire('message', ['message' => $reply],  key('reply-'.$reply->id))
                </li>
            </ul>
        @endforeach
    </div>
</div>
