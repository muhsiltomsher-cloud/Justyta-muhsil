@extends('layouts.web_default', ['title' => __('frontend.request_success')])

@section('content')  
    
    <div class="grid grid-cols-1 gap-6">
        <div class=" bg-white p-10 rounded-[20px] border !border-[#FFE9B1] h-[calc(100vh-150px)]">

            <div id="waitingMessage">
                <div class="bg-[#FFFAF0] border border-[#FFE9B1] rounded-xl p-8 max-w-xl m-auto w-full text-center">

                    <h1 class="text-2xl font-medium text-[#07683B] mb-4">{{ __('frontend.waiting') }}</h1>

                    <div class="text-gray-600 mb-6">
                        {!! $pageData ?? '' !!}
                    </div>

                    <button disabled type="button" class=" my-8">
                        <svg aria-hidden="true" role="status" class="inline w-8 h-8 me-3 text-white animate-spin"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="#E5E7EB" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="#4D1717" />
                        </svg>
                    </button>

                    <div class="mb-8">
                        <img src="{{ asset('assets/images/logo-text.svg') }}" alt="{{ __('frontend.logo') }}" class="mx-auto ">
                    </div>
                </div>

                <div class="text-center">
                    <a href="#"
                        class="mt-8 inline-flex items-center gap-3 px-6 py-3 bg-transparatnt border border-[#4D1717] text-[#4D1717]  rounded-full transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16" fill="none">
                            <path
                            d="M1.50586 14.9463H5.19786V9.86928C5.19786 9.64061 5.27553 9.44895 5.43086 9.29428C5.58553 9.13895 5.77719 9.06128 6.00586 9.06128H9.00586C9.23453 9.06128 9.42653 9.13895 9.58186 9.29428C9.73653 9.44895 9.81386 9.64061 9.81386 9.86928V14.9463H13.5059V6.25428C13.5059 6.15161 13.4835 6.05828 13.4389 5.97428C13.3942 5.89028 13.3332 5.81695 13.2559 5.75428L7.87186 1.69628C7.76919 1.60695 7.64719 1.56228 7.50586 1.56228C7.36453 1.56228 7.24286 1.60695 7.14086 1.69628L1.75586 5.75428C1.67919 5.81828 1.61819 5.89161 1.57286 5.97428C1.52753 6.05695 1.50519 6.15028 1.50586 6.25428V14.9463ZM0.505859 14.9463V6.25428C0.505859 5.99828 0.563193 5.75595 0.677859 5.52728C0.792526 5.29861 0.950526 5.11028 1.15186 4.96228L6.53686 0.88428C6.81886 0.668946 7.14086 0.561279 7.50286 0.561279C7.86486 0.561279 8.18886 0.668946 8.47486 0.88428L13.8599 4.96128C14.0619 5.10928 14.2199 5.29795 14.3339 5.52728C14.4485 5.75595 14.5059 5.99828 14.5059 6.25428V14.9463C14.5059 15.2143 14.4062 15.4479 14.2069 15.6473C14.0075 15.8466 13.7739 15.9463 13.5059 15.9463H9.62186C9.39253 15.9463 9.20053 15.8689 9.04586 15.7143C8.89119 15.5589 8.81386 15.3669 8.81386 15.1383V10.0623H6.19786V15.1383C6.19786 15.3676 6.12053 15.5596 5.96586 15.7143C5.81119 15.8689 5.61953 15.9463 5.39086 15.9463H1.50586C1.23786 15.9463 1.00419 15.8466 0.804859 15.6473C0.605526 15.4479 0.505859 15.2143 0.505859 14.9463Z"
                            fill="#4D1717" />
                        </svg> <span> {{ __('frontend.back_to_home') }}</span>
                    </a>
                </div>
            </div>

            <div id="videoArea" class="hidden mt-4">
                <div class="relative">
                    <div id="videoContainer" class="w-full h-[600px] bg-gradient-to-br from-gray-900 to-gray-800 rounded-xl relative overflow-hidden shadow-2xl"></div>
                    
                    <!-- Video Controls Overlay -->
                    <div id="videoControls" class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6">
                        <div class="flex items-center justify-center gap-4">
                            <!-- Microphone Toggle -->
                            <button id="toggleAudioBtn" class="group relative bg-gray-700 hover:bg-gray-600 text-white p-4 rounded-full transition-all duration-200 shadow-lg hover:shadow-xl" title="Toggle Microphone">
                                <svg id="micOnIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"/>
                                </svg>
                                <svg id="micOffIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"/>
                                </svg>
                            </button>

                            <!-- Video Toggle -->
                            <button id="toggleVideoBtn" class="group relative bg-gray-700 hover:bg-gray-600 text-white p-4 rounded-full transition-all duration-200 shadow-lg hover:shadow-xl" title="Toggle Video">
                                <svg id="videoOnIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                                <svg id="videoOffIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                                </svg>
                            </button>

                            <!-- Leave Call -->
                            <button id="leaveBtn" class="bg-red-600 hover:bg-red-700 text-white p-4 rounded-full transition-all duration-200 shadow-lg hover:shadow-xl" title="Leave Call">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z"/>
                                </svg>
                            </button>

                            <!-- Settings -->
                            <button id="settingsBtn" class="group relative bg-gray-700 hover:bg-gray-600 text-white p-4 rounded-full transition-all duration-200 shadow-lg hover:shadow-xl" title="Settings">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Connection Status -->
                        <div id="connectionStatus" class="text-center mt-3">
                            <span class="text-green-400 text-sm font-medium flex items-center justify-center gap-2">
                                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                                Connected
                            </span>
                        </div>
                    </div>

                    <!-- Participant Info Overlay -->
                    <div id="participantInfo" class="absolute top-4 left-4 bg-black/60 backdrop-blur-sm px-4 py-2 rounded-lg">
                        <p class="text-white text-sm font-medium">Consultation in progress</p>
                    </div>

                    <!-- Duration Timer -->
                    <div id="durationTimer" class="absolute top-4 right-4 bg-black/60 backdrop-blur-sm px-4 py-2 rounded-lg">
                        <p class="text-white text-sm font-mono">00:00</p>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection

