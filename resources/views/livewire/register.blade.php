<div class="container mt-5">
    <h2 class="text-center">Register</h2>
    <form wire:submit.prevent='submit' class="justify-content-center font-bold">
        @csrf
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Name</label>
            <input wire:model='name' type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
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
        <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
            <input wire:model='confirm_password' type="password" class="form-control" id="exampleInputPassword2">
            @error('confirm_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
         <div class="mb-3 text-center">
            <label for="text">Have an account Ready!</label>
            <a href="/login">Sign In</a>
        </div>
    </form>
</div>