# Zoom SDK Setup Guide

## Issue: "ZoomVideo is not defined" Error

This error occurs when the Zoom SDK script cannot load from the CDN (`https://source.zoom.us/videosdk/2.15.0/lib.js`).

## Causes

1. **Network/Firewall blocking** - Your network blocks access to `source.zoom.us`
2. **Corporate proxy** - Company firewall blocking external CDN
3. **Internet connection issues**
4. **Browser security settings**

## Solution: Use Local SDK File

### Step 1: Download Zoom SDK Manually

Since the CDN may be blocked, you need to download the SDK file manually:

**Option A: Download from a different network**
1. Use a different internet connection (mobile hotspot, home network, etc.)
2. Open this URL in your browser: `https://source.zoom.us/videosdk/2.15.0/lib.js`
3. Save the file (Right-click → Save As)

**Option B: Use Zoom's official download**
1. Visit: https://developers.zoom.us/docs/video-sdk/web/
2. Download the Web SDK package
3. Extract the `lib.js` file

### Step 2: Place SDK in Your Project

1. Create directory: `public/zoom-sdk/`
2. Copy the downloaded `lib.js` file into `public/zoom-sdk/lib.js`
3. The file should be at: `{your-project}/public/zoom-sdk/lib.js`

### Step 3: Update Script References

The test pages are already configured to use local SDK as fallback. Once you place the file in `public/zoom-sdk/lib.js`, refresh the test pages.

## Alternative: Use Real Consultation System

If you cannot download the SDK, use the actual consultation flow instead of test pages:

### For Users:
1. Log in as a user
2. Go to: `/user/online-live-consultancy`
3. Fill out the consultation form
4. Complete payment
5. Wait on the consultation page

### For Lawyers:
1. Log in as a lawyer
2. Go to lawyer dashboard
3. Accept incoming consultation request
4. Video call will start automatically

The real consultation system uses the same SDK but may have better caching or different loading mechanisms.

## Verify SDK Loading

After placing the local file, open browser console (F12) and check for:
- ✅ "Zoom SDK loaded successfully" - SDK is working
- ❌ "Zoom SDK failed to load" - File not found or incorrect path

## File Structure

```
your-project/
├── public/
│   └── zoom-sdk/
│       └── lib.js          ← Place downloaded SDK here
├── resources/
│   └── views/
│       └── frontend/
│           └── zoom-tests/
│               ├── index.blade.php
│               ├── method1.blade.php
│               ├── method2.blade.php
│               └── method3.blade.php
```

## Testing After Setup

1. Visit: `http://localhost:8000/zoom-test`
2. Choose any method
3. Check the status log - should show "Zoom SDK loaded successfully"
4. Enter meeting details and click "Start Test"
5. Allow camera/microphone permissions
6. Open another browser and join the same meeting number

## Still Having Issues?

If the SDK still doesn't load:

1. **Check file path**: Ensure `public/zoom-sdk/lib.js` exists
2. **Check file size**: The file should be several hundred KB (not 9 bytes)
3. **Clear browser cache**: Hard refresh (Ctrl+Shift+R or Cmd+Shift+R)
4. **Check browser console**: Look for specific error messages
5. **Try different browser**: Test in Chrome, Firefox, or Edge

## Contact

If none of these solutions work, the issue may be:
- Zoom SDK version compatibility
- Browser compatibility
- System-level network restrictions

In that case, contact your network administrator or use a different network environment.
