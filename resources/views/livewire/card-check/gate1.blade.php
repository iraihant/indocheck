<div class="grid gap-6 mb-6">
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">GATE 1 - STRIPE</h4>
        </div>
        <div class="p-6">
            <div class="flex flex-row gap-2">
                <div>
                    <div class="bg-success/10 text-primary border border-primary/20 text-sm rounded-md py-3 px-5" role="alert">
                        <span class="font-bold">LIVE = </span> - 2
                    </div>
                </div>
                <div>
                    <div class="bg-danger/10 text-danger border border-danger/20 text-sm rounded-md py-3 px-5" role="alert">
                        <span class="font-bold">DIE = </span> - 1
                    </div>
                </div>
                <div>
                    <div class="bg-secondary/10 text-secondary border border-secondary/20 text-sm rounded-md py-3 px-5" role="alert">
                        <span class="font-bold">UNK = </span> 0
                    </div>
                </div>
            </div>
            <div class="flex flex-col my-5 gap-4">
                <div>
                    <textarea type="text" class="form-input" placeholder="Ex : 469072xxxxxxxxxx|xx|xx|xxx" rows="10" id="card-input"></textarea>
                </div>
                <div>
                    <div class="grid grid-cols-10">
                        <span class="text-white px-4 inline-flex items-center min-w-fit rounded-l border border-r-0 border-gray-200 bg-gray-500 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400">Delim</span>
                        <input type="text" class="form-input rounded-l-none" value="|">
                    </div>
                </div>
                <div>
                    <input id="gate" value="gate-1" type="hidden">
                    <button type="button" class="btn bg-primary text-white" id="start">Start</button>
                    <button type="button" class="btn bg-danger text-white" id="stop" disabled>Stop</button>

                </div>
            </div>
        </div>

    </div>

    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">Result</h4>
        </div>
        <div class="p-6">
            <div data-fc-type="tab">

                <nav class="flex space-x-3 border-b" aria-label="Tabs">
                    <button data-fc-target="#tabs-with-underline-1" type="button" class="fc-tab-active:font-semibold fc-tab-active:border-primary fc-tab-active:text-primary py-4 px-1 inline-flex items-center gap-2 border-b-2 border-transparent -mb-px transition-all text-sm whitespace-nowrap text-gray-500 hover:text-primary active">
                        <i class="ri-checkbox-blank-circle-fill text-success"></i>
                        LIVE (<liveres>0</liveres>)
                    </button> <!-- button-end -->
                    <button data-fc-target="#tabs-with-underline-2" type="button" class="fc-tab-active:font-semibold fc-tab-active:border-primary fc-tab-active:text-primary py-4 px-1 inline-flex items-center gap-2 border-b-2 border-transparent -mb-px transition-all text-sm whitespace-nowrap text-gray-500 hover:text-primary">
                        <i class="ri-checkbox-blank-circle-fill text-danger"></i>
                        DIE (<deadres>0</deadres>)
                    </button> <!-- button-end -->
                    <button data-fc-target="#tabs-with-underline-3" type="button" class="fc-tab-active:font-semibold fc-tab-active:border-primary fc-tab-active:text-primary py-4 px-1 inline-flex items-center gap-2 border-b-2 border-transparent -mb-px transition-all text-sm whitespace-nowrap text-gray-500 hover:text-primary">
                        <i class="ri-checkbox-blank-circle-fill text-secondary"></i>
                        UNKNOWN (<unknownres>0</unknownres>)
                    </button> <!-- button-end -->
                </nav> <!-- nav-end -->

                <div class="mt-3 overflow-hidden">
                    <div id="tabs-with-underline-1" class="fc-tab-active:opacity-100 opacity-0 transition-all duration-300 transform active scrollbar overflow-auto" style="height: 300px;" role="tabpanel" aria-labelledby="tabs-with-underline-item-1" data-simplebar>
                        <p class="text-gray-500 dark:text-gray-400">

                        </p>
                    </div> <!-- tabs-with-underline-1 end -->

                    <div id="tabs-with-underline-2" class="fc-tab-active:opacity-100 transition-all duration-300 transform opacity-0 hidden scrollbar overflow-auto" style="height: 300px;" role="tabpanel" aria-labelledby="tabs-with-underline-item-2" data-simplebar>
                        <p class="text-gray-500 dark:text-gray-400">
                            Tailwind Elements simplifies the process of adding a dark mode to your project.
                            By utilizing Tailwind's classes and a dark variant, you can effortlessly
                            integrate a dual-themed website. Our components come equipped with the dark
                            theme variant as a default feature. Furthermore, like any Tailwind project, the
                            default theme can be personalized by modifying the project's color palette, type
                            scale, fonts, breakpoints, border radius values, and other attributes through
                            the tailwind.config.js configuration file.
                        </p>
                    </div> <!-- tabs-with-underline-2 end -->

                    <div id="tabs-with-underline-3" class="fc-tab-active:opacity-100 transition-all duration-300 transform opacity-0 hidden scrollbar overflow-auto" style="height: 300px;"  role="tabpanel" aria-labelledby="tabs-with-underline-item-3" data-simplebar>
                        <p class="text-gray-500 dark:text-gray-400">
                            Tailwind CSS offers a seamless way to build modern websites without having to
                            leave your HTML. The framework functions by scanning all of your HTML files,
                            JavaScript components, and templates for class names, automatically generating
                            corresponding styles, and writing them to a static CSS file. This approach is
                            fast, flexible, and reliable, requiring zero runtime. Whether you need to create
                            form layouts, tables, or modal dialogs, Tailwind CSS provides everything
                            necessary to design beautiful, responsive web applications. Additionally, the
                            framework includes checkout forms, shopping carts, and product views, making it
                            the ideal choice for developing your next e-commerce front-end.
                        </p>
                    </div> <!-- tabs-with-underline-3 end -->
                </div>

            </div>
        </div>

    </div>
</div>
