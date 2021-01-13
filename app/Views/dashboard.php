<?= $this->extend('layouts/app_layout'); ?>

<?= $this->section('content'); ?>
<div>
    <div class="mx-auto">
        <div class="relative bg-white flex flex-col h-screen max-h-screen ">

            <div class="fixed bottom-10 right-10 cursor-pointer" onclick="$('#chat-section').toggleClass('hidden')" style="z-index: 1000;">
                <div class="text-blue-500 bg-white rounded-full h-14 w-14 flex items-center justify-center duration-200 inline-block border-4 border-blue-500 shadow-lg">
                    <svg id="Layer_1" enable-background="new 0 0 128 128" class='w-10 h-10' viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
                        <path d="m86.524 82.055v-1.459c0-8.13-6.614-14.745-14.744-14.745h-12.434c-.46-3.959-3.606-7.105-7.565-7.565v-7.274c2.018-.458 3.532-2.258 3.532-4.412 0-2.499-2.033-4.531-4.532-4.531s-4.531 2.033-4.531 4.531c0 2.154 1.514 3.955 3.531 4.412v7.274c-3.959.46-7.105 3.607-7.565 7.565h-12.433c-8.131 0-14.745 6.614-14.745 14.745v1.459c-4.288.498-7.628 4.147-7.628 8.566s3.34 8.067 7.628 8.565v2.027c0 8.13 6.614 14.745 14.745 14.745h41.997c8.13 0 14.744-6.614 14.744-14.745v-2.027c4.288-.498 7.628-4.146 7.628-8.565s-3.34-8.068-7.628-8.566z" fill="#e6e7e8" />
                        <path d="m118.301 16.042h-41.177c-3.467 0-6.288 2.821-6.288 6.288v24.648c0 3.468 2.821 6.29 6.288 6.29h1.96v9.77c0 .394.23.75.59.912.132.059.271.088.41.088.24 0 .477-.086.663-.252l11.861-10.518h25.692c3.468 0 6.289-2.821 6.289-6.29v-24.648c.001-3.467-2.82-6.288-6.288-6.288z" fill="#e6e7e8" />
                        <path d="m67.78 110.957h-41.997c-7.559 0-13.745-6.185-13.745-13.745v-20.616c0-7.559 6.185-13.744 13.745-13.744h41.997c7.559 0 13.745 6.185 13.745 13.744v20.617c-.001 7.559-6.186 13.744-13.745 13.744z" fill="#6dc9f7" />
                        <path d="m67.78 62.852h-41.997c-7.559 0-13.745 6.185-13.745 13.745v3c0-7.56 6.185-13.745 13.745-13.745h41.997c7.56 0 13.745 6.185 13.745 13.745v-3c-.001-7.56-6.186-13.745-13.745-13.745z" fill="#fff" />
                        <path d="m25.783 104.085c-3.79 0-6.872-3.083-6.872-6.872v-20.617c0-3.79 3.083-6.872 6.872-6.872h41.997c3.79 0 6.872 3.083 6.872 6.872v20.617c0 3.79-3.083 6.872-6.872 6.872z" fill="#ffd7e5" />
                        <path d="m12.038 78.992v15.256c-4.215 0-7.628-3.413-7.628-7.628s3.413-7.628 7.628-7.628z" fill="#0089ef" />
                        <path d="m89.153 86.62c0 4.215-3.413 7.628-7.628 7.628v-15.256c4.214 0 7.628 3.413 7.628 7.628z" fill="#0089ef" />
                        <path d="m46.781 55.224c-4.215 0-7.628 3.413-7.628 7.628h15.257c0-4.215-3.414-7.628-7.629-7.628z" fill="#0089ef" />
                        <circle cx="46.781" cy="42.601" fill="#fa759e" r="3.532" />
                        <path d="m73.124 48.267c-2.921 0-5.288-2.368-5.288-5.289v-24.648c0-2.919 2.367-5.288 5.288-5.288h41.177c2.921 0 5.289 2.368 5.289 5.288v24.648c0 2.922-2.367 5.289-5.289 5.289h-26.073l-12.144 10.77v-10.77z" fill="#fa759e" />
                        <g fill="#3a2c60">
                            <path d="m32.855 78.839c-2.362 0-4.295 1.933-4.295 4.295s1.933 4.295 4.295 4.295c2.362 0 4.295-1.933 4.295-4.295s-1.932-4.295-4.295-4.295z" />
                            <circle cx="60.708" cy="83.134" r="4.295" />
                            <path d="m50.342 92.349c-.052.066-1.291 1.621-3.561 1.621-2.312 0-3.487-1.524-3.547-1.602-.324-.443-.945-.543-1.392-.221-.448.323-.549.948-.226 1.396.071.099 1.789 2.427 5.164 2.427 3.289 0 5.076-2.31 5.15-2.408.332-.438.246-1.059-.189-1.394-.433-.332-1.061-.254-1.399.181z" />
                            <path d="m82.524 78.055v-1.459c0-8.13-6.614-14.745-14.744-14.745h-12.434c-.46-3.959-3.606-7.105-7.565-7.565v-7.274c2.018-.458 3.532-2.258 3.532-4.412 0-2.499-2.033-4.532-4.532-4.532s-4.531 2.033-4.531 4.532c0 2.154 1.514 3.954 3.531 4.412v7.274c-3.959.46-7.105 3.607-7.565 7.565h-12.433c-8.131 0-14.745 6.614-14.745 14.745v1.459c-4.288.498-7.628 4.146-7.628 8.566 0 4.419 3.34 8.067 7.628 8.565v2.027c0 8.13 6.614 14.745 14.745 14.745h41.997c8.13 0 14.744-6.614 14.744-14.745v-2.027c4.288-.498 7.628-4.146 7.628-8.565 0-4.42-3.34-8.068-7.628-8.566zm-38.274-35.454c0-1.396 1.136-2.532 2.531-2.532 1.396 0 2.532 1.136 2.532 2.532s-1.136 2.531-2.532 2.531c-1.395 0-2.531-1.135-2.531-2.531zm2.531 13.623c3.314 0 6.069 2.446 6.553 5.628h-13.105c.483-3.182 3.238-5.628 6.552-5.628zm-41.371 30.397c0-3.315 2.446-6.069 5.628-6.553v13.106c-3.182-.485-5.628-3.239-5.628-6.553zm75.114 10.592c0 7.027-5.717 12.745-12.744 12.745h-41.997c-7.027 0-12.745-5.717-12.745-12.745v-2.964-15.257-2.396c0-7.027 5.718-12.745 12.745-12.745h13.37 15.256 13.371c7.027 0 12.744 5.717 12.744 12.745v2.396 15.256zm2-4.04v-13.106c3.182.484 5.628 3.238 5.628 6.553s-2.446 6.069-5.628 6.553z" />
                            <path d="m114.301 12.042h-41.177c-3.467 0-6.288 2.821-6.288 6.288v24.648c0 3.468 2.821 6.29 6.288 6.29h1.96v9.77c0 .394.23.75.59.912.132.059.271.088.41.088.24 0 .477-.086.663-.252l11.861-10.518h25.692c3.468 0 6.289-2.821 6.289-6.29v-5.124c0-.552-.447-1-1-1s-1 .448-1 1v5.124c0 2.365-1.924 4.29-4.289 4.29h-26.071c-.244 0-.48.089-.663.252l-10.481 9.294v-8.546c0-.552-.447-1-1-1h-2.96c-2.364 0-4.288-1.924-4.288-4.29v-24.648c0-2.364 1.924-4.288 4.288-4.288h41.177c2.365 0 4.289 1.923 4.289 4.288v5.046c0 .552.447 1 1 1s1-.448 1-1v-5.046c-.001-3.467-2.822-6.288-6.29-6.288z" />
                            <path d="m119.59 25.995c-.553 0-1 .448-1 1v6.989c0 .552.447 1 1 1s1-.448 1-1v-6.989c0-.552-.447-1-1-1z" />
                        </g>
                        <circle cx="93.713" cy="31.376" fill="#fff" r="3.37" />
                        <circle cx="80.214" cy="31.376" fill="#fff" r="3.37" />
                        <circle cx="107.211" cy="31.376" fill="#fff" r="3.37" />
                    </svg>
                </div>
            </div>
            <!-- Chat Section -->

            <div class="fixed bottom-10 right-28 bg-white shadow-md rounded-lg overflow-y-auto hidden" id="chat-section" style="max-height: 700px; z-index:1000;">
                <?= $this->include('pages/chatbot_section'); ?>
            </div>
            <!-- <div class="fixed bottom-10 right-28 bg-white shadow-md rounded-lg overflow-y-auto hidden" id="chat-section" style="max-height: 700px; z-index:1000;">
                <div class="bg-blue-500 py-8 shadow-md px-5 flex w-full sticky top-0">
                    <div class="text-blue-500 bg-white rounded-full h-14 w-14 flex items-center justify-center duration-200 inline-block" wire:click="switch_page('clinic')">
                        <svg id="Layer_1" enable-background="new 0 0 128 128" class='w-10 h-10' viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
                            <path d="m86.524 82.055v-1.459c0-8.13-6.614-14.745-14.744-14.745h-12.434c-.46-3.959-3.606-7.105-7.565-7.565v-7.274c2.018-.458 3.532-2.258 3.532-4.412 0-2.499-2.033-4.531-4.532-4.531s-4.531 2.033-4.531 4.531c0 2.154 1.514 3.955 3.531 4.412v7.274c-3.959.46-7.105 3.607-7.565 7.565h-12.433c-8.131 0-14.745 6.614-14.745 14.745v1.459c-4.288.498-7.628 4.147-7.628 8.566s3.34 8.067 7.628 8.565v2.027c0 8.13 6.614 14.745 14.745 14.745h41.997c8.13 0 14.744-6.614 14.744-14.745v-2.027c4.288-.498 7.628-4.146 7.628-8.565s-3.34-8.068-7.628-8.566z" fill="#e6e7e8" />
                            <path d="m118.301 16.042h-41.177c-3.467 0-6.288 2.821-6.288 6.288v24.648c0 3.468 2.821 6.29 6.288 6.29h1.96v9.77c0 .394.23.75.59.912.132.059.271.088.41.088.24 0 .477-.086.663-.252l11.861-10.518h25.692c3.468 0 6.289-2.821 6.289-6.29v-24.648c.001-3.467-2.82-6.288-6.288-6.288z" fill="#e6e7e8" />
                            <path d="m67.78 110.957h-41.997c-7.559 0-13.745-6.185-13.745-13.745v-20.616c0-7.559 6.185-13.744 13.745-13.744h41.997c7.559 0 13.745 6.185 13.745 13.744v20.617c-.001 7.559-6.186 13.744-13.745 13.744z" fill="#6dc9f7" />
                            <path d="m67.78 62.852h-41.997c-7.559 0-13.745 6.185-13.745 13.745v3c0-7.56 6.185-13.745 13.745-13.745h41.997c7.56 0 13.745 6.185 13.745 13.745v-3c-.001-7.56-6.186-13.745-13.745-13.745z" fill="#fff" />
                            <path d="m25.783 104.085c-3.79 0-6.872-3.083-6.872-6.872v-20.617c0-3.79 3.083-6.872 6.872-6.872h41.997c3.79 0 6.872 3.083 6.872 6.872v20.617c0 3.79-3.083 6.872-6.872 6.872z" fill="#ffd7e5" />
                            <path d="m12.038 78.992v15.256c-4.215 0-7.628-3.413-7.628-7.628s3.413-7.628 7.628-7.628z" fill="#0089ef" />
                            <path d="m89.153 86.62c0 4.215-3.413 7.628-7.628 7.628v-15.256c4.214 0 7.628 3.413 7.628 7.628z" fill="#0089ef" />
                            <path d="m46.781 55.224c-4.215 0-7.628 3.413-7.628 7.628h15.257c0-4.215-3.414-7.628-7.629-7.628z" fill="#0089ef" />
                            <circle cx="46.781" cy="42.601" fill="#fa759e" r="3.532" />
                            <path d="m73.124 48.267c-2.921 0-5.288-2.368-5.288-5.289v-24.648c0-2.919 2.367-5.288 5.288-5.288h41.177c2.921 0 5.289 2.368 5.289 5.288v24.648c0 2.922-2.367 5.289-5.289 5.289h-26.073l-12.144 10.77v-10.77z" fill="#fa759e" />
                            <g fill="#3a2c60">
                                <path d="m32.855 78.839c-2.362 0-4.295 1.933-4.295 4.295s1.933 4.295 4.295 4.295c2.362 0 4.295-1.933 4.295-4.295s-1.932-4.295-4.295-4.295z" />
                                <circle cx="60.708" cy="83.134" r="4.295" />
                                <path d="m50.342 92.349c-.052.066-1.291 1.621-3.561 1.621-2.312 0-3.487-1.524-3.547-1.602-.324-.443-.945-.543-1.392-.221-.448.323-.549.948-.226 1.396.071.099 1.789 2.427 5.164 2.427 3.289 0 5.076-2.31 5.15-2.408.332-.438.246-1.059-.189-1.394-.433-.332-1.061-.254-1.399.181z" />
                                <path d="m82.524 78.055v-1.459c0-8.13-6.614-14.745-14.744-14.745h-12.434c-.46-3.959-3.606-7.105-7.565-7.565v-7.274c2.018-.458 3.532-2.258 3.532-4.412 0-2.499-2.033-4.532-4.532-4.532s-4.531 2.033-4.531 4.532c0 2.154 1.514 3.954 3.531 4.412v7.274c-3.959.46-7.105 3.607-7.565 7.565h-12.433c-8.131 0-14.745 6.614-14.745 14.745v1.459c-4.288.498-7.628 4.146-7.628 8.566 0 4.419 3.34 8.067 7.628 8.565v2.027c0 8.13 6.614 14.745 14.745 14.745h41.997c8.13 0 14.744-6.614 14.744-14.745v-2.027c4.288-.498 7.628-4.146 7.628-8.565 0-4.42-3.34-8.068-7.628-8.566zm-38.274-35.454c0-1.396 1.136-2.532 2.531-2.532 1.396 0 2.532 1.136 2.532 2.532s-1.136 2.531-2.532 2.531c-1.395 0-2.531-1.135-2.531-2.531zm2.531 13.623c3.314 0 6.069 2.446 6.553 5.628h-13.105c.483-3.182 3.238-5.628 6.552-5.628zm-41.371 30.397c0-3.315 2.446-6.069 5.628-6.553v13.106c-3.182-.485-5.628-3.239-5.628-6.553zm75.114 10.592c0 7.027-5.717 12.745-12.744 12.745h-41.997c-7.027 0-12.745-5.717-12.745-12.745v-2.964-15.257-2.396c0-7.027 5.718-12.745 12.745-12.745h13.37 15.256 13.371c7.027 0 12.744 5.717 12.744 12.745v2.396 15.256zm2-4.04v-13.106c3.182.484 5.628 3.238 5.628 6.553s-2.446 6.069-5.628 6.553z" />
                                <path d="m114.301 12.042h-41.177c-3.467 0-6.288 2.821-6.288 6.288v24.648c0 3.468 2.821 6.29 6.288 6.29h1.96v9.77c0 .394.23.75.59.912.132.059.271.088.41.088.24 0 .477-.086.663-.252l11.861-10.518h25.692c3.468 0 6.289-2.821 6.289-6.29v-5.124c0-.552-.447-1-1-1s-1 .448-1 1v5.124c0 2.365-1.924 4.29-4.289 4.29h-26.071c-.244 0-.48.089-.663.252l-10.481 9.294v-8.546c0-.552-.447-1-1-1h-2.96c-2.364 0-4.288-1.924-4.288-4.29v-24.648c0-2.364 1.924-4.288 4.288-4.288h41.177c2.365 0 4.289 1.923 4.289 4.288v5.046c0 .552.447 1 1 1s1-.448 1-1v-5.046c-.001-3.467-2.822-6.288-6.29-6.288z" />
                                <path d="m119.59 25.995c-.553 0-1 .448-1 1v6.989c0 .552.447 1 1 1s1-.448 1-1v-6.989c0-.552-.447-1-1-1z" />
                            </g>
                            <circle cx="93.713" cy="31.376" fill="#fff" r="3.37" />
                            <circle cx="80.214" cy="31.376" fill="#fff" r="3.37" />
                            <circle cx="107.211" cy="31.376" fill="#fff" r="3.37" />
                        </svg>
                    </div>
                    <div class="flex items-center pl-5 text-white ">
                        <div class="inline-block">
                            <h2 class="font-bold text-xl">Medical Chatbot</h2>
                            <p class="text-sm">Online</p>
                        </div>
                        <div class="absolute right-5 sm:hidden" wire:click="chatbot_visibility(false)">
                            <span class="material-icons">
                                menu
                            </span>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 flex-1">
                    <div class="p-5 pt-10">
                        <ul class="flex flex-col" id="chatbot_messages">
                            <li class="w-full max-w-full flex justify-center mb-5">
                                <div class="max-w-xs bg-gray-100 py-2 px-5 rounded-3xl">
                                    <p class="text-sm font-semibold text-black text-opacity-50">Today</p>
                                </div>
                            </li>
                            <li class="w-full max-w-full flex justify-start mb-5">
                                <div class="max-w-sm bg-gray-100 py-3 px-5 rounded-3xl">
                                    <p>Welcome to Medical Chatbot, Admin. How can we help you today?</p>
                                </div>
                            </li>
                            <li class="hidden w-full max-w-full flex justify-end mb-5">
                                <div class="max-w-sm bg-blue-200 py-3 px-5 rounded-3xl">
                                    <p>Hi, Bot.</p>
                                </div>
                            </li>
                            <li class="hidden w-full max-w-full flex justify-start mb-5">
                                <div class="max-w-sm bg-gray-100 py-3 px-5 rounded-3xl">
                                    <p>Hello, Sir. Is there anything I can help?</p>
                                </div>
                            </li>
                            <li class="hidden w-full max-w-full flex justify-end mb-5">
                                <div class="max-w-sm bg-blue-200 py-3 px-5 rounded-3xl">
                                    <p>Umm, I'm not feeling well today. I am having cavity on my teeth, and my dentin is seen and my pulp felt infected.</p>
                                </div>
                            </li>
                            <li class="hidden w-full max-w-full flex justify-start mb-5">
                                <div class="max-w-sm bg-gray-100 py-3 px-5 rounded-3xl">
                                    <p>Okay, Sir. based on my data, the people that have your symtoms are also having throbbing pain. Do you feel also it?</p>
                                </div>
                            </li>
                            <li class="hidden w-full max-w-full flex justify-end mb-5">
                                <div class="max-w-sm bg-blue-200 py-3 px-5 rounded-3xl">
                                    <p>Yes you are right.</p>
                                </div>
                            </li>
                            <li class="hidden w-full max-w-full flex justify-start mb-5">
                                <div class="max-w-sm bg-gray-100 py-3 px-5 rounded-3xl">
                                    <p>Okay, Sir. I 100% confidently says that you are having Caries Profunda.</p>
                                </div>
                            </li>
                            <li class="hidden w-full max-w-full flex justify-start mb-5">
                                <div class="max-w-sm bg-gray-100 py-3 px-5 rounded-3xl">
                                    <p>Caries Profunda is Deep structural defect. Caries has penetrated up to the dentin layers of the tooth close to the pulp.</p>
                                </div>
                            </li>
                            <li class="hidden w-full max-w-full flex justify-start mb-5">
                                <div class="max-w-sm bg-gray-100 py-3 px-5 rounded-3xl">
                                    <p>My suggestion: Use dental fillings to handle it.</p>
                                </div>
                            </li>
                            <li class="hidden w-full max-w-full flex justify-start mb-5">
                                <div class="max-w-sm bg-gray-100 py-3 px-5 rounded-3xl">
                                    <p>If you feel more uncomfortable. Please go to the nearest clinic to get treatment there. Thank you.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="p-5 sticky bottom-0 bg-white w-full">
                        <div class="relative">
                            <button class="inline-flex items-center justify-center absolute right-0 top-0 h-full w-10 text-gray-400" onclick="send('this')">
                                <span class="material-icons text-blue-400">
                                    send
                                </span>
                            </button>
                            <textarea id="my_message" onkeypress="send_message_using_enter(this)" type="text" name="my_message" class="text-sm text-base placeholder-gray-500 pl-4 pr-10 rounded-3xl bg-blue-100 w-full py-2 focus:outline-none focus:border-blue-400 break-words h-10 max-h-20 resize-none overflow-y-auto" placeholder="Write a message"></textarea>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="grid grid-cols-4 sm:grid-cols-12 gap-0 flex-none">
                <div class="col-span-full h-14 bg-gray-100 shadow" style="z-index: 100;">
                    <div class="grid grid-cols-12 text-sm">
                        <div class="col-span-2 flex justify-center items-center h-14 font-semibold">
                            Workshop 2
                        </div>
                        <div class="col-span-10 flex justify-between items-center pr-20">
                            <div class="font-semibold text-black">
                                <span class="text-blue-500">Dashboard</span>
                                / <span class="current_page capitalize">Home</span>
                            </div>
                            <div class="flex justify-start items-center space-x-10">
                                <!-- Notification -->
                                <!-- <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 text-blue-100">
                                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                                    </svg>
                                </div> -->

                                <div class="relative flex justify-start items-center space-x-5">
                                    <img src='https://avataaars.io/?avatarStyle=Circle&topType=ShortHairShortWaved&accessoriesType=Prescription01&hairColor=Black&facialHairType=Blank&facialHairColor=Blonde&clotheType=Hoodie&clotheColor=PastelBlue&eyeType=Default&eyebrowType=Default&mouthType=Default&skinColor=Light' class="w-10 h-10" />
                                    <h3 class="font-semibold"><?= session()->get('data_user')['fullname']; ?></h3>
                                    <div class="w-4 h-4 bg-blue-500 rounded-full cursor-pointer" onclick="$('#dropdown-profile').toggle()">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-full h-full text-white">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div id="dropdown-profile" class="absolute top-16 left-0 rounded-lg shadow-md w-full bg-white hidden overflow-hidden" style="z-index: 100;">
                                        <a href="javascript:;" class="block h-10 px-3 flex items-center hover:bg-blue-500 hover:text-white duration-200" onclick="switch_page(this, 'profile')">Edit Profile</a>
                                        <hr>
                                        <a href="/auth/logout" class="block h-10 px-3 flex items-center hover:bg-blue-500 hover:text-white duration-200">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Navigation  -->
                <?= $this->include('pages/sidebar_navigation'); ?>

                <div class="col-span-10 bg-blue-100 px-5 py-10">
                    <div class="grid grid-cols-10 gap-5">
                        <div class="col-span-full">
                            <h3 class="text-sm font-semibold text-black text-opacity-70">DASHBOARD - <span class="font-normal current_page uppercase">HOME</span></h3>
                        </div>
                        <div class="col-span-full">
                            <div class="w-full h-32 bg-gradient-to-r from-blue-500 to-blue-300 rounded-lg flex justify-between items-center px-10 py-5 shadow">
                                <div class="">
                                    <h3 class="font-bold text-xl text-white">Diagnose your dental health in minutes</h3>
                                    <p class="text-xs break-words text-white text-opacity-70">Interact with our Artificial Intelligent Chatbot to diagnose your dental disease</p>
                                </div>
                                <button class="h-10 px-5 bg-blue-500 text-white rounded-lg text-sm font-semibold" onclick="$('#chat-section').toggleClass('hidden')">Start Consultation</button>
                            </div>
                        </div>
                        <!-- <div class="col-span-full">
                            <h3 class="text-2xl font-bold text-black text-opacity-70">
                                Overview
                            </h3>
                        </div> -->
                        <!-- Main Menu  -->
                        <?php echo $this->include('pages/main_section');
                        ?>
                    </div>
                </div>


                <!-- Secondary Menu  -->
                <?php // $this->include('pages/secondary_section'); 
                ?>

                <!-- Chatbot Section -->
                <?php // $this->include('pages/chatbot_section'); 
                ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    function renderChart() {
        var options = {
            series: [{
                name: 'MALE',
                data: [44, 55, 41, 67, 22, 43, 21, 49]
            }, {
                name: 'FEMALE',
                data: [13, 23, 20, 8, 13, 27, 33, 12]
            }],
            chart: {
                type: 'bar',
                height: 350,
                stacked: true,
                stackType: '100%'
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        position: 'bottom',
                        offsetX: -10,
                        offsetY: 0
                    }
                }
            }],
            xaxis: {
                categories: ['Penyakit 1', 'Penyakit 2', 'Penyakit 3', 'Penyakit 4', 'Penyakit 5', 'Penyakit 6', 'Penyakit 7', 'Penyakit 8'],
            },
            fill: {
                opacity: 1
            },
            legend: {
                position: 'right',
                offsetX: 0,
                offsetY: 50
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        var options = {
            series: [40, 20],
            labels: ['Male', 'Female'],
            chart: {
                width: 100,
                type: 'donut',
            },
            legend: {
                show: false,
            },

        };

        var chart = new ApexCharts(document.querySelector("#chart_total_users"), options);
        chart.render();
    }
