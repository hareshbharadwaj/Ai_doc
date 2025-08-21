<x-layout>
    <x-slot name="title">Register - {{ config('app.name') }}</x-slot>
    <x-slot name="pageTitle">Join Us Today</x-slot>
    <x-slot name="pageSubtitle">Create your account and start your journey</x-slot>

    <div class="row">
        <div class="col-md-6" style="margin: 0 auto;">
            <div class="card slide-up">
                <div class="card-header text-center">
                    <h2 class="mb-0">
                        <i class="fas fa-user-plus text-success"></i> Create Account
                    </h2>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                            <strong>Please fix the following errors:</strong>
                            <ul class="mt-2 mb-0" style="padding-left: 1.5rem;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('register') }}" method="POST" id="registerForm">
                        @csrf
                        
                        <div class="form-group">
                            <label for="name" class="form-label">
                                <i class="fas fa-user"></i> Full Name
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   value="{{ old('name') }}" 
                                   required 
                                   autocomplete="name"
                                   placeholder="Enter your full name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

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
                                       autocomplete="new-password"
                                       placeholder="Create a strong password">
                                <button type="button" 
                                        id="togglePassword" 
                                        style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; color: var(--secondary-color);">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="password-strength mt-2" id="passwordStrength"></div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">
                                <i class="fas fa-lock"></i> Confirm Password
                            </label>
                            <input type="password" 
                                   id="password_confirmation" 
                                   name="password_confirmation" 
                                   class="form-control" 
                                   required 
                                   autocomplete="new-password"
                                   placeholder="Confirm your password">
                            <div id="passwordMatch" class="mt-2"></div>
                        </div>

                        <button type="submit" class="btn btn-success" data-original-text="Create Account">
                            <i class="fas fa-user-plus"></i> Create Account
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <div style="border-top: 1px solid var(--border-color); margin: 1.5rem 0; position: relative;">
                            <span style="background: white; padding: 0 1rem; position: absolute; top: -0.75rem; left: 50%; transform: translateX(-50%); color: var(--secondary-color);">
                                or register with
                            </span>
                        </div>
                        
                        <form action="{{ route('google.login') }}" method="GET" style="margin-bottom: 1rem;">
                            <button type="submit" class="btn" style="background: #db4437; color: white; width: 100%;">
                                <i class="fab fa-google"></i> Register with Google
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <p class="mb-0">
                        Already have an account? 
                        <a href="{{ route('show.login') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">
                            Login here
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

            // Password strength checker
            document.getElementById('password').addEventListener('input', function() {
                const password = this.value;
                const strengthDiv = document.getElementById('passwordStrength');
                const strength = checkPasswordStrength(password);
                
                strengthDiv.innerHTML = `
                    <div style="display: flex; gap: 2px; margin-bottom: 0.5rem;">
                        <div style="height: 4px; flex: 1; background: ${strength.score >= 1 ? strength.color : '#e2e8f0'}; border-radius: 2px;"></div>
                        <div style="height: 4px; flex: 1; background: ${strength.score >= 2 ? strength.color : '#e2e8f0'}; border-radius: 2px;"></div>
                        <div style="height: 4px; flex: 1; background: ${strength.score >= 3 ? strength.color : '#e2e8f0'}; border-radius: 2px;"></div>
                        <div style="height: 4px; flex: 1; background: ${strength.score >= 4 ? strength.color : '#e2e8f0'}; border-radius: 2px;"></div>
                    </div>
                    <small style="color: ${strength.color};">${strength.text}</small>
                `;
            });

            // Password confirmation checker
            document.getElementById('password_confirmation').addEventListener('input', function() {
                const password = document.getElementById('password').value;
                const confirmation = this.value;
                const matchDiv = document.getElementById('passwordMatch');
                
                if (confirmation === '') {
                    matchDiv.innerHTML = '';
                    return;
                }
                
                if (password === confirmation) {
                    matchDiv.innerHTML = '<small style="color: var(--success-color);"><i class="fas fa-check"></i> Passwords match</small>';
                } else {
                    matchDiv.innerHTML = '<small style="color: var(--danger-color);"><i class="fas fa-times"></i> Passwords do not match</small>';
                }
            });

            function checkPasswordStrength(password) {
                let score = 0;
                let text = 'Very Weak';
                let color = '#ef4444';
                
                if (password.length >= 8) score++;
                if (/[a-z]/.test(password)) score++;
                if (/[A-Z]/.test(password)) score++;
                if (/[0-9]/.test(password)) score++;
                if (/[^A-Za-z0-9]/.test(password)) score++;
                
                switch (score) {
                    case 0:
                    case 1:
                        text = 'Very Weak';
                        color = '#ef4444';
                        break;
                    case 2:
                        text = 'Weak';
                        color = '#f59e0b';
                        break;
                    case 3:
                        text = 'Fair';
                        color = '#eab308';
                        break;
                    case 4:
                        text = 'Good';
                        color = '#22c55e';
                        break;
                    case 5:
                        text = 'Strong';
                        color = '#10b981';
                        break;
                }
                
                return { score, text, color };
            }

            // Form validation
            document.getElementById('registerForm').addEventListener('submit', function(e) {
                const password = document.getElementById('password').value;
                const confirmation = document.getElementById('password_confirmation').value;
                
                if (password !== confirmation) {
                    e.preventDefault();
                    showAlert('Passwords do not match.', 'danger');
                    return;
                }
                
                if (password.length < 8) {
                    e.preventDefault();
                    showAlert('Password must be at least 8 characters long.', 'danger');
                    return;
                }
            });
        </script>
    </x-slot>
</x-layout>