<!DOCTYPE html>
<html>
<head>
    <title>Welcome to NewWorld Cargo</title>
</head>
<body style="font-family: 'Poppins', Arial, sans-serif; margin: 0; padding: 0; background-color: #f7f9fc;">
    <div style="max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
        <!-- Header with Logo -->
        <div style="background: linear-gradient(135deg, #0055a4 0%, #00337f 100%); padding: 30px 20px; text-align: center;">
            <img width="100" src="https://newworldcargo.com/assets/lte/cargo-logo.svg">
        </div>
        
        <!-- Main Content -->
        <div style="padding: 30px 40px;">
            <h2 style="color: #00337f; margin-bottom: 20px; font-size: 24px;">Welcome Aboard, {{ $user['name'] }}!</h2>
            
            <p style="font-size: 16px; color: #444; line-height: 1.5; margin-bottom: 20px;">
                We're thrilled to welcome you to the NewWorld Cargo family! Your shipping journey just got a whole lot smoother.
            </p>
            
            <div style="background-color: #f0f7ff; border-left: 4px solid #0055a4; padding: 15px; margin: 25px 0; border-radius: 4px;">
                <p style="margin: 0; color: #00337f; font-size: 14px;">
                    Your registered email: <strong>{{ $user['email'] }}</strong>
                </p>
            </div>
            
            <!-- Shipping Illustration -->
            <div style="text-align: center; margin: 30px 0;">
                <svg width="200" height="120" viewBox="0 0 200 120">
                    <!-- Ocean -->
                    <rect x="0" y="90" width="200" height="30" fill="#c2e8ff" />
                    <!-- Ship -->
                    <rect x="40" y="70" width="120" height="30" rx="5" fill="#0055a4" />
                    <rect x="65" y="50" width="70" height="20" rx="2" fill="#00337f" />
                    <!-- Containers -->
                    <rect x="75" y="35" width="15" height="15" fill="#ff7043" />
                    <rect x="95" y="35" width="15" height="15" fill="#ffc107" />
                    <rect x="115" y="35" width="15" height="15" fill="#4caf50" />
                    <!-- Waves -->
                    <path d="M0 100 Q 20 90, 40 100 Q 60 110, 80 100 Q 100 90, 120 100 Q 140 110, 160 100 Q 180 90, 200 100" fill="none" stroke="#ffffff" stroke-width="2" />
                    <path d="M0 110 Q 20 100, 40 110 Q 60 120, 80 110 Q 100 100, 120 110 Q 140 120, 160 110 Q 180 100, 200 110" fill="none" stroke="#ffffff" stroke-width="2" />
                </svg>
            </div>
            
            <div style="text-align: center; margin: 40px 0 30px;">
                <a href="{{ env('APP_URL') }}" style="background-color: #ffd500; color: white; padding: 12px 30px; text-decoration: none; border-radius: 25px; font-weight: bold; font-size: 16px; display: inline-block; box-shadow: 0 4px 6px rgba(0,85,164,0.2); transition: all 0.3s ease;">
                    Track Your Shipment
                </a>
            </div>
            
            <div style="display: flex; justify-content: space-between; margin-top: 30px; text-align: center;">
                <div style="flex: 1; padding: 0 10px;">
                    <svg width="40" height="40" viewBox="0 0 40 40" style="margin: 0 auto 10px;">
                        <circle cx="20" cy="20" r="18" fill="#f0f7ff" stroke="#0055a4" stroke-width="2" />
                        <path d="M12 20 L18 26 L28 16" stroke="#0055a4" stroke-width="3" fill="none" />
                    </svg>
                    <p style="font-size: 13px; color: #555;">Global Reliability</p>
                </div>
                <div style="flex: 1; padding: 0 10px;">
                    <svg width="40" height="40" viewBox="0 0 40 40" style="margin: 0 auto 10px;">
                        <circle cx="20" cy="20" r="18" fill="#f0f7ff" stroke="#0055a4" stroke-width="2" />
                        <rect x="13" y="13" width="14" height="14" rx="2" fill="none" stroke="#0055a4" stroke-width="2" />
                        <path d="M20 13 L20 27 M13 20 L27 20" stroke="#0055a4" stroke-width="2" />
                    </svg>
                    <p style="font-size: 13px; color: #555;">Real-time Tracking</p>
                </div>
                <div style="flex: 1; padding: 0 10px;">
                    <svg width="40" height="40" viewBox="0 0 40 40" style="margin: 0 auto 10px;">
                        <circle cx="20" cy="20" r="18" fill="#f0f7ff" stroke="#0055a4" stroke-width="2" />
                        <path d="M20 10 L20 20 L26 24" stroke="#0055a4" stroke-width="2" fill="none" />
                    </svg>
                    <p style="font-size: 13px; color: #555;">24/7 Support</p>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div style="background-color: #f7f9fc; padding: 20px; text-align: center; border-top: 1px solid #eaeaea;">
            <p style="color: #0055a4; font-weight: bold; margin-bottom: 10px; font-size: 14px;">
                "Connecting Worlds, Delivering Futures"
            </p>
            <p style="font-size: 12px; color: #888; margin-bottom: 15px;">
                If you have any questions, contact our support team at support@newworldcargo.com
            </p>
            <div style="margin-top: 15px;">
                <a href="#" style="display: inline-block; margin: 0 8px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#0055a4">
                        <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/>
                    </svg>
                </a>
                <a href="#" style="display: inline-block; margin: 0 8px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#0055a4">
                        <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                    </svg>
                </a>
                <a href="#" style="display: inline-block; margin: 0 8px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#0055a4">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0z"/>
                        <path d="M12 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                        <circle cx="18.406" cy="5.594" r="1.44"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
