<?php

return [
    'templates' => [
        'business_proposal' => [
            'label' => 'Business Proposal',
            'view'  => 'documents.templates.business_proposal',
            'rules' => [
                'company_name' => 'required|string|max:120',
                'client_name'  => 'required|string|max:120',
                'project_title'=> 'required|string|max:160',
                'summary'      => 'required|string|max:5000',
                'amount'       => 'required|numeric|min:0',
                'start_date'   => 'required|date',
                'end_date'     => 'required|date|after_or_equal:start_date',
            ],
            'fields' => [
                ['name' => 'company_name', 'label' => 'Your Company', 'type' => 'text', 'placeholder' => 'Acme Pvt Ltd', 'required' => true],
                ['name' => 'client_name',  'label' => 'Client Name',  'type' => 'text', 'placeholder' => 'Client Co',    'required' => true],
                ['name' => 'project_title','label' => 'Project Title','type' => 'text', 'placeholder' => 'Website Revamp','required' => true],
                ['name' => 'summary',      'label' => 'Executive Summary','type' => 'textarea','placeholder' => 'Short project summary','required' => true],
                ['name' => 'amount',       'label' => 'Proposed Amount (₹)','type' => 'number','step' => '0.01', 'required' => true],
                ['name' => 'start_date',   'label' => 'Start Date',   'type' => 'date', 'required' => true],
                ['name' => 'end_date',     'label' => 'End Date',     'type' => 'date', 'required' => true],
            ],
        ],

        'invoice' => [
            'label' => 'Invoice',
            'view'  => 'documents.templates.invoice',
            'rules' => [
                'invoice_no'   => 'required|string|max:40',
                'bill_to'      => 'required|string|max:180',
                'bill_from'    => 'required|string|max:180',
                'date'         => 'required|date',
                'due_date'     => 'required|date|after_or_equal:date',
                'items'        => 'required|array|min:1',
                'items.*.desc' => 'required|string|max:180',
                'items.*.qty'  => 'required|numeric|min:1',
                'items.*.rate' => 'required|numeric|min:0',
                'notes'        => 'nullable|string|max:1000',
            ],
            'fields' => [
                ['name' => 'invoice_no', 'label' => 'Invoice #', 'type' => 'text', 'placeholder' => 'INV-2025-0001', 'required' => true],
                ['name' => 'bill_from',  'label' => 'Bill From', 'type' => 'textarea', 'placeholder' => "Your company name\nAddress\nGSTIN", 'required' => true],
                ['name' => 'bill_to',    'label' => 'Bill To', 'type' => 'textarea', 'placeholder' => "Client name\nAddress\nGSTIN", 'required' => true],
                ['name' => 'date',       'label' => 'Invoice Date', 'type' => 'date', 'required' => true],
                ['name' => 'due_date',   'label' => 'Due Date', 'type' => 'date', 'required' => true],
                // items array handled dynamically in the form blade
                ['name' => 'notes',      'label' => 'Notes', 'type' => 'textarea', 'placeholder' => 'Optional notes', 'required' => false],
            ],
        ],

        'contract' => [
            'label' => 'Contract',
            'view'  => 'documents.templates.contract',
            'rules' => [
                'party_a'    => 'required|string|max:160',
                'party_b'    => 'required|string|max:160',
                'effective'  => 'required|date',
                'terms'      => 'required|string|max:8000',
                'sign_name_a'=> 'required|string|max:80',
                'sign_name_b'=> 'required|string|max:80',
            ],
            'fields' => [
                ['name' => 'party_a', 'label' => 'Party A (Your Company)', 'type' => 'text', 'placeholder' => 'Acme Pvt Ltd', 'required' => true],
                ['name' => 'party_b', 'label' => 'Party B (Client)', 'type' => 'text', 'placeholder' => 'Client Co', 'required' => true],
                ['name' => 'effective','label' => 'Effective Date', 'type' => 'date', 'required' => true],
                ['name' => 'terms',   'label' => 'Terms', 'type' => 'textarea', 'placeholder' => 'Paste your terms...', 'required' => true],
                ['name' => 'sign_name_a', 'label' => 'Signer Name (A)', 'type' => 'text', 'required' => true],
                ['name' => 'sign_name_b', 'label' => 'Signer Name (B)', 'type' => 'text', 'required' => true],
            ],
        ],
    ],
];