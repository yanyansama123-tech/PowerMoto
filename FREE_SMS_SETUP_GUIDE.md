# Free SMS Services for Philippines - Setup Guide

This guide shows you how to set up **completely free** SMS notifications for your PowerMoto Building system using services that support Philippine numbers.

## 🆓 **Free SMS Services Available**

### 1. **SMS.to** (Recommended - No Credit Card Required)
- ✅ **Free Trial**: No credit card required
- ✅ **Philippines Support**: Full support for Globe, Smart, DITO, Sun, TnT, TM
- ✅ **Easy Setup**: Simple API integration
- ✅ **Good Reliability**: Established service

**Setup Steps:**
1. Go to [https://sms.to](https://sms.to)
2. Sign up for free account
3. Get your API key from dashboard
4. Update `sms_config_free.php` with your API key

### 2. **engageSPARK** (14-Day Free Trial)
- ✅ **14-Day Free Trial**: Full access for 2 weeks
- ✅ **Philippines Coverage**: All major networks
- ✅ **Professional Service**: Good for business use
- ⚠️ **Requires Credit Card**: For trial signup

**Setup Steps:**
1. Go to [https://engagespark.com](https://engagespark.com)
2. Sign up for 14-day free trial
3. Get your API key
4. Update configuration

### 3. **SendSMSGate** (5 Free Credits)
- ✅ **5 Free SMS**: Upon registration
- ✅ **Low Cost**: €0.005 per SMS after free credits
- ✅ **Philippines Support**: Good coverage
- ⚠️ **Limited Free**: Only 5 messages

**Setup Steps:**
1. Go to [https://sendsmsgate.com](https://sendsmsgate.com)
2. Register for free account
3. Get your API key
4. Update configuration

## 🚀 **Quick Setup (SMS.to - Recommended)**

### Step 1: Sign Up for SMS.to
1. Visit [https://sms.to](https://sms.to)
2. Click "Sign Up" (no credit card required)
3. Verify your email
4. Log into your dashboard

### Step 2: Get Your API Key
1. In your SMS.to dashboard, go to "API" section
2. Copy your API key
3. Note it down for configuration

### Step 3: Update Your System
1. Replace your current `sms_config.php` with `sms_config_free.php`
2. Update the API key in the file:
   ```php
   const SMS_TO_API_KEY = 'your_actual_api_key_here';
   ```
3. Set the provider:
   ```php
   const SMS_PROVIDER = 'sms_to';
   ```

### Step 4: Test Your Setup
1. Go to `admin/test_sms.php`
2. Enter your phone number
3. Send a test message
4. Check if you receive the SMS

## 📱 **Cost Comparison**

| Service | Free Trial | Cost After Trial | Philippines Support |
|---------|-------------|------------------|-------------------|
| **SMS.to** | ✅ No credit card | ~$0.01/SMS | ✅ Excellent |
| **engageSPARK** | ✅ 14 days | ~$0.02/SMS | ✅ Excellent |
| **SendSMSGate** | ✅ 5 SMS | €0.005/SMS | ✅ Good |
| **Twilio** | ❌ Credit card required | $0.0075/SMS | ✅ Excellent |

## 🔧 **Configuration Files**

### For SMS.to (Recommended)
```php
// In sms_config_free.php
const SMS_TO_API_KEY = 'your_sms_to_api_key';
const SMS_PROVIDER = 'sms_to';
```

### For engageSPARK
```php
// In sms_config_free.php
const ENGAGESPARK_API_KEY = 'your_engagespark_api_key';
const SMS_PROVIDER = 'engagespark';
```

### For SendSMSGate
```php
// In sms_config_free.php
const SENDSMSGATE_API_KEY = 'your_sendsmsgate_api_key';
const SMS_PROVIDER = 'sendsmsgate';
```

## 🎯 **Recommended Setup Process**

1. **Start with SMS.to** (easiest, no credit card)
2. **Test thoroughly** with the test page
3. **If SMS.to doesn't work**, try engageSPARK
4. **For production**, consider SendSMSGate for low costs

## 📞 **Phone Number Support**

All these services support Philippine numbers in these formats:
- `09123456789` (automatically converted to +639123456789)
- `+639123456789` (direct format)
- `639123456789` (without + sign)

## 🛠️ **Troubleshooting**

### Common Issues:
1. **"API key not configured"** - Make sure you've updated the API key
2. **"Invalid phone number"** - Check phone number format
3. **"SMS sending failed"** - Check your account balance/credits
4. **"No response"** - Check your internet connection

### Debug Steps:
1. Check error logs in your server
2. Test with different phone numbers
3. Verify API key is correct
4. Check service status on provider's website

## 💡 **Pro Tips**

1. **Start with SMS.to** - It's the most user-friendly
2. **Test with multiple numbers** - Make sure it works for different carriers
3. **Keep backups** - Save your working configuration
4. **Monitor usage** - Track how many SMS you're sending
5. **Have a backup service** - Set up a second provider as backup

## 🎉 **Benefits of Free Services**

- ✅ **No upfront costs**
- ✅ **Easy to test and experiment**
- ✅ **Good for small to medium usage**
- ✅ **No credit card required for most**
- ✅ **Perfect for development and testing**

## 📋 **Next Steps**

1. Choose your preferred free service
2. Sign up and get your API key
3. Update the configuration file
4. Test with the test page
5. Start using SMS notifications!

Your PowerMoto Building system will now send SMS notifications to users when their room requests are approved or declined, completely free! 🎉