</script>
<script>
    let isRequesting = false;
    // Script for finding nearest clinic

    const API_KEY = "rtXBXS1sI6FJJUMMU9vBwxKnGDJNKfE0CRyiZA1f_WQ"
    const REST_API_KEY = "rtXBXS1sI6FJJUMMU9vBwxKnGDJNKfE0CRyiZA1f_WQ"

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(find_clinic);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function find_clinic(position) {
        function create_list_clinic(data) {
            let list_clinic = $("#list")

            data.forEach(item => {
                let dist = item.distance > 1000 ? (item.distance / 1000).toFixed(1) + " km" : item.distance + " m"
                list_clinic.append(`
                    <div class="min-h-max w-full hover:bg-blue-100 flex items-center justify-between px-5 py-3 cursor-pointer list-item" onclick="show_location_detail(this, '${item.id}')">
                        <div class="">
                            <h3 class="mb-2">${item.title}</h3>
                            <p class="text-xs text-blue-500 text-opacity-70">${dist}</p>
                            <p class="text-xs text-blue-500 text-opacity-70">${item.address.street}, ${item.address.city}</p>
                        </div>
                        <div class="w-5 h-5 rounded-full bg-blue-500 flex justify-center items-center">
                            <span class="material-icons text-white">
                                navigate_next
                            </span>
                        </div>
                    </div>
                `)
            })
            $('#loading_clinic').remove()
            $('#result_clinic').html(`<span class="font-bold">${data.length} Dental Clinics </span> found closest to you.`)
        }

        if (window.clinic_data) {
            create_list_clinic(window.clinic_data)
        } else {
            let url = `https://discover.search.hereapi.com/v1/discover?at=${position.coords.latitude},${position.coords.longitude}&limit=10&lang=en&q=dental&apiKey=${REST_API_KEY}`
            $.ajax({
                type: 'GET',
                url: url,
                success: (data) => {
                    window.clinic_data = data.items
                    window.position = position
                    create_list_clinic(window.clinic_data)
                }
            })
        }
    }

    function renderMap(latitude, longitude) {
        let el = document.getElementById('mapContainer')
        el.innerHTML = ''


        var platform = new H.service.Platform({
            'apikey': API_KEY
        });

        var defaultLayers = platform.createDefaultLayers()

        var map = new H.Map(
            document.getElementById('mapContainer'),
            defaultLayers.vector.normal.map, {
                zoom: 10,
                center: {
                    lat: latitude,
                    lng: longitude
                }
            });

        var ui = H.ui.UI.createDefault(map, defaultLayers)

        let group = new H.map.Group();
        map.addObject(group);

        var routingParameters = {
            'routingMode': 'fast',
            'transportMode': 'car',
            'origin': `${window.position.coords.latitude},${window.position.coords.longitude}`,
            'destination': `${latitude},${longitude}`,
            'return': 'polyline'
        };

        var onResult = function(result) {
            if (result.routes.length) {
                result.routes[0].sections.forEach((section) => {
                    let linestring = H.geo.LineString.fromFlexiblePolyline(section.polyline);

                    let routeLine = new H.map.Polyline(linestring, {
                        style: {
                            strokeColor: 'blue',
                            lineWidth: 3
                        }
                    });

                    let svg_marker_start = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="48px" height="48px"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2c-4.97 0-9 4.03-9 9 0 4.17 2.84 7.67 6.69 8.69L12 22l2.31-2.31C18.16 18.67 21 15.17 21 11c0-4.97-4.03-9-9-9zm0 2c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.3c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg>`

                    let svg_marker_end = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="48px" height="48px"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>`

                    svg_marker_start = new H.map.Icon(svg_marker_start)
                    svg_marker_end = new H.map.Icon(svg_marker_end)

                    // Create a marker for the start point:
                    let startMarker = new H.map.Marker(section.departure.place.location, {
                        icon: svg_marker_start
                    });

                    // Create a marker for the end point:
                    let endMarker = new H.map.Marker(section.arrival.place.location, {
                        icon: svg_marker_end
                    });

                    // Add the route polyline and the two markers to the map:
                    map.addObjects([routeLine, startMarker, endMarker]);

                    // Set the map's viewport to make the whole route visible:
                    map.getViewModel().setLookAtData({
                        bounds: routeLine.getBoundingBox()
                    });
                });
            }
        };

        var router = platform.getRoutingService(null, 8);

        router.calculateRoute(routingParameters, onResult,
            function(error) {
                alert(error.message);
            });
    }

    function show_location_detail(e, id) {
        $('.no-selected').addClass('hidden')
        $('#mapContainer').removeClass('hidden')
        $(".list-item").removeClass('bg-blue-100')
        $(".list-item").addClass('bg-white')
        $(e).removeClass('bg-white')
        $(e).addClass('bg-blue-100')


        let clinic_name = $(".clinic-name").empty()
        let clinic_distance = $(".clinic-distance").empty()
        let clinic_address = $(".clinic-address").empty()
        let clinic_categories = $(".clinic-categories").empty()

        $('#clinic-detail').removeClass('hidden')

        let data = window.clinic_data.filter((item) => {
            return item.id == id
        })
        data = data[0]

        let dist = data.distance > 1000 ? (data.distance / 1000).toFixed(1) + " km" : data.distance + " m"

        clinic_name.text(data.title)
        clinic_distance.text(dist)
        clinic_address.text(data.address.label)
        data.categories.forEach(item => {
            clinic_categories.append(`
                    <div class="min-h-max bg-blue-100 max-w-max rounded-lg px-5 py-3 text-blue-500 inline-flex justify-center items-center font-semibold">
                        ${item.name}
                    </div>
            `)
        });

        renderMap(data.position.lat, data.position.lng)


    }
