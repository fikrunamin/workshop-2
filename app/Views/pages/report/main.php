<!-- {{--End of Search or Home Page --}} -->
<div id="main_report" class="col-span-full">
    <div class="grid grid-cols-10 gap-5">
        <div class="col-span-3 shadow rounded-lg bg-white text-sm overflow-hidden">
            <div class="flex justify-between items-center p-5">
                <h3 class="font-semibold">Disease</h3>
            </div>
            <hr>
            <div id="list" class="font-semibold text-sm text-blue-500">

                <div class="h-14 w-full hover:bg-blue-100 flex items-center justify-between px-5 cursor-pointer">
                    <input id="search_item" oninput="search_item(this)" type="text" name="search_item" class="text-sm text-base placeholder-gray-500 pl-4 pr-10 rounded-lg ring-2 ring-blue-100 focus:ring-blue-500 duration-200 w-full py-2" placeholder="Sunday, 20 December 2020" />
                </div>
                <hr>
                <?php foreach ($report_data as $data) : ?>
                    <div class="h-14 w-full hover:bg-blue-100 flex items-center justify-between px-5 cursor-pointer list-item" onclick="show_report(this, <?= $data['id']; ?>)">
                        <h3>
                            <?= \Carbon\Carbon::parse($data['created_at'])->format('l, d F Y'); ?>
                        </h3>
                        <div class="w-5 h-5 rounded-full bg-blue-500 flex justify-center items-center">
                            <span class="material-icons text-white">
                                navigate_next
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="w-full p-10 no-item space-y-5 hidden">
                    <div class=" flex items-center justify-center">
                        <svg id="b21613c9-2bf0-4d37-bef0-3b193d34fc5d" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 647.63626 632.17383" class="w-32">
                            <path d="M687.3279,276.08691H512.81813a15.01828,15.01828,0,0,0-15,15v387.85l-2,.61005-42.81006,13.11a8.00676,8.00676,0,0,1-9.98974-5.31L315.678,271.39691a8.00313,8.00313,0,0,1,5.31006-9.99l65.97022-20.2,191.25-58.54,65.96972-20.2a7.98927,7.98927,0,0,1,9.99024,5.3l32.5498,106.32Z" transform="translate(-276.18187 -133.91309)" fill="#f2f2f2" />
                            <path d="M725.408,274.08691l-39.23-128.14a16.99368,16.99368,0,0,0-21.23-11.28l-92.75,28.39L380.95827,221.60693l-92.75,28.4a17.0152,17.0152,0,0,0-11.28028,21.23l134.08008,437.93a17.02661,17.02661,0,0,0,16.26026,12.03,16.78926,16.78926,0,0,0,4.96972-.75l63.58008-19.46,2-.62v-2.09l-2,.61-64.16992,19.65a15.01489,15.01489,0,0,1-18.73-9.95l-134.06983-437.94a14.97935,14.97935,0,0,1,9.94971-18.73l92.75-28.4,191.24024-58.54,92.75-28.4a15.15551,15.15551,0,0,1,4.40966-.66,15.01461,15.01461,0,0,1,14.32032,10.61l39.0498,127.56.62012,2h2.08008Z" transform="translate(-276.18187 -133.91309)" fill="#3f3d56" />
                            <path d="M398.86279,261.73389a9.0157,9.0157,0,0,1-8.61133-6.3667l-12.88037-42.07178a8.99884,8.99884,0,0,1,5.9712-11.24023l175.939-53.86377a9.00867,9.00867,0,0,1,11.24072,5.9707l12.88037,42.07227a9.01029,9.01029,0,0,1-5.9707,11.24072L401.49219,261.33887A8.976,8.976,0,0,1,398.86279,261.73389Z" transform="translate(-276.18187 -133.91309)" fill="#3b82f6" />
                            <circle cx="190.15351" cy="24.95465" r="20" fill="#3b82f6" />
                            <circle cx="190.15351" cy="24.95465" r="12.66462" fill="#fff" />
                            <path d="M878.81836,716.08691h-338a8.50981,8.50981,0,0,1-8.5-8.5v-405a8.50951,8.50951,0,0,1,8.5-8.5h338a8.50982,8.50982,0,0,1,8.5,8.5v405A8.51013,8.51013,0,0,1,878.81836,716.08691Z" transform="translate(-276.18187 -133.91309)" fill="#e6e6e6" />
                            <path d="M723.31813,274.08691h-210.5a17.02411,17.02411,0,0,0-17,17v407.8l2-.61v-407.19a15.01828,15.01828,0,0,1,15-15H723.93825Zm183.5,0h-394a17.02411,17.02411,0,0,0-17,17v458a17.0241,17.0241,0,0,0,17,17h394a17.0241,17.0241,0,0,0,17-17v-458A17.02411,17.02411,0,0,0,906.81813,274.08691Zm15,475a15.01828,15.01828,0,0,1-15,15h-394a15.01828,15.01828,0,0,1-15-15v-458a15.01828,15.01828,0,0,1,15-15h394a15.01828,15.01828,0,0,1,15,15Z" transform="translate(-276.18187 -133.91309)" fill="#3f3d56" />
                            <path d="M801.81836,318.08691h-184a9.01015,9.01015,0,0,1-9-9v-44a9.01016,9.01016,0,0,1,9-9h184a9.01016,9.01016,0,0,1,9,9v44A9.01015,9.01015,0,0,1,801.81836,318.08691Z" transform="translate(-276.18187 -133.91309)" fill="#3b82f6" />
                            <circle cx="433.63626" cy="105.17383" r="20" fill="#3b82f6" />
                            <circle cx="433.63626" cy="105.17383" r="12.18187" fill="#fff" />
                        </svg>
                    </div>
                    <div class="text-center">
                        <h3 class="text-xs text-blue-500 text-opacity-70">No data found with keyword "<span class="search_keyword"></span>"</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-7 shadow rounded-lg bg-white text-sm overflow-hidden">
            <div class="flex justify-between items-center p-5">
                <h3 class="font-semibold">Detail</h3>
            </div>
            <hr>
            <div class="grid grid-cols-4 p-5 gap-5 text-sm hidden" id="report-detail">
                <div class="col">
                    <h3 class="font-semibold text-yellow-500">Detected Symptoms</h3>
                </div>
                <div class="col-span-3">
                    <div class="col-span-3 space-y-1 detected-symptoms">
                    </div>
                </div>
                <div class="col">
                    <h3 class="font-semibold text-red-500">Detected Diseases</h3>
                </div>
                <div class="col-span-3 detected-diseases">
                </div>
            </div>
            <div class="col-span-full p-20 space-y-5 no-selected">
                <div class=" flex items-center justify-center">
                    <svg id="b21613c9-2bf0-4d37-bef0-3b193d34fc5d" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 647.63626 632.17383" class="w-44">
                        <path d="M687.3279,276.08691H512.81813a15.01828,15.01828,0,0,0-15,15v387.85l-2,.61005-42.81006,13.11a8.00676,8.00676,0,0,1-9.98974-5.31L315.678,271.39691a8.00313,8.00313,0,0,1,5.31006-9.99l65.97022-20.2,191.25-58.54,65.96972-20.2a7.98927,7.98927,0,0,1,9.99024,5.3l32.5498,106.32Z" transform="translate(-276.18187 -133.91309)" fill="#f2f2f2" />
                        <path d="M725.408,274.08691l-39.23-128.14a16.99368,16.99368,0,0,0-21.23-11.28l-92.75,28.39L380.95827,221.60693l-92.75,28.4a17.0152,17.0152,0,0,0-11.28028,21.23l134.08008,437.93a17.02661,17.02661,0,0,0,16.26026,12.03,16.78926,16.78926,0,0,0,4.96972-.75l63.58008-19.46,2-.62v-2.09l-2,.61-64.16992,19.65a15.01489,15.01489,0,0,1-18.73-9.95l-134.06983-437.94a14.97935,14.97935,0,0,1,9.94971-18.73l92.75-28.4,191.24024-58.54,92.75-28.4a15.15551,15.15551,0,0,1,4.40966-.66,15.01461,15.01461,0,0,1,14.32032,10.61l39.0498,127.56.62012,2h2.08008Z" transform="translate(-276.18187 -133.91309)" fill="#3f3d56" />
                        <path d="M398.86279,261.73389a9.0157,9.0157,0,0,1-8.61133-6.3667l-12.88037-42.07178a8.99884,8.99884,0,0,1,5.9712-11.24023l175.939-53.86377a9.00867,9.00867,0,0,1,11.24072,5.9707l12.88037,42.07227a9.01029,9.01029,0,0,1-5.9707,11.24072L401.49219,261.33887A8.976,8.976,0,0,1,398.86279,261.73389Z" transform="translate(-276.18187 -133.91309)" fill="#3b82f6" />
                        <circle cx="190.15351" cy="24.95465" r="20" fill="#3b82f6" />
                        <circle cx="190.15351" cy="24.95465" r="12.66462" fill="#fff" />
                        <path d="M878.81836,716.08691h-338a8.50981,8.50981,0,0,1-8.5-8.5v-405a8.50951,8.50951,0,0,1,8.5-8.5h338a8.50982,8.50982,0,0,1,8.5,8.5v405A8.51013,8.51013,0,0,1,878.81836,716.08691Z" transform="translate(-276.18187 -133.91309)" fill="#e6e6e6" />
                        <path d="M723.31813,274.08691h-210.5a17.02411,17.02411,0,0,0-17,17v407.8l2-.61v-407.19a15.01828,15.01828,0,0,1,15-15H723.93825Zm183.5,0h-394a17.02411,17.02411,0,0,0-17,17v458a17.0241,17.0241,0,0,0,17,17h394a17.0241,17.0241,0,0,0,17-17v-458A17.02411,17.02411,0,0,0,906.81813,274.08691Zm15,475a15.01828,15.01828,0,0,1-15,15h-394a15.01828,15.01828,0,0,1-15-15v-458a15.01828,15.01828,0,0,1,15-15h394a15.01828,15.01828,0,0,1,15,15Z" transform="translate(-276.18187 -133.91309)" fill="#3f3d56" />
                        <path d="M801.81836,318.08691h-184a9.01015,9.01015,0,0,1-9-9v-44a9.01016,9.01016,0,0,1,9-9h184a9.01016,9.01016,0,0,1,9,9v44A9.01015,9.01015,0,0,1,801.81836,318.08691Z" transform="translate(-276.18187 -133.91309)" fill="#3b82f6" />
                        <circle cx="433.63626" cy="105.17383" r="20" fill="#3b82f6" />
                        <circle cx="433.63626" cy="105.17383" r="12.18187" fill="#fff" />
                    </svg>
                </div>
                <div class="text-center">
                    <h3 class="text-sm text-blue-500 text-opacity-70 font-semibold">Please select one of reports on your left.</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- {{--End of Search or Home Page --}} -->