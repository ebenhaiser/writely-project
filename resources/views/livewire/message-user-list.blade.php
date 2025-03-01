<div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Search any user you wanna chat with..."
            wire:model.live="keyword" />
    </div>
    @foreach ($users as $user)
        <a href="{{ route('messaging.with', $user->username) }}" style="color: inherit; text-decoration: none;">
            <div class="d-flex gap-3">
                <img src="{{ asset('img/profilePicture/' . ($user->profile_picture && file_exists(public_path('img/profilePicture/' . $user->profile_picture)) ? $user->profile_picture : 'default.jpg')) }}"
                    alt="" class="avatar-xxl rounded-circle border" width="40" height="40">
                <div>
                    <span style="font-weight: 700">{{ $user->name }}</span>
                    <p><i>{{ '@' . $user->username }}</i></p>
                </div>
            </div>
        </a>
    @endforeach
</div>