</script>
<script>
    function show_disease_detail(e, id) {
        $('.no-selected').addClass('hidden')
        $('#disease-detail').removeClass('hidden')
        $(".list-item").removeClass('bg-blue-100')
        $(".list-item").addClass('bg-white')
        $(e).removeClass('bg-white')
        $(e).addClass('bg-blue-100')

        let disease_name = $(".disease-name")
        let disease_definition = $(".disease-definition")
        let disease_symptoms = $(".disease-symptoms")
        let disease_treatments = $(".disease-treatments")

        disease_name.empty()
        disease_definition.empty()
        disease_symptoms.empty()
        disease_treatments.empty()

        $.ajax({
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            type: "POST",
            url: "/dashboard/disease",
            data: {
                id: id
            },
            success: function(data) {
                data = JSON.parse(data)
                disease_name.text(data.name)
                disease_definition.text(data.definition)
                data.symptoms.forEach((item) => {
                    disease_symptoms.append(`
                    <div class="min-h-max bg-blue-100 max-w-max rounded-lg px-5 py-3 text-blue-500 inline-flex justify-center items-center font-semibold">
                        ${item[1]}
                    </div>
                    `)
                })
                data.treatments.forEach((item) => {
                    disease_treatments.append(`
                    <div class="min-h-max bg-blue-100 max-w-max rounded-lg px-5 py-3 text-blue-500 inline-flex justify-center items-center font-semibold">
                        ${item[1]}
                    </div>`)
                })
            }
        })
    }

    function search_item(e) {
        $('.no-item').hide()
        let keyword = $(e).val().toLowerCase()
        $('.search_keyword').text(keyword)

        $(".list-item").filter(function() {
            $(this).toggle($(this).find('h3').text().toLowerCase().indexOf(keyword) > -1)
        })
        if ($('.list-item:visible').length < 1)
            $('.no-item').show()
    }

    function start_consultation() {
        $.ajax({
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            type: "GET",
            url: "<?= base_url(); ?>/dashboard/start_consultation",
            success: function(data) {
                $('#chatbot_content').empty()
                $('#chatbot_content').html(data)
            }
        })
    }

    function update_scroll() {
        if ($('#chat_section').length > 0) {
            $('#chat_section').animate({
                scrollTop: $('#chat_section').get(0).scrollHeight
            }, 800);
        }

    }

    function getTimeNow() {
        let time = new Date()
        return time.getHours() + ":" + time.getMinutes()
    }

    function send(message) {
        $("#my_message").val("")
        $.ajax({
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            type: "POST",
            url: "/dashboard/send_message",
            data: {
                message: message
            },
            success: function(data) {
                data = JSON.parse(data)
                console.log(data)
                $("#chatbot_messages").append(`
                    <li class="w-full max-w-full flex justify-start mb-5">
                        <div class="max-w-sm bg-gray-100 py-3 px-5 rounded-3xl">
                            <p>${data.response.result}</p>
                            <p class="w-full text-right text-xs font-semibold mt-1 text-black text-opacity-50">${getTimeNow()}</p>
                        </div>
                    </li>
                `)

                update_scroll()
            }
        })
        // $.ajax({
        //     headers: {
        //         'X-Requested-With': 'XMLHttpRequest'
        //     },
        //     type: "POST",
        //     url: "/dashboard/get_response",
        //     data: {
        //         message: message
        //     },
        //     success: function(data) {
        //         data = JSON.parse(data)
        //         console.log(data)
        //         $("#chatbot_messages").append(`
        //             <li class="w-full max-w-full flex justify-start mb-5">
        //                 <div class="max-w-sm bg-gray-100 py-3 px-5 rounded-3xl">
        //                     <p>${data.response}</p>
        //                     <p class="w-full text-right text-xs font-semibold mt-1 text-black text-opacity-50">${getTimeNow()}</p>
        //                 </div>
        //             </li>
        //         `)
        //         update_scroll()
        //     }
        // })
    }

    function send_message_using_enter(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            send($(e).val())
            update_scroll()
        }
    }

    function send_message(e) {
        let message = $("#my_message").val()
        if (message.trim() != "") {
            let new_element = $(`
            <li class="w-full max-w-full flex justify-end mb-5">
                <div class="max-w-sm bg-blue-200 py-3 px-5 rounded-3xl">
                    <p>${message}</p>
                    <p class="w-full text-right text-xs font-semibold mt-1 text-black text-opacity-50">${getTimeNow()}</p>
                </div>
            </li>
        `)
            $("#chatbot_messages").append(new_element)
            update_scroll()
            send(message)
        }
    }

    function renderChatbotSection() {
        $.ajax({
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            type: "GET",
            url: "<?= base_url(); ?>/dashboard/chatbot",
            success: function(data) {
                $('#chatbot_content').empty()
                $('#chatbot_content').html(data)
                update_scroll()
            }
        })
    }

    function switch_page(e, page) {
        if ($('body').find(`#main_${page}`).length === 0) {

            $(".menu").removeClass('bg-blue-100')
            $(e).addClass('bg-blue-100')

            $.ajax({
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                type: "POST",
                url: "<?= base_url(); ?>/dashboard/main",
                data: {
                    page: page
                },
                success: function(data) {
                    data = JSON.parse(data)
                    $('.current_page').empty()
                    $('.current_page').text(page)

                    $('#main_content').empty()
                    $('#main_content').html(data.main)

                    $('#secondary_content').empty()
                    $('#secondary_content').html(data.secondary)
                    if (page == 'home')
                        renderChart()
                }
            })

            if (page == 'clinic') {
                getLocation()
            }
        }
    }


    function update_profile(e) {
        $(e).prev(`p`).remove()
        $(e).html('Saving...')
        $(e).attr('disabled', '')
        $(e).addClass('bg-opacity-25 shadow-inner')
        let el = $(e).attr('name')

        function success_information(e) {
            $(e).prev(`p`).remove()
            $(e).before(`<p class="text-white mr-3">Saved.</p>`)
            $(e).html('Save')
            $(e).removeAttr('disabled')
            $(e).removeClass('bg-opacity-25 shadow-inner')
        }
        if (el == "profile_information") {
            $.ajax({
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                type: 'POST',
                url: "<?= route_to('update_profile'); ?>",
                data: {
                    key: el,
                    prefix: $('#prefix').val(),
                    fullname: $('#fullname').val(),
                    birthdate: $('#birthdate').val(),
                    occupation: $('#occupation').val()
                },
                success: (data) => {
                    success_information(e)
                }
            })
        } else if (el == "update_email_and_password") {
            $.ajax({
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                type: 'POST',
                url: "<?= route_to('update_profile'); ?>",
                data: {
                    key: el,
                    password: $('#password').val(),
                    email: $('#email').val(),
                },
                success: (data) => {
                    success_information(e)
                }
            })
        }

    }

    function remove_field(e, field) {
        let id = $(e).siblings('div').find(`.${field}-id`).text()
        let name = $(e).siblings('div').find(`.${field}-name`).text()

        $(`.${field}-id:contains("${id}")`).closest('div').show()

        $(e).closest('li').remove()
    }

    function add_field(e, field) {
        let id = $(e).find(`.${field}-id`).text()
        let name = $(e).find(`.${field}-name`).text()

        if ($(`.selected-${field}-item`).find(`.${field}-id`).filter(function() {
                return $(this).text() === id;
            }).length < 1) {
            $(e).closest('li').before(`
                <li class="flex justify-start items-center space-x-3 selected-${field}-item">
                    <div class="space-x-3 bg-blue-100 rounded-lg w-full px-5 py-2 text-blue-500 text-sm font-semibold">
                        <span class="${field}-id mr-3">${id}</span>
                        <span class="${field}-name">${name}</span>
                    </div>
                    <span class="material-icons cursor-pointer text-red-500" onclick="remove_field(this, '${field}')">
                        delete
                    </span>
                </li>
            `)
        }


        $(e).hide()
    }

    function reset_disease_form() {
        $('input[name="disease_id"]').remove()
        $('input[name="disease_name"]').val('')
        $('input[name="disease_definition"]').val('')
        $('.selected-symptom-item').remove()
        $('.selected-treatment-item').remove()
        $(`.symptom-id`).closest('div').show()
        $(`.treatment-id`).closest('div').show()
        $('#delete_disease').addClass('hidden')
    }

    function save_disease() {
        if (!isRequesting) {
            isRequesting = true

            Swal.fire(
                Swal.showLoading(),
                'Saving your data..',
                'warning'
            )

            let disease_name = $(`input[name="disease_name"]`).val().trim()
            let disease_definition = $(`input[name="disease_definition"]`).val().trim()

            let total_symptoms = $(`.selected-symptom-item`).length
            let total_treatments = $(`.selected-treatment-item`).length

            let symptoms_data = []
            for (let i = 0; i < total_symptoms; i++) {
                let symptom_id = $($(`.selected-symptom-item`)[i]).find('.symptom-id').text()
                symptoms_data.push(symptom_id)
            }
            let treatments_data = []
            for (let i = 0; i < total_treatments; i++) {
                let treatment_id = $($(`.selected-treatment-item`)[i]).find('.treatment-id').text()
                treatments_data.push(treatment_id)
            }

            let disease_id = $('input[name="disease_id"]') ? $('input[name="disease_id"]').val() : undefined

            let data = {
                disease_id: disease_id,
                disease_name: disease_name,
                disease_definition: disease_definition,
                symptoms_data: symptoms_data,
                treatments_data: treatments_data
            }

            $.ajax({
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                type: 'POST',
                url: "/dashboard/create_disease",
                data: data,
                success: (data) => {
                    $('#list').append(`
                        <div class="h-14 w-full hover:bg-blue-100 flex items-center justify-between px-5 cursor-pointer list-item" onclick="edit_disease(this, ${data})">
                            <h3>${disease_name}</h3>
                            <div class="w-5 h-5 rounded-full bg-blue-500 flex justify-center items-center">
                                <span class="material-icons text-white">
                                    navigate_next
                                </span>
                            </div>
                        </div>
                    `)
                    Swal.fire(
                        'Saved!',
                        'New disease has been saved.',
                        'success'
                    )
                    reset_disease_form()
                }
            })

            isRequesting = false
        }
    }

    function add_disease(e) {
        $('#disease-detail').removeClass('hidden')
        $('.no-selected').addClass('hidden')
        $('.list-item').removeClass('bg-blue-100')
        $('.list-item').addClass('bg-white')
        $(e).addClass('bg-blue-100')
        $(e).removeClass('bg-white')

        reset_disease_form()
    }

    function edit_disease(e, id) {
        $('#disease-detail').removeClass('hidden')
        $('.no-selected').addClass('hidden')
        $('.list-item').removeClass('bg-blue-100')
        $('.list-item').addClass('bg-white')
        $(e).addClass('bg-blue-100')
        $(e).removeClass('bg-white')
        reset_disease_form()

        function create_fields(data) {
            $('input[name="disease_name"]').val(data.name)
            $('input[name="disease_name"]').before(`
                <input type="hidden" name="default_name_disease" value="${data.name}">
                <input type="hidden" name="disease_id" value="${data.id}">
            `)
            $('input[name="disease_definition"]').val(data.definition)

            data.symptoms.forEach((item, index) => {
                $('#disease_symptoms').prepend(`
                    <li class="flex justify-start items-center space-x-3 selected-symptom-item">
                        <div class="space-x-3 bg-blue-100 rounded-lg w-full px-5 py-2 font-semibold text-sm text-blue-500">
                            <span class="symptom-id mr-3">${item[0]}</span>
                            <span class="symptom-name">${item[1]}</span>
                        </div>
                        <span class="material-icons cursor-pointer text-red-500" onclick="remove_field(this, 'symptom')">
                            delete
                        </span>
                    </li>
                `)
            });

            data.treatments.forEach((item, index) => {
                $('#disease_treatments').prepend(`
                    <li class="flex justify-start items-center space-x-3 selected-treatment-item">
                        <div class="space-x-3 bg-blue-100 rounded-lg w-full px-5 py-2 font-semibold text-sm text-blue-500">
                            <span class="treatment-id mr-3">${item[0]}</span>
                            <span class="treatment-name">${item[1]}</span>
                        </div>
                        <span class="material-icons cursor-pointer text-red-500" onclick="remove_field(this, 'treatment')">
                            delete
                        </span>
                    </li>
                `)
            });
            $('#delete_disease').removeClass('hidden')
        }

        $.ajax({
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            type: "POST",
            url: "/dashboard/disease",
            data: {
                id: id
            },
            success: function(data) {
                data = JSON.parse(data)
                create_fields(data)
            }
        })
    }

    function delete_disease() {
        let id = $('input[name="disease_id"]')
        let name = $(`input[name="default_name_disease"]`).val()

        if (id.length > 0) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        type: "POST",
                        url: "/dashboard/delete_disease",
                        data: {
                            id: id.val()
                        },
                        success: function(data) {
                            data = JSON.parse(data)
                            $('.disease-item').find(`h3:contains("${name}")`).closest('li').remove()
                            Swal.fire(
                                'Deleted!',
                                'The disease data has been deleted.',
                                'success'
                            )
                            reset_disease_form()
                        }
                    })
                }

            })
        }
    }

    function search_symptom(e) {
        let keyword = $(e).val().toLowerCase()

        let result = $(".symptom-item").filter(function() {
            $(this).toggle($(this).children('.symptom-name').text().toLowerCase().indexOf(keyword) > -1)
        })

        if ($(".symptom-item:visible").length == 0) {
            $('#symptom_keyword').text(keyword)
            $(e).parent().siblings('.no-result').removeClass('hidden')
        } else {
            $(e).parent().siblings('.no-result').addClass('hidden')
        }
    }

    function search_treatment(e) {
        let keyword = $(e).val().toLowerCase()

        let result = $(".treatment-item").filter(function() {
            $(this).toggle($(this).children('.treatment-name').text().toLowerCase().indexOf(keyword) > -1)
        })

        if ($(".treatment-item:visible").length == 0) {
            $('#treatment_keyword').text(keyword)
            $(e).parent().siblings('.no-result').removeClass('hidden')
        } else {
            $(e).parent().siblings('.no-result').addClass('hidden')
        }
    }

    function create_symptom(e) {
        $('.loading-symptom').removeClass('hidden')
        let keyword = $(e).find('#symptom_keyword').text()
        $.ajax({
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            type: "POST",
            url: "/dashboard/create_symptom",
            data: {
                keyword: keyword
            },
            success: function(data) {
                data = JSON.parse(data)
                $(e).closest('div').before(`
                        <div class="w-full p-3 hover:bg-blue-500 hover:text-blue-100 duration-200 rounded-lg cursor-pointer symptom-item" onclick="add_field(this, 'symptom')">
                            <span class="symptom-id mr-3">${data}</span>
                            <span class="symptom-name">${keyword}</span>
                        </div>
                    `)

                $(e).closest('div').addClass('hidden')
                $('.loading-symptom').addClass('hidden')
            }
        })

    }

    function create_treatment(e) {
        $('.loading-treatment').removeClass('hidden')
        let keyword = $(e).find('#treatment_keyword').text()

        $.ajax({
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            type: "POST",
            url: "/dashboard/create_treatment",
            data: {
                keyword: keyword
            },
            success: function(data) {
                data = JSON.parse(data)
                $(e).closest('div').before(`
                    <div class="w-full p-3 hover:bg-blue-500 hover:text-blue-100 duration-200 rounded-lg cursor-pointer treatment-item" onclick="add_field(this, 'treatment')">
                        <span class="treatment-id mr-3">${data}</span>
                        <span class="treatment-name">${keyword}</span>
                    </div>
                `)

                $(e).closest('div').addClass('hidden')
                $('.loading-treatment').addClass('hidden')
            }
        })
    }

    function toggle_symptom_modal(e) {
        $('#symptoms_modal').toggle()
    }

    function toggle_treatment_modal(e) {
        $('#treatments_modal').toggle()
    }

    function reset_symptom_form() {
        $('#symptom-detail').removeClass('hidden')

        $('.no-selected').addClass('hidden')
        $('input[name="symptom_id"]').remove()
        $('input[name="symptom_name"]').val('')
        $('.selected-pattern-item').closest('li').remove()
        $('.selected-response-item').closest('li').remove()
    }

    function add_symptom() {
        reset_symptom_form()
    }

    function remove_field_symptom(e) {
        $(e).closest('li').remove()
    }

    function add_field_symptom(e, field, value = "") {

        $(e).closest('li').before(`
                <li class="space-x-3 flex justify-start items-center">
                    <input type="text" class="rounded-lg w-full bg-white ring-2 ring-blue-100 focus:ring-blue-500 duration-200 h-10 px-5 selected-${field}-item" value="${value == null ? '' : value}">
                    <span class="material-icons text-red-500 cursor-pointer" onclick="remove_field_symptom(this)">delete</span>
                </li>
            `)

        $(e).closest('li').prev().find('input').focus()
    }

    function edit_symptom(e, id) {
        reset_symptom_form()
        $.ajax({
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            type: "POST",
            url: "/dashboard/edit_symptom",
            data: {
                id: id
            },
            success: function(data) {
                data = JSON.parse(data)
                $(`input[name="symptom_name"]`).val(data.name)
                $(`input[name="symptom_name"]`).after(`
                    <input type="hidden" name="symptom_id" value="${data.id}">                
                `)
                data.patterns.forEach((item) => {
                    add_field_symptom($('#add_pattern'), 'pattern', item[1])
                })
                data.responses.forEach((item) => {
                    add_field_symptom($('#add_response'), 'response', item[1])
                })
            }
        })
    }

    function save_symptom() {
        let name = $('input[name="symptom_name"]').val()
        let patterns = []
        let responses = []

        Swal.fire(
            Swal.showLoading(),
            'Saving your data..',
            'warning'
        )

        $('.selected-pattern-item').each((index) => {
            patterns.push($($('.selected-pattern-item')[index]).val())
        })
        $('.selected-response-item').each((index) => {
            responses.push($($('.selected-response-item')[index]).val())
        })
        let id = $('input[name="symptom_id"]').length > 0 ? $('input[name="symptom_id"]').val() : undefined

        let data = {
            symptom_id: id,
            symptom_name: name,
            symptom_patterns: patterns,
            symptom_responses: responses
        }
        $.ajax({
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            type: "POST",
            url: "/dashboard/create_symptom_with_patterns",
            data: data,
            success: function(data) {
                data = JSON.parse(data)
                if (data != '') {
                    $("#disease_list").append(`
                        <li class="mt-3 p-5 w-full rounded-3xl cursor-pointer bg-blue-100 text-blue-500 disease-item" onclick="edit_symptom(this,${data})">
                            <h3>${name}</h3>
                        </li>
                    `)
                }
                Swal.fire(
                    'Saved!',
                    'New symptom has been saved.',
                    'success'
                )
                reset_symptom_form()
            }
        })
    }

    function reset_tag_form() {
        $('#tag-detail').removeClass('hidden')
        $('.no-selected').addClass('hidden')
        $('input[name="tag_id"]').remove()
        $('input[name="tag_name"]').val('')
        $('.selected-pattern-item').closest('li').remove()
        $('.selected-response-item').closest('li').remove()
    }

    function add_tag() {
        reset_tag_form()
    }

    function remove_field_tag(e) {
        $(e).closest('li').remove()
    }

    function add_field_tag(e, field, value = "") {

        $(e).closest('li').before(`
                <li class="space-x-3 flex justify-start items-center">
                    <input type="text" class="rounded-lg w-full bg-white ring-2 ring-blue-100 focus:ring-blue-500 duration-200 h-10 px-5 selected-${field}-item" value="${value == null ? '' : value}">
                    <span class="material-icons text-red-500 cursor-pointer" onclick="remove_field_tag(this)">delete</span>
                </li>
            `)

        $(e).closest('li').prev().find('input').focus()
    }

    function edit_tag(e, id) {
        reset_tag_form()
        $.ajax({
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            type: "POST",
            url: "/dashboard/edit_tag",
            data: {
                id: id
            },
            success: function(data) {
                data = JSON.parse(data)
                $(`input[name="tag_name"]`).val(data.name)
                $(`input[name="tag_name"]`).after(`
                    <input type="hidden" name="tag_id" value="${data.id}">                
                `)
                data.patterns.forEach((item) => {
                    add_field_tag($('#add_pattern'), 'pattern', item[1])
                })
                data.responses.forEach((item) => {
                    add_field_tag($('#add_response'), 'response', item[1])
                })
            }
        })
    }

    function save_tag() {
        let name = $('input[name="tag_name"]').val()
        let patterns = []
        let responses = []

        Swal.fire(
            Swal.showLoading(),
            'Saving your data..',
            'warning'
        )

        $('.selected-pattern-item').each((index) => {
            patterns.push($($('.selected-pattern-item')[index]).val())
        })
        $('.selected-response-item').each((index) => {
            responses.push($($('.selected-response-item')[index]).val())
        })
        let id = $('input[name="tag_id"]').length > 0 ? $('input[name="tag_id"]').val() : undefined

        let data = {
            tag_id: id,
            tag_name: name,
            tag_patterns: patterns,
            tag_responses: responses
        }
        $.ajax({
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            type: "POST",
            url: "/dashboard/create_tag_with_patterns",
            data: data,
            success: function(data) {
                data = JSON.parse(data)
                if (data != '') {
                    $("#disease_list").append(`
                        <li class="mt-3 p-5 w-full rounded-3xl cursor-pointer bg-blue-100 text-blue-500 disease-item" onclick="edit_tag(this,${data})">
                            <h3>${name}</h3>
                        </li>
                    `)
                }
                Swal.fire(
                    'Saved!',
                    'New tag has been saved.',
                    'success'
                )
                reset_tag_form()
            }
        })
    }

    function train_data(e) {
        Swal.fire({
            icon: 'warning',
            title: 'Training your data...',
            showConfirmButton: false
        })
        $.ajax({
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            type: "GET",
            url: "/dashboard/train_data",
            success: function(data) {
                data = JSON.parse(data)
                Swal.fire(
                    `${data.response}`,
                    'Your model has been created!.',
                    'success'
                )
            }
        })
    }

    function show_report(e, id) {
        $('.no-selected').addClass('hidden')
        $('#report-detail').removeClass('hidden')
        $(".list-item").removeClass('bg-blue-100')
        $(".list-item").addClass('bg-white')
        $(e).removeClass('bg-white')
        $(e).addClass('bg-blue-100')

        $.ajax({
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            type: "POST",
            data: {
                id: id
            },
            url: "/dashboard/get_report",
            success: function(data) {
                data = JSON.parse(data)
                console.log(data)
                data[0].forEach(item => {
                    $('.detected-symptoms').append(`
                        <div class="min-h-max bg-yellow-100 max-w-max rounded-lg px-5 py-3 text-yellow-500 inline-flex justify-center items-center font-semibold">
                            ${item.symptom_name}
                        </div>
                    `)
                })
                data[1].forEach(item => {
                    $('.detected-diseases').append(`
                        <div>
                            <h3 class="font-semibold text-red-500 my-3">Disease</h3>
                            <div class="min-h-max bg-red-100 max-w-max rounded-lg px-5 py-3 text-red-500 inline-flex justify-center items-center font-semibold">
                                ${item.disease}
                            </div>
                            <h3 class="font-semibold text-gray-500 my-3">Definition</h3>
                            <div class="min-h-max bg-gray-100 max-w-max rounded-lg px-5 py-3 text-gray-500 inline-flex justify-center items-center font-semibold">
                                ${item.definition}
                            </div>
                            <h3 class="font-semibold text-blue-500 my-3">Treatments</h3>
                        </div>
                    `)
                    item.treatments.forEach((treatment) => {
                        $('.detected-diseases').children('div').append(`
                        <div class="min-h-max bg-blue-100 max-w-max rounded-lg px-5 py-3 text-blue-500 inline-flex justify-center items-center font-semibold">
                                ${treatment}
                            </div>`)
                    })
                })
            }
        })
    }

    $(() => {
        switch_page($("#<?= session('page'); ?>"), '<?= session('page'); ?>')
        renderChatbotSection()
    })
</script>
<?= $this->endSection(); ?>