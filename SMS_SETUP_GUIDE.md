# SMS Notification Setup Guide

This guide will help you set up SMS notifications for your PowerMoto Building system.

## Overview

The SMS notification system has been integrated into your room request approval process. When a user's room request is approved or declined, they will automatically receive an SMS notification.

## Features

- ✅ Automatic SMS notifications for room request approvals
- ✅ Automatic SMS notifications for room request declines  
- ✅ Support for multiple SMS providers (Twilio, TextMagic)
- ✅ Phone number validation and formatting
- ✅ Message length optimization
- ✅ Error logging and handling

## Setup Instructions

### Step 1: Choose an SMS Provider

You can use either **Twilio** (recommended) or **TextMagic** as your SMS provider.

#### Option A: Twilio (Recommended)

1. **Sign up for Twilio:**
   - Go to [https://www.twilio.com/](https://www.twilio.com/)
   - Create a free account
   - Verify your phone number

2. **Get your credentials:**
   - Go to [Twilio Console](https://console.twilio.com/)
   - Find your Account SID and Auth Token
   - Purchase a phone number from Twilio

3. **Update configuration:**
   - Open `admin/sms_config.php`
   - Update the following constants:
   ```php
   const TWILIO_ACCOUNT_SID = 'your_account_sid_here';
   const TWILIO_AUTH_TOKEN = 'your_auth_token_here';
   const TWILIO_PHONE_NUMBER = 'your_twilio_phone_number';
   ```

#### Option B: TextMagic

1. **Sign up for TextMagic:**
   - Go to [https://www.textmagic.com/](https://www.textmagic.com/)
   - Create an account
   - Add credits to your account

2. **Get your credentials:**
   - Go to [TextMagic Dashboard](https://my.textmagic.com/)
   - Find your username and API key

3. **Update configuration:**
   - Open `admin/sms_config.php`
   - Update the following constants:
   ```php
   const TEXTMAGIC_USERNAME = 'your_username_here';
   const TEXTMAGIC_API_KEY = 'your_api_key_here';
   ```

### Step 2: Configure SMS Provider

In `admin/sms_config.php`, set your preferred provider:

```php
// Change to 'twilio' or 'textmagic'
const SMS_PROVIDER = 'twilio';
```

### Step 3: Test SMS Functionality

1. **Access the test page:**
   - Go to `admin/test_sms.php` in your browser
   - Enter a test phone number and message
   - Click "Send Test SMS"

2. **Verify the SMS was received:**
   - Check your phone for the test message
   - If successful, SMS notifications are working!

## How It Works

### Automatic Notifications

When an admin approves or declines a room request:

1. **Approval SMS:**
   - Message: "Hello [Name]! Your room request for [Room] has been APPROVED by PowerMoto Building. Please contact our office for next steps."
   - Includes admin remarks if provided

2. **Decline SMS:**
   - Message: "Hello [Name]! Your room request for [Room] has been DECLINED by PowerMoto Building. Reason: [Admin remarks]"
   - Includes decline reason if provided

### Phone Number Format

The system automatically handles phone number formatting:
- Accepts: `09123456789`, `+639123456789`, `639123456789`
- Converts to: `+639123456789` (Philippines format)

## Troubleshooting

### Common Issues

1. **"SMS provider not configured"**
   - Check that you've updated the credentials in `sms_config.php`
   - Verify the SMS_PROVIDER is set correctly

2. **"Invalid phone number format"**
   - Ensure phone numbers are in correct format
   - Check that country code is included

3. **"Failed to send SMS"**
   - Check your SMS provider account balance
   - Verify API credentials are correct
   - Check error logs for detailed error messages

### Error Logging

SMS sending results are logged in your PHP error log. Check for entries like:
```
SMS Approval Result: {"success":true,"message":"SMS sent successfully"}
```

## Cost Considerations

- **Twilio:** ~$0.0075 per SMS (varies by country)
- **TextMagic:** ~$0.05 per SMS (varies by country)

For a system with 100 room requests per month, expect costs of $0.75-$5.00 per month.

## Security Notes

- Keep your SMS provider credentials secure
- Consider using environment variables for production
- Monitor SMS usage to prevent abuse
- Set up rate limiting if needed

## Support

If you encounter issues:

1. Check the error logs
2. Test with the SMS test page
3. Verify your SMS provider account status
4. Contact your SMS provider support if needed

## Files Modified

- `admin/sms_config.php` - SMS service configuration and functions
- `admin/update_room_request.php` - Integrated SMS notifications
- `admin/test_sms.php` - SMS testing interface
- `SMS_SETUP_GUIDE.md` - This setup guide

The SMS notification system is now ready to use! Users will automatically receive SMS notifications when their room requests are approved or declined.
