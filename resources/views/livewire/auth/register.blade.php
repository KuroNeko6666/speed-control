<div>
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
            <input wire:model='password' type="password" class="form-control form-control-user  @error('password') is-invalid @enderror"
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
            Register
        </button>
        <hr>
        <a href="index.html" class="btn btn-google btn-user btn-block">
            <i class="fab fa-google fa-fw"></i> Login with Google
        </a>
        <a href="index.html" class="btn btn-facebook btn-user btn-block">
            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
        </a>
    </form>
</div>
