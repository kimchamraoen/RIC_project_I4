<div class="container mt-5">
    <h2 class="text-center">Login</h2>

    <!-- Display success or error messages -->
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent='login' class="justify-content-center font-bold">
        <div class="mb-3 w-100">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input wire:model='email' type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input wire:model='password' type="password" class="form-control" id="exampleInputPassword1">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <div class="mb-3 text-center">
            <label for="exampleCheck1">Don't have an account?</label>
            <a href="/register">Sign Up</a>
        </div>
    </form>
</div>