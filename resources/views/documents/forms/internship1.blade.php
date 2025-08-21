<x-layout>
    <x-slot name="title">Edit Internship Certificate - {{ config('app.name') }}</x-slot>
    <x-slot name="pageTitle">Customize Your Certificate</x-slot>
    <x-slot name="pageSubtitle">Fill in the details to create your personalized internship certificate</x-slot>

    <div class="row">
        <div class="col-md-8" style="margin: 0 auto;">
            <div class="card slide-up">
                <div class="card-header">
                    <h3 class="mb-0">
                        <i class="fas fa-edit text-primary"></i> Edit Internship Certificate
                    </h3>
                    <p class="mb-0 mt-2" style="color: var(--secondary-color);">
                        Complete the form below to generate your professional internship certificate
                    </p>
                </div>
                <div class="card-body">
                    <form action="{{ route('documents.preview', 'internship1') }}" method="POST" id="certificateForm">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">
                                        <i class="fas fa-user"></i> Full Name *
                                    </label>
                                    <input type="text" 
                                           id="name" 
                                           name="name" 
                                           class="form-control" 
                                           value="{{ $formData['name'] ?? '' }}" 
                                           required
                                           placeholder="Enter the intern's full name">
                                    <small class="text-muted">This will appear as the main recipient on the certificate</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role" class="form-label">
                                        <i class="fas fa-briefcase"></i> Role/Position *
                                    </label>
                                    <input type="text" 
                                           id="role" 
                                           name="role" 
                                           class="form-control" 
                                           value="{{ $formData['role'] ?? '' }}" 
                                           required
                                           placeholder="e.g., Software Developer Intern">
                                    <small class="text-muted">The internship position or role title</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="company" class="form-label">
                                <i class="fas fa-building"></i> Company/Organization *
                            </label>
                            <input type="text" 
                                   id="company" 
                                   name="company" 
                                   class="form-control" 
                                   value="{{ $formData['company'] ?? '' }}" 
                                   required
                                   placeholder="Enter the company or organization name">
                            <small class="text-muted">The name of the organization providing the internship</small>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="start_date" class="form-label">
                                        <i class="fas fa-calendar-alt"></i> Start Date *
                                    </label>
                                    <input type="date" 
                                           id="start_date" 
                                           name="start_date" 
                                           class="form-control" 
                                           value="{{ $formData['start_date'] ?? '' }}" 
                                           required>
                                    <small class="text-muted">Internship start date</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date" class="form-label">
                                        <i class="fas fa-calendar-check"></i> End Date *
                                    </label>
                                    <input type="date" 
                                           id="end_date" 
                                           name="end_date" 
                                           class="form-control" 
                                           value="{{ $formData['end_date'] ?? '' }}" 
                                           required>
                                    <small class="text-muted">Internship completion date</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="issue_date" class="form-label">
                                        <i class="fas fa-calendar"></i> Issue Date *
                                    </label>
                                    <input type="date" 
                                           id="issue_date" 
                                           name="issue_date" 
                                           class="form-control" 
                                           value="{{ $formData['issue_date'] ?? date('Y-m-d') }}" 
                                           required>
                                    <small class="text-muted">Certificate issue date</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="card" style="background: #f8f9fa; border: 1px solid var(--border-color);">
                                <div class="card-body">
                                    <h6 class="mb-3">
                                        <i class="fas fa-info-circle text-info"></i> Certificate Preview
                                    </h6>
                                    <p class="mb-2" style="font-size: 0.9rem;">
                                        <strong>Certificate Text:</strong> "This is to certify that <strong id="preview-name">{{ $formData['name'] ?? '[Name]' }}</strong> 
                                        has successfully completed their internship as <strong id="preview-role">{{ $formData['role'] ?? '[Role]' }}</strong> 
                                        at <strong id="preview-company">{{ $formData['company'] ?? '[Company]' }}</strong>."
                                    </p>
                                    <p style="font-size: 0.9rem; color: var(--secondary-color);">
                                        The certificate will include professional formatting, signature lines, and the dates you specify above.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('documents.interntemp') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to Templates
                                </a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-success" data-original-text="Preview Certificate">
                                    <i class="fas fa-eye"></i> Preview Certificate
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            // Real-time preview updates
            function updatePreview() {
                const name = document.getElementById('name').value || '[Name]';
                const role = document.getElementById('role').value || '[Role]';
                const company = document.getElementById('company').value || '[Company]';
                
                document.getElementById('preview-name').textContent = name;
                document.getElementById('preview-role').textContent = role;
                document.getElementById('preview-company').textContent = company;
            }

            // Add event listeners for real-time preview
            ['name', 'role', 'company'].forEach(fieldId => {
                document.getElementById(fieldId).addEventListener('input', updatePreview);
            });

            // Date validation
            document.getElementById('start_date').addEventListener('change', function() {
                const startDate = new Date(this.value);
                const endDateField = document.getElementById('end_date');
                const endDate = new Date(endDateField.value);
                
                if (endDate && startDate >= endDate) {
                    showAlert('Start date must be before end date.', 'warning');
                    endDateField.focus();
                }
            });

            document.getElementById('end_date').addEventListener('change', function() {
                const endDate = new Date(this.value);
                const startDateField = document.getElementById('start_date');
                const startDate = new Date(startDateField.value);
                
                if (startDate && endDate <= startDate) {
                    showAlert('End date must be after start date.', 'warning');
                    this.focus();
                }
            });

            // Form validation
            document.getElementById('certificateForm').addEventListener('submit', function(e) {
                const requiredFields = ['name', 'role', 'company', 'start_date', 'end_date', 'issue_date'];
                let isValid = true;
                
                requiredFields.forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (!field.value.trim()) {
                        field.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        field.classList.remove('is-invalid');
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    showAlert('Please fill in all required fields.', 'danger');
                    return;
                }
                
                // Date validation
                const startDate = new Date(document.getElementById('start_date').value);
                const endDate = new Date(document.getElementById('end_date').value);
                
                if (startDate >= endDate) {
                    e.preventDefault();
                    showAlert('Start date must be before end date.', 'danger');
                    return;
                }
            });

            // Auto-fill current date for issue date if empty
            document.addEventListener('DOMContentLoaded', function() {
                const issueDateField = document.getElementById('issue_date');
                if (!issueDateField.value) {
                    const today = new Date().toISOString().split('T')[0];
                    issueDateField.value = today;
                }
            });

            // Character counter for text fields
            ['name', 'role', 'company'].forEach(fieldId => {
                const field = document.getElementById(fieldId);
                const maxLength = fieldId === 'company' ? 100 : 50;
                
                field.addEventListener('input', function() {
                    const remaining = maxLength - this.value.length;
                    let counter = this.parentElement.querySelector('.char-counter');
                    
                    if (!counter) {
                        counter = document.createElement('small');
                        counter.className = 'char-counter text-muted';
                        this.parentElement.appendChild(counter);
                    }
                    
                    counter.textContent = `${remaining} characters remaining`;
                    counter.style.color = remaining < 10 ? 'var(--warning-color)' : 'var(--secondary-color)';
                });
            });
        </script>
    </x-slot>
</x-layout>