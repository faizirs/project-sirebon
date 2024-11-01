<div class="container">
    <h2>Ganti Password</h2>

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('password.ganti') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="old_password">Password Lama</label>
            <input type="password" name="old_password" class="form-control" required>
            @error('old_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="new_password">Password Baru</label>
            <input type="password" name="new_password" class="form-control" required>
            @error('new_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="new_password_confirmation">Konfirmasi Password Baru</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Ganti Password</button>
    </form>
</div>