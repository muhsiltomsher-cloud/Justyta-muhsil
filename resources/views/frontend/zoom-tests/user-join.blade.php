<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Join Meeting</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100" onload="initPage()">
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <h1 class="text-3xl font-bold mb-4 text-green-600">👤 User - Join Meeting</h1>
            <p class="text-gray-600 mb-4">Enter the meeting ID provided by your lawyer to join the consultation</p>
            
            <div class="bg-green-50 border border-green-200 rounded p-4 mb-4">
                <h3 class="font-semibold mb-2">Join Meeting:</h3>
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Meeting ID:</label>
                        <input type="text" id="meetingId" class="w-full border rounded px-3 py-2" placeholder="Enter meeting ID from lawyer">
                        <p class="text-xs text-gray-500 mt-1">Ask your lawyer for the meeting ID</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Your Name:</label>
                        <input type="text" id="userName" class="w-full border rounded px-3 py-2" placeholder="Enter your name" value="Client">
                    </div>
                    <div class="flex items-end">
                        <button onclick="joinMeeting()" class="bg-green-600 hover:bg-green-700 text-white font-bold px-6 py-2 rounded w-full">
                            Join Meeting
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-yellow-50 border border-yellow-200 rounded p-4">
                <h4 class="font-semibold text-sm mb-2">📋 Instructions:</h4>
                <ol class="text-sm text-gray-700 space-y-1 list-decimal list-inside">
                    <li>Get the meeting ID from your lawyer</li>
                    <li>Enter the meeting ID above</li>
                    <li>Enter your name</li>
                    <li>Click "Join Meeting"</li>
                    <li>Allow camera and microphone access when prompted</li>
                </ol>
            </div>
        </div>

        <div id="videoArea" class="hidden">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="relative">
                    <div id="videoContainer" class="w-full h-[600px] bg-gradient-to-br from-green-900 to-green-800 rounded-xl relative overflow-hidden shadow-2xl"></div>
                    
                    <div id="videoControls" class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6">
                        <div class="flex items-center justify-center gap-4">
                            <button id="toggleAudioBtn" class="bg-gray-700 hover:bg-gray-600 text-white p-4 rounded-full transition-all duration-200 shadow-lg">
                                <svg id="micOnIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"/>
                                </svg>
                                <svg id="micOffIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"/>
                                </svg>
                            </button>

                            <button id="toggleVideoBtn" class="bg-gray-700 hover:bg-gray-600 text-white p-4 rounded-full transition-all duration-200 shadow-lg">
                                <svg id="videoOnIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                                <svg id="videoOffIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                                </svg>
                            </button>

                            <button id="leaveBtn" class="bg-red-600 hover:bg-red-700 text-white p-4 rounded-full transition-all duration-200 shadow-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z"/>
                                </svg>
                            </button>
                        </div>

                        <div id="connectionStatus" class="text-center mt-3">
                            <span class="text-green-400 text-sm font-medium flex items-center justify-center gap-2">
                                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                                Connected
                            </span>
                        </div>
                    </div>

                    <div id="participantInfo" class="absolute top-4 left-4 bg-black/60 backdrop-blur-sm px-4 py-2 rounded-lg">
                        <p class="text-white text-sm font-medium">👤 Client</p>
                        <p id="lawyerStatus" class="text-gray-300 text-xs mt-1">Connected to lawyer</p>
                    </div>

                    <div id="durationTimer" class="absolute top-4 right-4 bg-black/60 backdrop-blur-sm px-4 py-2 rounded-lg">
                        <p class="text-white text-sm font-mono">00:00</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="statusLog" class="mt-6 bg-white rounded-lg shadow-lg p-6">
            <h3 class="font-bold text-lg mb-3">Status Log:</h3>
            <div id="logContent" class="bg-gray-50 rounded p-4 h-64 overflow-y-auto font-mono text-sm"></div>
        </div>
    </div>

    <script>
        const VIEW_MODE_CONTAIN = 2;
        let client = null;
        let stream = null;
        let isAudioMuted = false;
        let isVideoOff = false;
        let callStartTime = null;
        let timerInterval = null;

        function log(message) {
            const logContent = document.getElementById('logContent');
            const timestamp = new Date().toLocaleTimeString();
            logContent.innerHTML += `[${timestamp}] ${message}<br>`;
            logContent.scrollTop = logContent.scrollHeight;
            console.log(message);
        }

        async function generateSignature(meetingNumber, role) {
            try {
                const response = await fetch('/api/zoom/generate-signature', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        meeting_number: meetingNumber,
                        role: role
                    })
                });
                const data = await response.json();
                return data.signature;
            } catch (error) {
                log('Error generating signature: ' + error.message);
                throw error;
            }
        }

        async function joinMeeting() {
            const meetingId = document.getElementById('meetingId').value;
            const userName = document.getElementById('userName').value;

            if (!meetingId || !userName) {
                alert('Please fill in all fields');
                return;
            }

            if (typeof ZoomVideo === 'undefined') {
                log('ERROR: Zoom SDK is not loaded. Please refresh the page.');
                alert('Zoom SDK is not loaded. Please refresh the page and try again.');
                return;
            }

            log('🚀 Joining meeting as Participant (User)...');
            log('Meeting ID: ' + meetingId);
            log('User Name: ' + userName);

            try {
                const signature = await generateSignature(meetingId, 0); // Role 0 = Participant
                log('✓ Signature generated successfully');

                const container = document.getElementById('videoContainer');
                const videoArea = document.getElementById('videoArea');

                log('Checking camera access...');
                const hasAccess = await checkCameraAccess();
                if (!hasAccess) {
                    log('ERROR: Camera access denied');
                    return;
                }
                log('✓ Camera access granted');

                log('Initializing Zoom client...');
                client = ZoomVideo.createClient();
                await client.init("en-US", "Global", { debug: true });
                log('✓ Zoom client initialized');

                log('Joining meeting as PARTICIPANT...');
                await client.join(meetingId, signature, userName, '');
                const currentUserId = client.getCurrentUserInfo().userId;
                log('✓ Joined meeting, userId: ' + currentUserId);

                stream = client.getMediaStream();

                container.innerHTML = '';
                container.className = 'flex justify-center items-center h-[600px] w-full p-4 bg-black rounded relative';

                const createVideoElement = (userId, isSelf = false) => {
                    const idPrefix = isSelf ? 'self' : 'remote';
                    let existingElement = document.getElementById(`${idPrefix}-video-element-${userId}`);
                    
                    if (existingElement) return existingElement;
                    
                    const videoWrapper = document.createElement("div");
                    videoWrapper.id = `${idPrefix}-video-wrapper-${userId}`;
                    const borderColor = isSelf ? 'border-green-500' : 'border-blue-500';
                    videoWrapper.className = `w-1/2 h-full rounded-lg shadow-xl mx-2 border-4 ${borderColor} overflow-hidden relative`;
                    
                    const videoElement = document.createElement(isSelf ? "video" : "canvas");
                    videoElement.id = `${idPrefix}-video-element-${userId}`;
                    videoElement.className = 'w-full h-full object-contain';
                    if (isSelf) {
                        videoElement.autoplay = true;
                        videoElement.muted = true;
                        videoElement.playsInline = true;
                    }
                    
                    videoWrapper.appendChild(videoElement);
                    container.appendChild(videoWrapper);
                    return videoElement;
                };

                const selfVideoElement = createVideoElement(currentUserId, true);

                log('Starting video and audio...');
                await stream.startVideo();
                await stream.startAudio();
                log('✓ Video and audio started');

                startCallTimer();

                log('Rendering user video...');
                await stream.renderVideo(selfVideoElement, currentUserId, 1280, 720, 0, 0, 3);
                log('✓ User video rendered');

                const existingUsers = client.getAllUser();
                log(`Found ${existingUsers.length} participants in meeting`);

                if (existingUsers.length > 1) {
                    const lawyerUser = existingUsers.find(u => u.userId !== currentUserId);
                    if (lawyerUser) {
                        log('✓ Lawyer is already in the meeting');
                        const userInfo = client.getUser(lawyerUser.userId);
                        const lawyerVideoElement = createVideoElement(lawyerUser.userId, false);

                        if (userInfo?.bVideoOn) {
                            await stream.renderVideo(lawyerVideoElement, lawyerUser.userId, 1280, 720, 0, 0, 3);
                            log('✓ Lawyer video rendered');
                        }
                    }
                }

                client.on('user-added', async (payload) => {
                    const remoteUser = payload.user || payload;
                    if (remoteUser.userId === currentUserId) return;
                    log('Lawyer joined: ' + remoteUser.userId);
                    createVideoElement(remoteUser.userId, false);
                });

                client.on('user-video-status-change', async (payload) => {
                    const remoteUser = payload.user || payload;
                    const remoteUserId = remoteUser.userId;
                    const videoStatus = payload.action;
                    
                    if (remoteUserId === currentUserId) return;

                    log(`Lawyer video status: ${videoStatus}`);

                    if (videoStatus === 'Active') {
                        const remoteVideoCanvas = createVideoElement(remoteUserId, false);
                        try {
                            await stream.renderVideo(remoteVideoCanvas, remoteUserId, 1280, 720, 0, 0, 3);
                            log(`✓ Lawyer video rendered`);
                        } catch (err) {
                            log(`ERROR rendering lawyer video: ${err.message}`);
                        }
                    } else if (videoStatus === 'Inactive') {
                        await stream.stopRenderVideo(remoteUserId);
                        log(`Lawyer video stopped`);
                    }
                });

                client.on('user-removed', async (payload) => {
                    const remoteUser = payload.user || payload;
                    const remoteUserId = remoteUser.userId;
                    log('Lawyer left: ' + remoteUserId);

                    const remoteVideoWrapper = document.getElementById(`remote-video-wrapper-${remoteUserId}`);
                    if (remoteVideoWrapper) {
                        await stream.stopRenderVideo(remoteUserId);
                        remoteVideoWrapper.remove();
                    }
                });

                videoArea.classList.remove('hidden');
                setupControls();

                log('✅ Successfully joined meeting!');

            } catch (error) {
                log('ERROR: ' + error.message);
                console.error(error);
            }
        }

        async function checkCameraAccess() {
            try {
                const testStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
                testStream.getTracks().forEach(track => track.stop());
                return true;
            } catch (e) {
                return false;
            }
        }

        function setupControls() {
            document.getElementById('toggleAudioBtn').addEventListener('click', async () => {
                if (!stream) return;
                try {
                    if (isAudioMuted) {
                        await stream.unmuteAudio();
                        document.getElementById('micOnIcon').classList.remove('hidden');
                        document.getElementById('micOffIcon').classList.add('hidden');
                        isAudioMuted = false;
                        log('Audio unmuted');
                    } else {
                        await stream.muteAudio();
                        document.getElementById('micOnIcon').classList.add('hidden');
                        document.getElementById('micOffIcon').classList.remove('hidden');
                        isAudioMuted = true;
                        log('Audio muted');
                    }
                } catch (err) {
                    log('ERROR toggling audio: ' + err.message);
                }
            });

            document.getElementById('toggleVideoBtn').addEventListener('click', async () => {
                if (!stream) return;
                try {
                    if (isVideoOff) {
                        await stream.startVideo();
                        document.getElementById('videoOnIcon').classList.remove('hidden');
                        document.getElementById('videoOffIcon').classList.add('hidden');
                        isVideoOff = false;
                        log('Video started');
                    } else {
                        await stream.stopVideo();
                        document.getElementById('videoOnIcon').classList.add('hidden');
                        document.getElementById('videoOffIcon').classList.remove('hidden');
                        isVideoOff = true;
                        log('Video stopped');
                    }
                } catch (err) {
                    log('ERROR toggling video: ' + err.message);
                }
            });

            document.getElementById('leaveBtn').addEventListener('click', async () => {
                try {
                    log('Leaving meeting...');
                    stopCallTimer();
                    const currentUserId = client.getCurrentUserInfo().userId;
                    await stream.stopRenderVideo(currentUserId);
                    await stream.stopVideo();
                    await stream.stopAudio();
                    await client.leave();
                    document.getElementById('videoArea').classList.add('hidden');
                    document.getElementById('videoContainer').innerHTML = '';
                    log('Left meeting successfully');
                    location.reload();
                } catch (err) {
                    log('ERROR leaving meeting: ' + err.message);
                }
            });
        }

        function startCallTimer() {
            callStartTime = Date.now();
            timerInterval = setInterval(() => {
                const elapsed = Math.floor((Date.now() - callStartTime) / 1000);
                const minutes = Math.floor(elapsed / 60).toString().padStart(2, '0');
                const seconds = (elapsed % 60).toString().padStart(2, '0');
                document.getElementById('durationTimer').querySelector('p').textContent = `${minutes}:${seconds}`;
            }, 1000);
        }

        function stopCallTimer() {
            if (timerInterval) {
                clearInterval(timerInterval);
                timerInterval = null;
            }
        }

        let sdkLoaded = false;

        function initPage() {
            log('👤 User Join Page loaded - Loading Zoom SDK...');
            loadZoomSDK();
        }

        function loadZoomSDK() {
            const script = document.createElement('script');
            script.src = '/zoom-sdk/lib.js';
            script.onload = function() {
                if (typeof WebVideoSDK !== 'undefined' && WebVideoSDK.default) {
                    window.ZoomVideo = WebVideoSDK.default;
                    log('✓ Zoom SDK loaded successfully (WebVideoSDK.default)');
                    sdkLoaded = true;
                    log('Ready to join meeting');
                } else if (typeof ZoomVideo !== 'undefined') {
                    log('✓ Zoom SDK loaded as global ZoomVideo');
                    sdkLoaded = true;
                    log('Ready to join meeting');
                } else {
                    log('ERROR: Zoom SDK loaded but ZoomVideo/WebVideoSDK not found');
                    log('Available window properties: ' + Object.keys(window).filter(k => k.toLowerCase().includes('zoom') || k.toLowerCase().includes('video')).join(', '));
                }
            };
            script.onerror = function() {
                log('ERROR: Failed to load Zoom SDK from /zoom-sdk/lib.js');
                log('Please ensure the SDK file exists in public/zoom-sdk/');
            };
            document.head.appendChild(script);
        }
    </script>
</body>
</html>
