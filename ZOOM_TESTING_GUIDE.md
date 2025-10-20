# Zoom Video Calling - Testing Guide

## Overview
This document provides comprehensive testing instructions for the Zoom video calling feature in the Justyta Legal Services Platform.

## Prerequisites

### 1. Zoom SDK Credentials
You need to configure the following environment variables in your `.env` file:

```env
ZOOM_ACCOUNT_ID=your_zoom_account_id
ZOOM_CLIENT_ID=your_zoom_client_id
ZOOM_CLIENT_SECRET=your_zoom_client_secret
ZOOM_SDK_KEY=your_zoom_sdk_key
ZOOM_SDK_SECRET=your_zoom_sdk_secret
ZOOM_WEBHOOK_SECRET=your_zoom_webhook_secret
```

**How to obtain these credentials:**
1. Go to [Zoom Marketplace](https://marketplace.zoom.us/)
2. Sign in with your Zoom account
3. Click "Develop" → "Build App"
4. Create a "Video SDK" app
5. Copy the SDK Key and SDK Secret
6. For OAuth credentials, create a "Server-to-Server OAuth" app
7. Copy the Account ID, Client ID, and Client Secret

### 2. System Requirements
- Modern web browser (Chrome, Firefox, Edge, Safari)
- Camera and microphone access
- Stable internet connection
- HTTPS connection (required for camera/microphone access in production)

## Testing Scenarios

### Scenario 1: Complete Consultation Flow (User → Lawyer)

#### Step 1: Create Consultation Request (User Side)
1. Log in as a regular user
2. Navigate to "Online Live Consultancy" service
3. Fill in the consultation form:
   - Applicant Type: Individual/Company
   - Litigation Type: Local/Federal
   - Consultant Type: Normal/VIP
   - Emirate: Select emirate
   - You Represent: Select option
   - Case Type: Select case type
   - Case Stage: Select stage
   - Language: Select language
   - Duration: Select duration (15, 30, 45, or 60 minutes)
4. Submit the request
5. Complete payment (if amount > 0) or proceed directly
6. You should see a "Waiting for lawyer" screen

#### Step 2: Accept Consultation (Lawyer Side)
1. Log in as a lawyer in a separate browser/incognito window
2. The system polls for new consultations every 3 seconds
3. A popup should appear showing the consultation details
4. Click "Accept" button
5. Wait 3 seconds for the video interface to initialize

#### Step 3: Join Video Call (Both Sides)
1. **User Side:**
   - The page polls every 4 seconds checking if lawyer accepted
   - Once accepted, video interface should appear automatically
   - Grant camera and microphone permissions when prompted
   - You should see your own video (blue border) and lawyer's video (green border)

2. **Lawyer Side:**
   - Video interface appears immediately after accepting
   - Grant camera and microphone permissions when prompted
   - You should see your own video (blue border) and user's video (green border)

#### Step 4: Test Video Controls
Test the following controls on both sides:

1. **Microphone Toggle:**
   - Click the microphone button
   - Verify icon changes from mic-on to mic-off
   - Verify audio stops/starts

2. **Video Toggle:**
   - Click the video button
   - Verify icon changes from video-on to video-off
   - Verify video feed stops/starts

3. **Connection Status:**
   - Verify "Connected" status shows with green pulse indicator
   - Check that it updates if connection issues occur

4. **Duration Timer:**
   - Verify timer starts at 00:00
   - Verify it increments every second

5. **Leave Call:**
   - Click the red "Leave Call" button
   - Verify video stops and interface hides
   - Verify consultation status updates to "completed"

### Scenario 2: Lawyer Joins First
1. Have lawyer accept consultation and join video
2. User joins after lawyer is already in the meeting
3. Verify both videos render correctly
4. Verify the `existingUsers` check works properly

### Scenario 3: User Joins First
1. Have user wait in the consultation
2. Lawyer accepts and joins
3. Verify the `user-video-status-change` event triggers
4. Verify both videos render correctly

### Scenario 4: Lawyer Rejects Consultation
1. Create consultation request as user
2. Lawyer receives popup
3. Click "Reject" button
4. Verify system assigns next available lawyer
5. If no lawyers available, verify user receives appropriate message

### Scenario 5: Network Interruption
1. Start a video call
2. Disconnect network on one side
3. Verify connection status updates
4. Reconnect network
5. Verify video resumes or appropriate error message shows

### Scenario 6: Permission Denial
1. Start consultation flow
2. When browser asks for camera/microphone permissions, click "Deny"
3. Verify error message displays: "Please grant camera and microphone access to start the video."
4. Verify user can retry by refreshing and granting permissions

### Scenario 7: Multiple Rapid Actions
1. Have lawyer accept consultation
2. Immediately toggle video/audio multiple times
3. Verify no errors occur
4. Verify state remains consistent

## Expected Behavior

### Video Rendering
- **Self-view (local video):** Blue border, left side of container
- **Remote view (other participant):** Green border, right side of container
- **Video quality:** Should adapt to network conditions
- **Aspect ratio:** Maintained with `VIEW_MODE_CONTAIN`

### Audio
- Should start automatically when joining
- Should toggle on/off with microphone button
- Should work bidirectionally

### UI Elements
- **Video container:** 600px height, gradient background (gray-900 to gray-800)
- **Control buttons:** Gray with hover effects, rounded full
- **Leave button:** Red with hover effect
- **Connection status:** Green text with animated pulse dot
- **Participant info:** Top-left overlay with backdrop blur
- **Duration timer:** Top-right overlay with monospace font

### Status Updates
- Consultation status should update to "in_progress" when both participants' videos are active
- Consultation status should update to "completed" when either participant leaves
- Lawyer's `is_busy` flag should be managed correctly

## Troubleshooting

### Issue: "Zoom SDK Error" in console
**Solution:** Check that:
- Zoom SDK script is loaded: `https://source.zoom.us/videosdk/2.15.0/lib.js`
- SDK credentials are correctly configured in `.env`
- Signature generation is working (check `generateZoomSignature` function)

### Issue: Video not rendering
**Solution:** Check that:
- Camera permissions are granted
- `renderVideo()` is called with correct parameters
- Video wrapper elements are created properly
- Browser console for specific errors

### Issue: Remote video not showing
**Solution:** Check that:
- `user-video-status-change` event listener is registered
- Remote user has their video turned on
- `stream.renderVideo()` is called for remote user
- Check browser console for attachment errors

### Issue: Audio not working
**Solution:** Check that:
- Microphone permissions are granted
- `stream.startAudio()` is called
- Audio is not muted in browser/system settings
- Check browser console for audio errors

### Issue: "Cannot read property 'userId' of undefined"
**Solution:** Check that:
- `client.join()` completed successfully
- `client.getCurrentUserInfo()` returns valid data
- Event payloads are properly structured

## Code Verification Checklist

- [ ] Zoom SDK 2.15.0 script loaded in both user and lawyer layouts
- [ ] `generateZoomSignature()` function uses correct payload format
- [ ] Meeting number generated without spaces
- [ ] `VIEW_MODE_CONTAIN` constant defined (value: 2)
- [ ] Video wrappers created with proper IDs and classes
- [ ] Event listeners registered: `user-video-status-change`, `user-added`, `user-removed`
- [ ] Cleanup functions call `stopRenderVideo()` before removing elements
- [ ] Error handling with `displayMessage()` function
- [ ] Camera/microphone permission checks implemented
- [ ] Consultation status updates via API calls

## API Endpoints Used

### User Side
- `GET /user/consultation-check?consultation_id={id}` - Poll for lawyer acceptance
- `POST /api/v1/consultation/update-status` - Update consultation status

### Lawyer Side
- `GET /api/v1/consultation/lawyer-poll` - Poll for new consultations
- `POST /api/v1/lawyer-con/respond` - Accept/reject consultation
- `POST /api/v1/consultation/update-status` - Update consultation status

## Browser Compatibility

| Browser | Version | Status |
|---------|---------|--------|
| Chrome | 90+ | ✅ Fully Supported |
| Firefox | 88+ | ✅ Fully Supported |
| Safari | 14+ | ✅ Fully Supported |
| Edge | 90+ | ✅ Fully Supported |
| Opera | 76+ | ✅ Fully Supported |

## Performance Considerations

- Video quality adapts to network bandwidth
- Polling intervals: User (4s), Lawyer (3s)
- Signature validity: 1 hour
- Maximum meeting duration: Based on consultation duration setting

## Security Notes

- JWT signatures generated server-side
- SDK credentials never exposed to client
- HTTPS required for camera/microphone access
- Meeting numbers are unique per consultation

## Known Limitations

1. **Testing without credentials:** Cannot test actual video calls without valid Zoom SDK credentials
2. **Local development:** Camera/microphone access may require HTTPS (use ngrok or similar)
3. **SharedArrayBuffer:** Some features may require specific headers in production
4. **Browser permissions:** Must be granted each time in incognito mode

## Support

For issues or questions:
1. Check browser console for detailed error messages
2. Verify all environment variables are set
3. Ensure Zoom SDK credentials are valid and active
4. Check network connectivity
5. Review Laravel logs: `storage/logs/laravel.log`

## Additional Resources

- [Zoom Video SDK Documentation](https://developers.zoom.us/docs/video-sdk/)
- [Zoom Video SDK JavaScript Reference](https://developers.zoom.us/docs/video-sdk/web/)
- [Zoom Marketplace](https://marketplace.zoom.us/)
