<div class="card">
    <div class="card-body">
        <div>{{ $user->level->name }}</div>
        <div class="truncate t1">
            <h4 class="m0">{{ $user->lastname }}, {{ $user->name }}</h4>
        </div>
        <div>{{ $user->email }}</div>
        
        <div class="buttons mt20">
            <a href="{{ route('user.edit', $user) }}" class="btn btn-sm btn-primary" title="Editar usuario">
                <x-Icon name="edit" color="#FFF" size="18" />
            </a>
            @if($user->id !== user()->id)
                <form action="{{ route('user.destroy', $user) }}" method="post" id="form-user-{{ $user->id }}" class="di">
                    @csrf @method('delete')
                    <button type="button" class="btn btn-sm btn-danger" onclick="delete_user('form-user-{{ $user->id }}');" title="Eliminar usuario">
                        <x-Icon name="remove" color="#FFF" size="18" />
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>