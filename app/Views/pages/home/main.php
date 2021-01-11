<!-- Main Section -->
<!-- Quick Stats -->
<div id="main_home" class="col-span-full">
    <div class="grid grid-cols-10 gap-5">
        <div class="col-span-3 shadow rounded-lg bg-white text-sm overflow-hidden">
            <h3 class="font-semibold p-5">Quick Stats</h3>
            <hr>
            <div class="px-5 text-blue-500 font-semibold duration-200">
                <div class="w-full flex justify-between items-end py-5">
                    <div>
                        <h3 class="text-2xl">99</h3>
                        <p class="text-sm">Users</p>
                    </div>
                    <div id="chart_total_users">
                    </div>
                </div>
                <div class="w-full flex justify-between items-end py-5">
                    <div>
                        <h3 class="text-2xl">99</h3>
                        <p class="text-sm">Conversations</p>
                    </div>
                    <div class="text-black text-opacity-70 text-center" style="width: 100px;">
                        <h3 class="text-lg">99</h3>
                        <p class="text-xs">Chats</p>
                    </div>
                </div>
                <div class="w-full flex justify-between items-end py-5">
                    <div>
                        <h3 class="text-2xl">99</h3>
                        <p class="text-sm">Reports</p>
                    </div>
                    <div class="text-black text-opacity-70 text-center flex justify-between" style="width: 130px;">
                        <div>
                            <h3 class="text-lg">99</h3>
                            <p class="text-xs">Diseases</p>
                        </div>
                        <div>
                            <h3 class="text-lg">99</h3>
                            <p class="text-xs">Symptoms</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-7 shadow rounded-lg bg-white text-sm overflow-hidden">
            <div class="flex justify-between items-center p-5">
                <h3 class="font-semibold">Detected Diseases (<span class="filtered_graph_by">current month</span>)</h3>
                <div class="flex justify-start items-center space-x-2">
                    <div class="w-5 h-5 rounded-full bg-blue-500 flex justify-center items-center">
                        <span class="material-icons text-white">
                            navigate_before
                        </span>
                    </div>
                    <div class="w-5 h-5 rounded-full bg-blue-500 flex justify-center items-center">
                        <span class="material-icons text-white">
                            navigate_next
                        </span>
                    </div>
                </div>
            </div>
            <hr>
            <div id="chart" class="px-5 flex justify-between items-center h-auto text-blue-500 font-semibold">

            </div>
        </div>
        <!-- Recent Reports -->
        <div class="col-span-full shadow rounded-lg bg-white text-sm overflow-hidden">
            <h3 class="font-semibold p-5">Recent Reports</h3>
            <hr>
            <div class="px-5 flex justify-between items-center h-20 text-blue-500 hover:bg-blue-100 font-semibold duration-200">
                <div class="flex justify-start items-center">
                    <span class="material-icons mr-5">
                        assignment
                    </span>
                    20 December 2020
                </div>
                <div class="w-5 h-5 rounded-full bg-blue-500 flex justify-center items-center">
                    <span class="material-icons text-white">
                        navigate_next
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>