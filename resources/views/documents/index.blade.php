<x-layout>
    <x-slot name="title">Document Templates - {{ config('app.name') }}</x-slot>
    <x-slot name="pageTitle">Document Creator</x-slot>
    <x-slot name="pageSubtitle">Choose from our professional templates to create your documents</x-slot>

    <div class="row mb-4">
        <div class="col text-right">
            <a href="{{ route('documents.my') }}" class="btn btn-secondary">
                <i class="fas fa-folder-open"></i> My Documents
            </a>
        </div>
    </div>

    <div class="row">
        @foreach($templates as $template)
            <div class="col-md-4">
                <div class="card template-card" style="height: 100%;">
                    <div class="card-body text-center" style="display: flex; flex-direction: column;">
                        <div style="flex-grow: 1;">
                            <div style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <h3 class="mb-3">{{ $template['name'] }}</h3>
                            <p class="text-muted mb-4">{{ $template['desc'] }}</p>
                        </div>
                        
                        <div>
                            <a href="{{ route('documents.' . $template['id']) }}" 
                               class="btn btn-primary template-btn">
                                <i class="fas fa-arrow-right"></i> Choose Template
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row mt-5">
        <div class="col">
            <div class="card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none;">
                <div class="card-body text-center">
                    <h3 class="mb-3">
                        <i class="fas fa-lightbulb"></i> Need Help Getting Started?
                    </h3>
                    <p class="mb-4">Our document templates are designed to help you create professional documents quickly and easily. Each template comes with customizable fields and professional formatting.</p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <i class="fas fa-edit" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                                <h5>1. Choose Template</h5>
                                <p style="font-size: 0.9rem; opacity: 0.9;">Select from our collection of professional templates</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <i class="fas fa-cogs" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                                <h5>2. Customize</h5>
                                <p style="font-size: 0.9rem; opacity: 0.9;">Fill in your details and customize the content</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <i class="fas fa-download" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                                <h5>3. Download</h5>
                                <p style="font-size: 0.9rem; opacity: 0.9;">Generate and download your professional PDF</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            // Add hover effects to template cards
            document.querySelectorAll('.template-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px)';
                    this.style.boxShadow = '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = 'var(--shadow)';
                });
            });

            // Add click animation to template buttons
            document.querySelectorAll('.template-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    // Create ripple effect
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.cssText = `
                        position: absolute;
                        width: ${size}px;
                        height: ${size}px;
                        left: ${x}px;
                        top: ${y}px;
                        background: rgba(255, 255, 255, 0.3);
                        border-radius: 50%;
                        transform: scale(0);
                        animation: ripple 0.6s linear;
                        pointer-events: none;
                    `;
                    
                    this.style.position = 'relative';
                    this.style.overflow = 'hidden';
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });

            // Add CSS for ripple animation
            const style = document.createElement('style');
            style.textContent = `
                @keyframes ripple {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        </script>
    </x-slot>
</x-layout>