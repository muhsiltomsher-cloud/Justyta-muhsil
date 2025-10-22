<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoom Test - Method 2 (Alternative Attach)</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://source.zoom.us/videosdk/2.15.0/lib.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <h1 class="text-3xl font-bold mb-4">Method 2: Alternative Attach Approach</h1>
            <p class="text-gray-600 mb-4">This uses attachVideo() with canvas elements instead of renderVideo()</p>
            
            <div class="bg-green-50 border border-green-200 rounded p-4 mb-4">
                <h3 class="font-semibold mb-2">Test Parameters:</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Meeting Number:</label>
                        <input type="text" id="meetingNumber" class="w-full border rounded px-3 py-2" placeholder="Enter meeting number">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Username:</label>
                        <input type="text" id="username" class="w-full border rounded px-3 py-2" placeholder="Enter your name">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Role:</label>
                        <select id="role" class="w-full border rounded px-3 py-2">
                            <option value="0">Participant (User)</option>
                            <option value="1">Host (Lawyer)</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button onclick="startTest()" class="bg-green-600 hover:bg-green-700 text-white font-bold px-6 py-2 rounded w-full">
                            Start Test
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div id="videoArea" class="hidden">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="relative">
                    <div id="videoContainer" class="w-full h-[600px] bg-gradient-to-br from-green-900 to-green-800 rounded-xl relative overflow-hidden shadow-2xl flex gap-4 p-4"></div>
                    
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6">
                        <div class="flex items-center justify-center gap-4">
                            <button id="toggleAudioBtn" class="bg-gray-700 hover:bg-gray-600 text-white p-4 rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"/>
                                </svg>
                            </button>
                            <button id="leaveBtn" class="bg-red-600 hover:bg-red-700 text-white p-4 rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="absolute top-4 left-4 bg-black/60 backdrop-blur-sm px-4 py-2 rounded-lg">
                        <p class="text-white text-sm font-medium">Method 2 Test</p>
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
        let client = null;
        let stream = null;
        let isAudioMuted = false;

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

        async function startTest() {
            const meetingNumber = document.getElementById('meetingNumber').value;
            const username = document.getElementById('username').value;
            const role = parseInt(document.getElementById('role').value);

            if (!meetingNumber || !username) {
                alert('Please fill in all fields');
                return;
            }

            log('Starting Method 2 test...');
            log('Meeting Number: ' + meetingNumber);
            log('Username: ' + username);
            log('Role: ' + (role === 1 ? 'Host' : 'Participant'));

            try {
                const signature = await generateSignature(meetingNumber, role);
                log('Signature generated successfully');

                const container = document.getElementById('videoContainer');
                const videoArea = document.getElementById('videoArea');

                log('Checking camera access...');
                const testStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
                testStream.getTracks().forEach(track => track.stop());
                log('Camera access granted');

                log('Initializing Zoom client...');
                client = ZoomVideo.createClient();
                await client.init("en-US", "Global", { debug: true });
                log('Zoom client initialized');

                log('Joining meeting...');
                await client.join(meetingNumber, signature, username, '');
                const currentUserId = client.getCurrentUserInfo().userId;
                log('Joined meeting, userId: ' + currentUserId);

                stream = client.getMediaStream();
                container.innerHTML = '';

                log('Starting video and audio...');
                await stream.startVideo();
                await stream.startAudio();
                log('Video and audio started');

                const selfCanvas = document.createElement('canvas');
                selfCanvas.id = 'self-canvas';
                selfCanvas.className = 'w-1/2 h-full rounded-lg border-4 border-blue-500';
                container.appendChild(selfCanvas);

                log('Attaching local video to canvas...');
                await stream.attachVideo(currentUserId, 2);
                log('Local video attached');

                client.on('user-added', async (payload) => {
                    const remoteUser = payload.user || payload;
                    if (remoteUser.userId === currentUserId) return;
                    log('Remote user joined: ' + remoteUser.userId);

                    const remoteCanvas = document.createElement('canvas');
                    remoteCanvas.id = `remote-canvas-${remoteUser.userId}`;
                    remoteCanvas.className = 'w-1/2 h-full rounded-lg border-4 border-green-500';
                    container.appendChild(remoteCanvas);
                });

                client.on('peer-video-state-change', async (payload) => {
                    log('Peer video state change: ' + JSON.stringify(payload));
                    const remoteUserId = payload.userId;
                    if (remoteUserId === currentUserId) return;

                    if (payload.action === 'Start') {
                        try {
                            await stream.attachVideo(remoteUserId, 2);
                            log(`Remote video attached for user ${remoteUserId}`);
                        } catch (err) {
                            log(`ERROR attaching remote video: ${err.message}`);
                        }
                    } else if (payload.action === 'Stop') {
                        await stream.detachVideo(remoteUserId);
                        log(`Remote video detached for user ${remoteUserId}`);
                    }
                });

                client.on('user-removed', async (payload) => {
                    const remoteUser = payload.user || payload;
                    log('Remote user left: ' + remoteUser.userId);
                    const remoteCanvas = document.getElementById(`remote-canvas-${remoteUser.userId}`);
                    if (remoteCanvas) {
                        remoteCanvas.remove();
                    }
                });

                videoArea.classList.remove('hidden');
                setupControls();

                log('✓ Method 2 test started successfully!');

            } catch (error) {
                log('ERROR: ' + error.message);
                console.error(error);
            }
        }

        function setupControls() {
            document.getElementById('toggleAudioBtn').addEventListener('click', async () => {
                if (!stream) return;
                try {
                    if (isAudioMuted) {
                        await stream.unmuteAudio();
                        isAudioMuted = false;
                        log('Audio unmuted');
                    } else {
                        await stream.muteAudio();
                        isAudioMuted = true;
                        log('Audio muted');
                    }
                } catch (err) {
                    log('ERROR toggling audio: ' + err.message);
                }
            });

            document.getElementById('leaveBtn').addEventListener('click', async () => {
                try {
                    log('Leaving meeting...');
                    const currentUserId = client.getCurrentUserInfo().userId;
                    await stream.detachVideo(currentUserId);
                    await stream.stopVideo();
                    await stream.stopAudio();
                    await client.leave();
                    document.getElementById('videoArea').classList.add('hidden');
                    document.getElementById('videoContainer').innerHTML = '';
                    log('Left meeting successfully');
                } catch (err) {
                    log('ERROR leaving meeting: ' + err.message);
                }
            });
        }

        log('Method 2 page loaded - Ready to test');
    </script>
</body>
</html>