@section('script')
    <script src="https://source.zoom.us/videosdk/2.15.0/lib.js"></script>
    <script>
        let consultationId = {{ $consultation->id }};

        // Poll server every 4 seconds
        async function pollUser(){
            try{
                const res = await fetch(`{{ route('web.user.check') }}?consultation_id=${consultationId}`, {
                    headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}'}
                });
                const data = await res.json();
                if(data.status && data.data){
                    document.getElementById('waitingMessage').classList.add('hidden');
                    startZoomVideo(data.data,'{{ addslashes(auth()->user()->name) }}');
                }
            }catch(err){
                console.error(err);
            }
        }
        setInterval(pollUser, 4000);

        // // Join Zoom Video
        // async function startZoomVideo(data){
        //     const client = ZoomVideo.createClient();
        //     await client.init('en-US', 'CDN');
        //     await client.join(data.signature, data.meeting_number, data.sdk_key, '{{ addslashes(auth()->user()->name) }}', data.role);

        //     const stream = client.getMediaStream();
        //     await stream.startVideo();
        //     await stream.startAudio();

        //     const container = document.getElementById('videoContainer');
        //     const localDiv = document.createElement('div');
        //     localDiv.style.width = '100%';
        //     localDiv.style.height = '100%';
        //     container.appendChild(localDiv);

        //     stream.renderVideo(localDiv, {fit:'cover'});
        //     document.getElementById('videoArea').classList.remove('hidden');

        //     document.getElementById('leaveBtn').addEventListener('click', async ()=>{
        //         await stream.stopVideo();
        //         await stream.stopAudio();
        //         await client.leave();
        //         document.getElementById('videoArea').classList.add('hidden');
        //     });
        // }

        const VIEW_MODE_CONTAIN = 2;

        async function checkCameraAccess() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
                stream.getTracks().forEach(track => track.stop());
                console.log("Camera access granted");
                return true;
            } catch (err) {
                console.error("Camera access denied or error:", err);
                alert("Please grant camera and microphone access to start the video.");
                return false;
            }
        }

        function displayMessage(message) {
            const container = document.getElementById('videoContainer');
            let messageDiv = document.getElementById('statusMessage');
            
            if (!container) {
                console.error("Cannot display message: videoContainer not found.");
                return;
            }

            if (!messageDiv) {
                messageDiv = document.createElement('div');
                messageDiv.id = 'statusMessage';
                messageDiv.className = 'text-red-600 font-semibold p-4 border border-red-300 rounded-lg bg-red-50 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 shadow-lg z-50';
                container.appendChild(messageDiv);
            }
            
            messageDiv.textContent = message;
            
            setTimeout(() => {
                if (messageDiv.parentNode) {
                    messageDiv.remove();
                }
            }, 5000);
        }

        window.startZoomVideo = async function (data, username) {
            if (!(await checkCameraAccess())) {
                return;
            }

            let client;
            const container = document.getElementById('videoContainer');
            const videoArea = document.getElementById('videoArea');

            try {
                console.log("Meeting details:", data);

                client = ZoomVideo.createClient();
                await client.init("en-US", "Global", { debug: true });
                console.log("Zoom client initialized");

                await client.join(data.meeting_number, data.signature, username, '');
                const currentUserId = client.getCurrentUserInfo().userId;
                console.log("Joined meeting, userId:", currentUserId);

                const stream = client.getMediaStream();

                if (!container) {
                    throw new Error("Video container not found");
                }
                container.innerHTML = '';
                container.className = 'flex justify-center items-center h-[480px] w-full p-4';

                const createVideoWrapper = (userId, isSelf = false) => {
                    const idPrefix = isSelf ? 'self' : 'remote';
                    let videoWrapper = document.getElementById(`${idPrefix}-video-wrapper-${userId}`);
                    
                    if (videoWrapper) return videoWrapper;
                    
                    videoWrapper = document.createElement("div");
                    videoWrapper.id = `${idPrefix}-video-wrapper-${userId}`;
                    
                    const borderColor = isSelf ? 'border-blue-500' : 'border-green-500';
                    videoWrapper.className = `w-1/2 h-full rounded-lg shadow-xl mx-2 border-4 ${borderColor} overflow-hidden relative`;
                    
                    container.appendChild(videoWrapper);
                    return videoWrapper;
                };

                const selfVideoWrapper = createVideoWrapper(currentUserId, true);

                await stream.startVideo();
                await stream.startAudio();
                console.log("Video and audio stream started");

                await stream.renderVideo(selfVideoWrapper, currentUserId, VIEW_MODE_CONTAIN);
                console.log("Local video stream rendered.");

                client.on('user-video-status-change', async (payload) => {
                    const remoteUser = payload.user || payload;
                    const remoteUserId = remoteUser.userId;
                    const videoStatus = payload.action;
                    
                    if (remoteUserId === currentUserId) return;

                    console.log(`User ${remoteUserId} video status changed to: ${videoStatus}`);

                    if (videoStatus === 'Active') {
                        const remoteVideoWrapper = createVideoWrapper(remoteUserId, false);
                        try {
                            await stream.renderVideo(remoteVideoWrapper, remoteUserId, VIEW_MODE_CONTAIN);
                            console.log(`Remote video rendered for user ${remoteUserId}`);
                        } catch (err) {
                            console.error(`Failed to render remote video for ${remoteUserId}:`, err);
                        }
                    } else if (videoStatus === 'Inactive') {
                        await stream.stopRenderVideo(remoteUserId);
                        console.log(`Remote video render stopped for user ${remoteUserId}`);
                    }
                });

                const existingUsers = client.getAllUser();
                console.log("Existing participants:", existingUsers);

                if (existingUsers.length > 1) {
                    const remoteUser = existingUsers.find(u => u.userId !== currentUserId);
                    if (remoteUser) {
                        console.log("Remote user (Lawyer) already in meeting:", remoteUser.userId);
                        
                        const userInfo = client.getUser(remoteUser.userId);
                        const remoteVideoWrapper = createVideoWrapper(remoteUser.userId, false);

                        if (userInfo?.bVideoOn) {
                            await stream.renderVideo(remoteVideoWrapper, remoteUser.userId, VIEW_MODE_CONTAIN);
                            console.log("Immediately rendered video of existing user.");
                        }
                    }
                }

                client.on('user-added', async (payload) => {
                    const remoteUser = payload.user || payload;
                    if (remoteUser.userId === currentUserId) return;
                    
                    console.log("Remote user joined:", remoteUser.userId);
                    createVideoWrapper(remoteUser.userId, false);
                });

                client.on('user-removed', async (payload) => {
                    const remoteUser = payload.user || payload;
                    const remoteUserId = remoteUser.userId;
                    console.log("Remote user left:", remoteUserId);

                    const remoteVideoWrapper = document.getElementById(`remote-video-wrapper-${remoteUserId}`);
                    if (remoteVideoWrapper) {
                        await stream.stopRenderVideo(remoteUserId);
                        remoteVideoWrapper.remove();
                    }
                });

                if (videoArea) {
                    videoArea.classList.remove('hidden');
                } else {
                    console.error("Video area element not found");
                }

                const leaveBtn = document.getElementById('leaveBtn');
                if (leaveBtn) {
                    leaveBtn.addEventListener('click', async () => {
                        try {
                            await stream.stopRenderVideo(currentUserId);
                            await stream.stopVideo();
                            await stream.stopAudio();
                            await client.leave();
                            console.log("Left meeting");
                            
                            if (videoArea) {
                                videoArea.classList.add('hidden');
                            }
                            container.innerHTML = '';
                        } catch (err) {
                            console.error("Error leaving meeting:", err);
                            displayMessage("Error leaving the meeting. Please refresh the page manually.");
                        }
                    });
                } else {
                    console.error("Leave button not found");
                }
            } catch (error) {
                console.error("Zoom SDK Error:", error);
                displayMessage(`Failed to start Zoom meeting: ${error.message || 'Unknown error'}. Check console for details.`);
            }
        };
    </script>
@endsection
