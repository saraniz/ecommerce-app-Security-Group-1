<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OTP Email</title>
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
      <td class="email-header" style="text-align: center; padding: 30px; background-color: #2c3e50; color: #ffffff; border-radius: 10px 10px 0 0;">
        <h2 style="margin: 0; font-size: 24px;">Your OTP Code</h2>
      </td>
    </tr>
    <!-- Body Section -->
    <tr>
      <td class="email-body" style="padding: 30px; text-align: center;">
        <p style="font-size: 16px; color: #333333; line-height: 1.6;">
          Hello <strong>{{ $data['name'] }}</strong>,<br>
          You have requested a One-Time Password (OTP) for verifying your account. Please find your OTP below:
        </p>
        <h1 style="font-size: 36px; color: #e74c3c; font-weight: bold; margin: 20px 0;">{{ $data['otp'] }}</h1>
        <p style="font-size: 16px; color: #333333; line-height: 1.6;">
          The OTP is valid for <strong>10 minutes</strong>. If you did not request this, please ignore this email.
        </p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6;">
          If you need assistance, feel free to contact our support team.
        </p>
      </td>
    </tr>
    <!-- Footer Section -->
    <tr>
      <td class="email-footer" style="background-color: #ecf0f1; padding: 20px; text-align: center; font-size: 12px; color: #7f8c8d; border-radius: 0 0 10px 10px;">
        <p style="margin: 0;">&copy; 2025 Sixteen Clotheing. All rights reserved.</p>
        <p style="margin: 5px 0 0 0;">1234 Street Name, City, Country</p>
        <p style="margin: 5px 0 0 0;">
          <a href="mailto:support@sixteenclothing.com" style="color: #3498db;">support@sixteenclothing.com</a>
        </p>
      </td>
    </tr>
  </table>
</body>
</html>
