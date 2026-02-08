<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            line-height: 1.6; 
            color: #333;
            background-color: #f5f5f5;
        }
        .wrapper { background-color: #f5f5f5; padding: 20px; }
        .container { 
            max-width: 600px; 
            margin: 0 auto; 
            background: white;
            border-radius: 12px; 
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .header { 
            background: linear-gradient(135deg, #7c3aed 0%, #06b6d4 100%); 
            color: white; 
            padding: 40px 30px;
            text-align: center;
        }
        .header h1 { 
            font-size: 28px; 
            margin-bottom: 5px;
            font-weight: 700;
        }
        .header p {
            font-size: 14px;
            opacity: 0.95;
            margin: 0;
        }
        .content { 
            padding: 40px 30px; 
        }
        .greeting {
            font-size: 16px;
            margin-bottom: 20px;
            color: #555;
        }
        .info-grid {
            display: table;
            width: 100%;
            margin: 30px 0;
        }
        .info-row {
            display: table-row;
        }
        .info-label {
            display: table-cell;
            padding: 12px 15px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
            font-weight: 600;
            color: #7c3aed;
            width: 120px;
        }
        .info-value {
            display: table-cell;
            padding: 12px 15px;
            background-color: #ffffff;
            border-bottom: 1px solid #e9ecef;
            color: #555;
        }
        .message-section {
            margin: 30px 0;
        }
        .message-label {
            font-weight: 700;
            color: #2d3748;
            font-size: 14px;
            margin-bottom: 12px;
            display: block;
        }
        .message-text { 
            background: linear-gradient(135deg, #f8f9fa 0%, #f0f4ff 100%);
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #7c3aed;
            white-space: pre-wrap;
            word-wrap: break-word;
            color: #333;
            line-height: 1.7;
        }
        .action-box {
            background: linear-gradient(135deg, #ede9fe 0%, #dbeafe 100%);
            border: 1px solid #ddd6fe;
            border-radius: 8px;
            padding: 20px;
            margin: 30px 0;
            text-align: center;
        }
        .action-box a {
            display: inline-block;
            background: linear-gradient(135deg, #7c3aed 0%, #06b6d4 100%);
            color: white;
            padding: 12px 30px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.2s;
        }
        .action-box a:hover {
            transform: translateY(-2px);
        }
        .footer { 
            background-color: #f8f9fa; 
            padding: 25px 30px;
            text-align: center; 
            border-top: 1px solid #e9ecef;
            font-size: 12px; 
            color: #999;
        }
        .footer p { margin: 8px 0; }
        .badge {
            display: inline-block;
            background: #7c3aed;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-left: 10px;
        }
        @media (max-width: 600px) {
            .content { padding: 20px 15px; }
            .header { padding: 30px 15px; }
            .footer { padding: 15px; }
            .info-label, .info-value { display: block; width: 100%; }
            .info-label { border-bottom: none; border-right: none; }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <!-- Header -->
            <div class="header">
                <h1>📧 Nouveau Message</h1>
                <p>Vous avez reçu un message via votre formulaire de contact</p>
            </div>
            
            <!-- Content -->
            <div class="content">
                <p class="greeting">Bonjour Dosseh,</p>
                
                <!-- Info Grid -->
                <div class="info-grid">
                    <div class="info-row">
                        <div class="info-label">Sujet</div>
                        <div class="info-value"><strong>{{ $subject_text }}</strong></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">De</div>
                        <div class="info-value">{{ $sender_name }}<br><span style="color: #999; font-size: 13px;">{{ $sender_email }}</span></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Date</div>
                        <div class="info-value">{{ now()->format('d/m/Y H:i') }}</div>
                    </div>
                </div>
                
                <!-- Message -->
                <div class="message-section">
                    <label class="message-label">💬 Message</label>
                    <div class="message-text">{{ $messageBody }}</div>
                </div>
                
                <!-- Call to Action -->
                <div class="action-box">
                    <p style="margin-bottom: 15px; font-size: 14px; color: #555;">
                        Pour répondre directement à {{ $sender_name }}, cliquez sur le bouton ci-dessous :
                    </p>
                    <a href="mailto:{{ $sender_email }}">✉️ Répondre à {{ $sender_name }}</a>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="footer">
                <p><strong>Portfolio Dosseh</strong></p>
                <p>Full Stack Developer | Laravel • React • Modern Tech Stack</p>
                <p style="margin-top: 15px; border-top: 1px solid #e9ecef; padding-top: 15px; color: #bbb;">
                    © 2026 - Tous droits réservés | Message automatique
                </p>
            </div>
        </div>
    </div>
</body>
</html>
