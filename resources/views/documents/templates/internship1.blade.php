<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Internship Certificate</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');
        
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }
        
        .document-wrapper {
            display: flex;
            gap: 20px;
            align-items: flex-start;
        }
        
        .certificate-container {
            width: 210mm;
            height: 297mm;
            background-color: white;
            padding: 20mm;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            box-sizing: border-box;
        }
        
        .action-panel {
            display: flex;
            flex-direction: column;
            gap: 10px;
            position: sticky;
            top: 20px;
        }
        
        .action-button {
            display: inline-block;
            background-color: #2563eb;
            color: white;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s;
            white-space: nowrap;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .action-button:hover {
            background-color: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            text-align: center;
            font-size: 24pt;
            font-weight: 700;
            margin-bottom: 15mm;
            text-transform: uppercase;
            color: #333;
        }
        
        p {
            font-size: 11pt;
            line-height: 1.6;
            margin-bottom: 6mm;
            text-align: left;
        }
        
        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 20mm;
        }
        
        .signature {
            width: 70mm;
        }
        
        .signature-line {
            border-top: 1px solid #333;
            width: 100%;
            margin-bottom: 2mm;
        }
        
        .signature-label {
            font-size: 10pt;
            color: #666;
        }
        
        .footer {
            position: absolute;
            bottom: 20mm;
            width: calc(100% - 40mm);
            font-size: 10pt;
            color: #666;
            text-align: center;
        }
        
        .font-semibold {
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="document-wrapper">
        <div class="certificate-container">
            <!-- Heading -->
            <h1>Internship Certificate</h1>

            <!-- Certificate Content -->
            <p>
                This is to certify that <span class="font-semibold">John Doe</span> 
                has successfully completed their internship as 
                <span class="font-semibold">Software Developer Intern</span> 
                at <span class="font-semibold">Your Company</span>.
            </p>

            <p>
                The internship was carried out from 
                <span class="font-semibold">01 Jun, 2025</span> 
                to 
                <span class="font-semibold">31 Jul, 2025</span>.
            </p>

            <p>
                During this period, <span class="font-semibold">John Doe</span> 
                demonstrated professionalism, dedication, and eagerness to learn, 
                making significant contributions to the assigned projects.
            </p>

            <!-- Signature Section -->
            <div class="signature-section">
                <div class="signature">
                    <div class="signature-line"></div>
                    <p class="signature-label">Supervisor</p>
                </div>
                <div class="signature">
                    <div class="signature-line"></div>
                    <p class="signature-label">HR / Manager</p>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                Issued on: <span class="font-semibold">18 Aug, 2025</span>
            </div>
        </div>
        
        <div class="action-panel">
            <a href="{{ route('documents.form', 'internship1') }}" 
               class="action-button">
               Edit / Generate Your Own
            </a>
        </div>
    </div>
</body>
</html>