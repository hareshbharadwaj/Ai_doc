<x-layout>
    <x-slot name="title">Internship Templates - {{ config('app.name') }}</x-slot>
    <x-slot name="pageTitle">Internship Certificate Templates</x-slot>
    <x-slot name="pageSubtitle">Choose from our professional internship certificate designs</x-slot>

    <div class="row mb-4">
        <div class="col">
            <nav style="background: rgba(255, 255, 255, 0.1); padding: 1rem; border-radius: var(--border-radius); margin-bottom: 2rem;">
                <a href="{{ route('documents.index') }}" style="color: white; text-decoration: none;">
                    <i class="fas fa-arrow-left"></i> Back to Templates
                </a>
                <span style="color: rgba(255, 255, 255, 0.7); margin: 0 0.5rem;">></span>
                <span style="color: white;">Internship Templates</span>
            </nav>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col text-right">
            <a href="{{ route('documents.my') }}" class="btn btn-secondary">
                <i class="fas fa-folder-open"></i> My Documents
            </a>
        </div>
    </div>

    <div class="row">
        @foreach($templates as $template)
            <div class="col-md-6">
                <div class="card template-preview-card" style="height: 100%;">
                    <div class="card-body" style="display: flex; flex-direction: column;">
                        <div style="flex-grow: 1;">
                            <div class="template-preview" style="border: 2px solid var(--border-color); border-radius: var(--border-radius); overflow: hidden; margin-bottom: 1rem; background: #f8f9fa;">
                                <img src="{{ $template['image'] }}" 
                                     alt="{{ $template['name'] }}"
                                     style="width: 100%; height: 300px; object-fit: contain; background: white;">
                            </div>
                            <h4 class="mb-3 text-center">{{ $template['name'] }}</h4>
                            <p class="text-muted text-center mb-4">{{ $template['desc'] ?? 'Professional internship certificate template' }}</p>
                        </div>
                        
                        <div class="text-center">
                            <a href="{{ route('documents.template', $template['id']) }}" 
                               class="btn btn-outline mb-2" 
                               style="width: 100%;">
                                <i class="fas fa-eye"></i> Preview Template
                            </a>
                            <a href="{{ route('documents.form', $template['id']) }}" 
                               class="btn btn-primary" 
                               style="width: 100%;">
                                <i class="fas fa-edit"></i> Use This Template
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row mt-5">
        <div class="col">
            <div class="card" style="background: rgba(255, 255, 255, 0.1); color: white; border: 1px solid rgba(255, 255, 255, 0.2);">
                <div class="card-body">
                    <h4 class="mb-3">
                        <i class="fas fa-info-circle"></i> About Internship Certificates
                    </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h6><i class="fas fa-check-circle text-success"></i> What's Included:</h6>
                            <ul style="list-style: none; padding-left: 0;">
                                <li><i class="fas fa-dot-circle" style="font-size: 0.5rem; margin-right: 0.5rem;"></i> Professional formatting</li>
                                <li><i class="fas fa-dot-circle" style="font-size: 0.5rem; margin-right: 0.5rem;"></i> Customizable fields</li>
                                <li><i class="fas fa-dot-circle" style="font-size: 0.5rem; margin-right: 0.5rem;"></i> High-quality PDF output</li>
                                <li><i class="fas fa-dot-circle" style="font-size: 0.5rem; margin-right: 0.5rem;"></i> Signature placeholders</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6><i class="fas fa-lightbulb text-warning"></i> Perfect For:</h6>
                            <ul style="list-style: none; padding-left: 0;">
                                <li><i class="fas fa-dot-circle" style="font-size: 0.5rem; margin-right: 0.5rem;"></i> HR departments</li>
                                <li><i class="fas fa-dot-circle" style="font-size: 0.5rem; margin-right: 0.5rem;"></i> Educational institutions</li>
                                <li><i class="fas fa-dot-circle" style="font-size: 0.5rem; margin-right: 0.5rem;"></i> Training organizations</li>
                                <li><i class="fas fa-dot-circle" style="font-size: 0.5rem; margin-right: 0.5rem;"></i> Corporate internship programs</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            // Add hover effects to template preview cards
            document.querySelectorAll('.template-preview-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                    this.style.boxShadow = '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)';
                    
                    const img = this.querySelector('img');
                    if (img) {
                        img.style.transform = 'scale(1.05)';
                        img.style.transition = 'transform 0.3s ease';
                    }
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = 'var(--shadow)';
                    
                    const img = this.querySelector('img');
                    if (img) {
                        img.style.transform = 'scale(1)';
                    }
                });
            });

            // Add loading states for buttons
            document.querySelectorAll('a[href*="template"], a[href*="form"]').forEach(link => {
                link.addEventListener('click', function() {
                    const originalText = this.innerHTML;
                    this.innerHTML = '<span class="spinner"></span> Loading...';
                    this.style.pointerEvents = 'none';
                    
                    // Restore after 3 seconds as fallback
                    setTimeout(() => {
                        this.innerHTML = originalText;
                        this.style.pointerEvents = 'auto';
                    }, 3000);
                });
            });
        </script>
    </x-slot>
</x-layout>