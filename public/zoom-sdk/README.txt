ZOOM SDK FILE REQUIRED
======================

This directory needs the Zoom Video SDK file to work.

REQUIRED FILE: lib.js

HOW TO GET IT:
1. Visit: https://developers.zoom.us/docs/video-sdk/web/
2. Sign in or create a free Zoom developer account
3. Download the Web Video SDK package
4. Extract the ZIP file
5. Copy the SDK file to this directory as: lib.js

The file should be approximately 500KB - 2MB in size.

For detailed instructions, see: ZOOM_SDK_SETUP.md in the project root.

WHY IS THIS NEEDED?
The Zoom CDN (source.zoom.us) is blocked by your network/firewall, so we need
to use a local copy of the SDK instead.
