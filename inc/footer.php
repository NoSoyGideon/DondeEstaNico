<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer - Furry Friends</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'purple-main': '#675BC8',
                        'purple-dark': '#2E256F',
                        'purple-light': '#f3f0ff',
                        'purple-text': '#3d3477',
                        'black':'#0C0C0C',
                        'green-main': '#0A453A'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-white">
    <!-- Footer -->
    <footer class="bg-gray-50">
        <!-- Main Footer Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- How Can We Help Section -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">How Can We Help?</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="text-purple-main hover:text-purple-dark transition-colors">
                                Adopt a pet
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-gray-700 transition-colors">
                                Rehome a pet
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-gray-700 transition-colors">
                                Adopt FAQ's
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-gray-700 transition-colors">
                                Rehome FAQ's
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Us Section -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Contact Us</h3>
                    <div class="space-y-3">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-gray-600 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-600">123 Main Street, Anytown, USA</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-600 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                            <span class="text-gray-600">+1 (555) 123-4567</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-600 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                            <span class="text-purple-main">FurryFriendsSupport@gmail.com</span>
                        </div>
                    </div>
                </div>

                <!-- Keep In Touch Section -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Keep In Touch With Us</h3>
                    <p class="text-gray-600 mb-4">
                        Join the FurryFriends magazine and be first to hear about news
                    </p>
                    <div class="flex">
                        <input 
                            type="email" 
                            placeholder="E-mail Address" 
                            class="flex-1 px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-purple-main focus:border-transparent"
                        >
                        <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-2 rounded-r-md border border-l-0 border-gray-300 transition-colors">
                            Subscribe
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer Bar -->
        <div class="bg-purple-main">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex flex-col sm:flex-row justify-between items-center">
                    <div class="text-white text-sm mb-4 sm:mb-0">
                        ©2025 AdoptBudies.com
                    </div>
                    <div class="flex space-x-4">
                        <!-- Facebook -->
                        <a href="#" class="text-white hover:text-gray-200 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <!-- Pinterest -->
                        <a href="#" class="text-white hover:text-gray-200 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24c6.624 0 11.99-5.367 11.99-12.013C24.007 5.367 18.641.001 12.017.001z"/>
                            </svg>
                        </a>
                        <!-- Tumblr -->
                        <a href="#" class="text-white hover:text-gray-200 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.563 24c-5.093 0-7.031-3.756-7.031-6.411V9.747H5.116V6.648c3.63-1.313 4.512-4.596 4.71-6.469C9.84.051 9.941 0 9.999 0h3.517v6.114h4.801v3.633h-4.82v7.47c.016 1.001.375 2.371 2.207 2.371h.09c.631-.02 1.486-.205 1.936-.419l1.156 3.425c-.436.636-2.4 1.374-4.156 1.404h-.178l.011.002z"/>
                            </svg>
                        </a>
                        <!-- Instagram -->
                        <a href="#" class="text-white hover:text-gray-200 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C8.396 0 7.989.013 6.756.072 5.526.13 4.68.333 3.938.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.139C.333 4.88.131 5.727.072 6.958.013 8.19 0 8.597 0 12.017s.013 3.827.072 5.058c.058 1.23.26 2.078.558 2.818.306.79.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.74.297 1.587.499 2.818.558C7.989 23.988 8.396 24 12.017 24s3.827-.013 5.058-.072c1.23-.058 2.078-.26 2.818-.558.79-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.297-.74.499-1.587.558-2.818.058-1.23.072-1.637.072-5.058s-.013-3.827-.072-5.058c-.058-1.23-.26-2.078-.558-2.818-.306-.79-.718-1.459-1.384-2.126C18.351.935 17.682.524 16.893.218 16.151-.079 15.304-.281 14.073-.34 12.84-.398 12.433-.41 12.017-.41s-3.827.013-5.058.072c-1.23.058-2.078.26-2.818.558-.79.306-1.459.718-2.126 1.384-.666.667-1.079 1.335-1.384 2.126-.297.74-.499 1.587-.558 2.818C.013 8.19 0 8.597 0 12.017s.013 3.827.072 5.058c.058 1.23.26 2.078.558 2.818.306.79.718 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.74.297 1.587.499 2.818.558 1.23.058 1.637.072 5.058.072s3.827-.013 5.058-.072c1.23-.058 2.078-.26 2.818-.558.79-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.297-.74.499-1.587.558-2.818.058-1.23.072-1.637.072-5.058s-.013-3.827-.072-5.058c-.058-1.23-.26-2.078-.558-2.818-.306-.79-.718-1.459-1.384-2.126C18.351.935 17.682.524 16.893.218 16.151-.079 15.304-.281 14.073-.34 12.84-.398 12.433-.41 12.017-.41zm0 2.17c3.304 0 3.648.012 4.947.072 1.194.055 1.843.249 2.274.413.572.222.98.487 1.408.915.428.428.693.836.915 1.408.164.431.358 1.08.413 2.274.06 1.299.072 1.643.072 4.947s-.012 3.648-.072 4.947c-.055 1.194-.249 1.843-.413 2.274-.222.572-.487.98-.915 1.408-.428.428-.836.693-1.408.915-.431.164-1.08.358-2.274.413-1.299.06-1.643.072-4.947.072s-3.648-.012-4.947-.072c-1.194-.055-1.843-.249-2.274-.413-.572-.222-.98-.487-1.408-.915-.428-.428-.693-.836-.915-1.408-.164-.431-.358-1.08-.413-2.274-.06-1.299-.072-1.643-.072-4.947s.012-3.648.072-4.947c.055-1.194.249-1.843.413-2.274.222-.572.487-.98.915-1.408.428-.428.836-.693 1.408-.915.431-.164 1.08-.358 2.274-.413 1.299-.06 1.643-.072 4.947-.072z"/>
                                <path d="M12.017 5.838a6.179 6.179 0 1 0 0 12.358 6.179 6.179 0 0 0 0-12.358zm0 10.188a4.009 4.009 0 1 1 0-8.018 4.009 4.009 0 0 1 0 8.018z"/>
                                <circle cx="18.406" cy="5.594" r="1.44"/>
                            </svg>
                        </a>
                        <!-- YouTube -->
                        <a href="#" class="text-white hover:text-gray-200 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>