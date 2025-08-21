<x-layout>
    <x-slot name="title">Home - {{ config('app.name') }}</x-slot>
    <x-slot name="pageTitle">Welcome to Our Platform</x-slot>
    <x-slot name="pageSubtitle">Your gateway to document management and more</x-slot>

    <div class="row">
        <div class="col-md-6">
            <div class="card fade-in">
                <div class="card-body text-center">
                    <i class="fas fa-rocket" style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;"></i>
                    <h3 class="mb-3">Get Started</h3>
                    <p class="mb-4">Join our platform and start managing your documents efficiently with our powerful tools.</p>
                    
                    @guest
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('show.login') }}" class="btn btn-primary mb-2">
                                    <i class="fas fa-sign-in-alt"></i> Login
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('show.register') }}" class="btn btn-outline">
                                    <i class="fas fa-user-plus"></i> Register
                                </a>
                            </div>
                        </div>
                    @endguest
                    
                    @auth
                        <a href="{{ route('documents.index') }}" class="btn btn-success">
                            <i class="fas fa-file-alt"></i> View Documents
                        </a>
                    @endauth
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card fade-in">
                <div class="card-body">
                    <h3 class="mb-3">
                        <i class="fas fa-star text-warning"></i> Features
                    </h3>
                    <ul style="list-style: none; padding: 0;">
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success"></i>
                            <strong>Document Management:</strong> Create and manage professional documents
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success"></i>
                            <strong>Template Library:</strong> Choose from various pre-designed templates
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success"></i>
                            <strong>PDF Generation:</strong> Export your documents as high-quality PDFs
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success"></i>
                            <strong>Secure Storage:</strong> Your documents are safely stored and accessible
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @auth
        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">
                            <i class="fas fa-user-circle"></i> Welcome back, {{ Auth::user()->name }}!
                        </h4>
                    </div>
                    <div class="card-body">
                        <p>You're logged in and ready to start creating amazing documents. What would you like to do today?</p>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ route('documents.index') }}" class="btn btn-primary">
                                    <i class="fas fa-plus-circle"></i> Create New Document
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('documents.my') }}" class="btn btn-secondary">
                                    <i class="fas fa-folder-open"></i> My Documents
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="btn btn-outline">
                                    <i class="fas fa-cog"></i> Settings
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
</x-layout>