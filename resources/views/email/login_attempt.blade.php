<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Attempt Detected</title>
  <style>
    /* Reset some styles */
    body, html {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }
    table {
      border-spacing: 0;
    }
    td {
      padding: 0;
    }
    /* Responsive Design */
    @media (max-width: 600px) {
      .email-container {
        width: 100% !important;
      }
      .email-body {
        padding: 15px;
      }
    }
  </style>
  <!-- Bootstrap 4 or 5 CDN -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-pzjw8f+ua7Kw1TIq0HiQH8c1ajlN2l88iY1hZlfnOktY3d8b8Gz9kshYg2Qb1Z2Y" crossorigin="anonymous">
</head>
<body style="background-color: #f4f4f4; padding-top: 20px; padding-bottom: 20px;">
  <!-- Email Container -->
  <table align="center" width="600" class="email-container" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <!-- Header Section -->
    <tr>
      <td class="email-header" style="text-align: center; padding: 30px; background-color: #e74c3c; color: #ffffff; border-radius: 10px 10px 0 0;">
        <h2 style="margin: 0; font-size: 28px;">Login Attempt Detected</h2>
      </td>
    </tr>
    <!-- Body Section -->
    <tr>
      <td class="email-body" style="padding: 30px; text-align: center;">
        <p style="font-size: 16px; color: #333333; line-height: 1.6;">
          Hi <strong>{{ $data['name'] }}</strong>,<br>
          We detected a login attempt to your account on <strong>Sixteen Clotheing</strong>. Please review the details below:
        </p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6;">
          <strong>Login Details:</strong><br>
          <strong>Device/Browser:</strong> {{ $data['device'] }}<br>
          <strong>Time of Attempt:</strong> {{ $data['time'] }}
        </p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6;">
          If you did not attempt to log in, please <a href="[Security Link]" style="color: #3498db;">click here</a> to secure your account immediately. If this was you, you can ignore this message.
        </p>
        <!-- Call to Action Button -->
        <a href="[Security Link]" style="background-color: #2ecc71; color: white; padding: 12px 20px; text-decoration: none; font-size: 18px; border-radius: 5px; display: inline-block; margin-top: 20px;">
          Secure Your Account
        </a>
      </td>
    </tr>
    <!-- Footer Section -->
    <tr>
      <td class="email-footer" style="background-color: #ecf0f1; padding: 20px; text-align: center; font-size: 12px; color: #7f8c8d; border-radius: 0 0 10px 10px;">
        <p style="margin: 0;">&copy; 2025 Sixteen Clotheing . All rights reserved.</p>
        <p style="margin: 5px 0 0 0;">1234 Street Name, City, Country</p>
        <p style="margin: 5px 0 0 0;">
          <a href="mailto:support@[YourDomain].com" style="color: #3498db;">support@sixteenclotheing.com</a>
        </p>
      </td>
    </tr>
  </table>
</body>
</html>
