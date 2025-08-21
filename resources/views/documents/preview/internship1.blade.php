<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Internship Certificate</title>
    <style>
        @page {
            size: A4;
            margin: 0;
        }
        body {
            font-family: 'Helvetica', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            background-color: #f5f5f5;
            min-height: 100vh;
        }
        .document-wrapper {
            display: flex;
            gap: 30px;
            padding: 20px;
            max-width: 1200px;
            width: 100%;
        }
        .certificate-container {
            width: 210mm;
            min-height: 297mm;
            background-color: white;
            padding: 20mm;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            box-sizing: border-box;
        }
        .action-panel {
            display: flex;
            flex-direction: column;
            gap: 15px;
            position: sticky;
            top: 20px;
            padding: 15px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            height: fit-content;
        }
        .action-button {
            display: inline-block;
            color: white;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        .edit-button {
            background-color: #2563eb;
        }
        .edit-button:hover {
            background-color: #1d4ed8;
            transform: translateY(-1px);
        }
        .download-button {
            background-color: #059669;
        }
        .download-button:hover {
            background-color: #047857;
            transform: translateY(-1px);
        }
        h1 {
            text-align: center;
            font-size: 24pt;
            margin-bottom: 20mm;
            text-transform: uppercase;
        }
        p {
            font-size: 12pt;
            margin-bottom: 8mm;
        }
        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 30mm;
        }
        .signature {
            width: 70mm;
        }
        .signature-line {
            border-top: 1px solid #000;
            width: 100%;
            margin-bottom: 2mm;
        }
        .footer {
            position: absolute;
            bottom: 20mm;
            width: calc(100% - 40mm);
            text-align: center;
            font-size: 10pt;
        }
        .font-semibold {
            font-weight: bold;
        }
        
        /* Print styles to hide action panel */
        @media print {
            .action-panel {
                display: none !important;
            }
            body {
                background-color: white;
            }
            .document-wrapper {
                padding: 0;
                display: block;
            }
            .certificate-container {
                box-shadow: none;
                margin: 0;
                padding: 20mm;
                width: 210mm;
                height: 297mm;
                page-break-after: always;
            }
        }
        
        /* PDF generation specific styles */
        .pdf-mode .action-panel {
            display: none;
        }
        .pdf-mode body {
            background-color: white;
        }
        .pdf-mode .document-wrapper {
            padding: 0;
            display: block;
        }
        .pdf-mode .certificate-container {
            box-shadow: none;
            margin: 0;
            padding: 20mm;
            width: 210mm;
            height: 297mm;
        }
    </style>
</head>
<body>
    <div class="document-wrapper">
        <div class="certificate-container" id="interncertificate">
            <h1>Internship Certificate</h1>

            <p>
                This is to certify that <span class="font-semibold">{{ $formData['name'] ?? 'John Doe' }}</span> 
                has successfully completed their internship as 
                <span class="font-semibold">{{ $formData['role'] ?? 'Software Developer Intern' }}</span> 
                at <span class="font-semibold">{{ $formData['company'] ?? 'Your Company' }}</span>.
            </p>

            <p>
                The internship was carried out from 
                <span class="font-semibold">{{ isset($formData['start_date']) ? date('d M, Y', strtotime($formData['start_date'])) : '01 Jun, 2025' }}</span> 
                to 
                <span class="font-semibold">{{ isset($formData['end_date']) ? date('d M, Y', strtotime($formData['end_date'])) : '31 Jul, 2025' }}</span>.
            </p>

            <p>
                During this period, <span class="font-semibold">{{ $formData['name'] ?? 'John Doe' }}</span> 
                demonstrated professionalism, dedication, and eagerness to learn, 
                making significant contributions to the assigned projects.
            </p>

            <div class="signature-section">
                <div class="signature">
                    <div class="signature-line"></div>
                    <p>Supervisor</p>
                </div>
                <div class="signature">
                    <div class="signature-line"></div>
                    <p>HR / Manager</p>
                </div>
            </div>

            <div class="footer">
                Issued on: <span class="font-semibold">
                    {{ isset($formData['issue_date']) ? date('d M, Y', strtotime($formData['issue_date'])) : date('d M, Y') }}
                </span>
            </div>
        </div>
        
        <div class="action-panel">
            <a href="{{ route('documents.form', 'internship1') }}?edit=true" 
               class="action-button edit-button">
               Edit Certificate
            </a>
            <a href="{{ route('documents.download', 'internship1') }}" 
               class="action-button download-button">
               Download PDF
            </a>
        </div>
    </div>
    
    <script>
        // Function to check if we're in PDF generation mode
        function isPdfGeneration() {
            return window.location.search.indexOf('pdf=1') !== -1;
        }
        
        // Add PDF mode class if needed
        if (isPdfGeneration()) {
            document.body.classList.add('pdf-mode');
        }
    </script>
</body>
</html>