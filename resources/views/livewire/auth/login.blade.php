<div>
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
    </div>
    <form class="user" wire:submit.prevent='login'>
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
                id="exampleInputPassword" placeholder="Password">
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        {{-- <div class="form-group">
            <div class="custom-control custom-checkbox small">
                <input type="checkbox" class="custom-control-input" id="customCheck">
                <label class="custom-control-label" for="customCheck">Remember
                    Me</label>
            </div>
        </div> --}}
        <button type="submit" class="btn btn-primary btn-user btn-block">
            LOGIN
        </button>
        <hr>
    </form>
    <div class="text-center">
        <a href="/register">or register</a>
    </div>
</div>
