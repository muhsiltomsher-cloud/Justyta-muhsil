<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoom Video Testing Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen">
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-5xl font-bold text-gray-800 mb-4">Zoom Video Testing Dashboard</h1>
                <p class="text-xl text-gray-600">Test different Zoom SDK implementation methods</p>
                <p class="text-sm text-gray-500 mt-2">Choose a method below to test which one works best for your setup</p>
            </div>

            <div class="grid md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300 border-t-4 border-blue-500">
                    <div class="flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4 mx-auto">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-3 text-center">Method 1</h2>
                    <h3 class="text-lg font-semibold text-blue-600 mb-3 text-center">Current Implementation</h3>
                    <p class="text-gray-600 mb-4 text-sm">Uses SDK 2.15.0 with renderVideo() method. This is the current working implementation with modern UI controls.</p>
                    <ul class="text-sm text-gray-600 mb-6 space-y-2">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>renderVideo() API</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Full UI controls</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Duration timer</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Status logging</span>
                        </li>
                    </ul>
                    <a href="{{ route('zoom.test.method1') }}" class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-center transition-colors duration-200">
                        Test Method 1
                    </a>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300 border-t-4 border-green-500">
                    <div class="flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4 mx-auto">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-3 text-center">Method 2</h2>
                    <h3 class="text-lg font-semibold text-green-600 mb-3 text-center">Alternative Attach</h3>
                    <p class="text-gray-600 mb-4 text-sm">Uses attachVideo() with canvas elements. Alternative approach for video rendering.</p>
                    <ul class="text-sm text-gray-600 mb-6 space-y-2">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>attachVideo() API</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Canvas rendering</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Basic controls</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Status logging</span>
                        </li>
                    </ul>
                    <a href="{{ route('zoom.test.method2') }}" class="block w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg text-center transition-colors duration-200">
                        Test Method 2
                    </a>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300 border-t-4 border-purple-500">
                    <div class="flex items-center justify-center w-16 h-16 bg-purple-100 rounded-full mb-4 mx-auto">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-3 text-center">Method 3</h2>
                    <h3 class="text-lg font-semibold text-purple-600 mb-3 text-center">Simplified Elements</h3>
                    <p class="text-gray-600 mb-4 text-sm">Uses basic HTML5 video elements with startVideo(). Simplest implementation approach.</p>
                    <ul class="text-sm text-gray-600 mb-6 space-y-2">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>HTML5 video elements</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>startVideo() API</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Simple controls</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Status logging</span>
                        </li>
                    </ul>
                    <a href="{{ route('zoom.test.method3') }}" class="block w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-lg text-center transition-colors duration-200">
                        Test Method 3
                    </a>
                </div>
            </div>

            <div class="bg-gradient-to-r from-orange-50 to-orange-100 rounded-xl shadow-lg p-8 mb-8 border-2 border-orange-300">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 text-center">🎯 Real Meeting Flow</h2>
                <p class="text-center text-gray-600 mb-6">Lawyer starts meeting → User joins with meeting ID</p>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-lg p-6 shadow-md">
                        <div class="flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4 mx-auto">
                            <span class="text-3xl">👨‍⚖️</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3 text-center">Lawyer - Start Meeting</h3>
                        <p class="text-sm text-gray-600 mb-4 text-center">Create a meeting and share the ID with your client</p>
                        <a href="{{ route('zoom.test.lawyer-meeting') }}" class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-center transition-colors duration-200">
                            Start as Lawyer
                        </a>
                    </div>
                    <div class="bg-white rounded-lg p-6 shadow-md">
                        <div class="flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4 mx-auto">
                            <span class="text-3xl">👤</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3 text-center">User - Join Meeting</h3>
                        <p class="text-sm text-gray-600 mb-4 text-center">Enter the meeting ID from your lawyer to join</p>
                        <a href="{{ route('zoom.test.user-join') }}" class="block w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg text-center transition-colors duration-200">
                            Join as User
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">How to Test</h2>
                <div class="space-y-4 text-gray-600">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold mr-4">1</div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Choose a Method</h3>
                            <p class="text-sm">Click on any method above to open the test page</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold mr-4">2</div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Enter Test Parameters</h3>
                            <p class="text-sm">Fill in meeting number, username, and select your role (Host or Participant)</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold mr-4">3</div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Start the Test</h3>
                            <p class="text-sm">Click "Start Test" and allow camera/microphone permissions when prompted</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold mr-4">4</div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Monitor the Status Log</h3>
                            <p class="text-sm">Watch the status log at the bottom to see what's happening. Check for any errors.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold mr-4">5</div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Test with Two Users</h3>
                            <p class="text-sm">Open another browser (or incognito window) and join the same meeting to test video between two participants</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 rounded-lg">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-yellow-600 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <h3 class="font-bold text-yellow-800 mb-2">Important Notes</h3>
                        <ul class="text-sm text-yellow-700 space-y-1">
                            <li>• You need valid Zoom SDK credentials configured in your .env file</li>
                            <li>• Each method uses the same meeting number format, so you can test across methods</li>
                            <li>• Check browser console for detailed error messages if something doesn't work</li>
                            <li>• Make sure to allow camera and microphone permissions when prompted</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
