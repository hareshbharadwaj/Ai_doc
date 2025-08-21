<x-layout>
    <x-slot name="title">Login - {{ config('app.name') }}</x-slot>
    <x-slot name="pageTitle">Welcome Back</x-slot>
    <x-slot name="pageSubtitle">Sign in to your account to continue</x-slot>

    <div class="row">
        <div class="col-md-6" style="margin: 0 auto;">
            <div class="card slide-up">
                <div class="card-header text-center">
                    <h2 class="mb-0">
                        <i class="fas fa-sign-in-alt text-primary"></i> Login
                    </h2>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                            <strong>Oops!</strong> Please check the following errors:
                            <ul class="mt-2 mb-0" style="padding-left: 1.5rem;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST" id="loginForm">
                        @csrf
                        
                        <div class="form-group">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope"></i> Email Address
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   value="{{ old('email') }}" 
                                   required 
                                   autocomplete="email"
                                   placeholder="Enter your email address">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock"></i> Password
                            </label>
                            <div style="position: relative;">
                                <input type="password" 
                                       id="password" 
                                       name="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       required 
                                       autocomplete="current-password"
                                       placeholder="Enter your password">
                                <button type="button" 
                                        id="togglePassword" 
                                        style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; color: var(--secondary-color);">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary" data-original-text="Login">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <div style="border-top: 1px solid var(--border-color); margin: 1.5rem 0; position: relative;">
                            <span style="background: white; padding: 0 1rem; position: absolute; top: -0.75rem; left: 50%; transform: translateX(-50%); color: var(--secondary-color);">
                                or continue with
                            </span>
                        </div>
                        
                        <form action="{{ route('google.login') }}" method="GET" style="margin-bottom: 1rem;">
                            <button type="submit" class="btn" style="background: #db4437; color: white; width: 100%;">
                                <i class="fab fa-google"></i> Login with Google
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <p class="mb-0">
                        Don't have an account? 
                        <a href="{{ route('show.register') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">
                            Register here
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            // Toggle password visibility
            document.getElementById('togglePassword').addEventListener('click', function() {
                const passwordField = document.getElementById('password');
                const icon = this.querySelector('i');
                
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    passwordField.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });

            // Enhanced form validation
            document.getElementById('loginForm').addEventListener('submit', function(e) {
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                
                if (!email || !password) {
                    e.preventDefault();
                    showAlert('Please fill in all required fields.', 'danger');
                    return;
                }
                
                if (!isValidEmail(email)) {
                    e.preventDefault();
                    showAlert('Please enter a valid email address.', 'danger');
                    return;
                }
            });

            function isValidEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }
        </script>
    </x-slot>
</x-layout>