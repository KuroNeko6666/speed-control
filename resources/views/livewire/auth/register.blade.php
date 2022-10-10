<div>
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
    </div>
    <form class="user" wire:submit.prevent='register'>
        <div class="form-group">
            <input wire:model='name' type="name" class="form-control form-control-user @error('name') is-invalid @enderror"
                id="exampleInputname" aria-describedby="nameHelp"
                placeholder="Enter name Address...">
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <input wire:model='email' type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                id="exampleInputEmail" aria-describedby="emailHelp"
                placeholder="Enter Email Address...">
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <input wire:model='password' type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                id="exampleInputpassword" aria-describedby="passwordHelp"
                placeholder="Enter password Address...">
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block">
            Register Account
        </button>

    </form>
    <hr>
    <div class="text-center">
        <a class="small" href="/login">Already have an account? Login!</a>
    </div>
</div>
