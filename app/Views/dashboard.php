<?= $this->extend('layouts/app_layout'); ?>

<?= $this->section('content'); ?>
<div>
    <div class="mx-auto">
        <div class="bg-white flex flex-col h-screen max-h-screen ">
            <div class="grid grid-cols-4 sm:grid-cols-12 gap-0 flex-none">

                <!-- Sidebar Navigation  -->
                <?= $this->include('pages/sidebar_navigation'); ?>

                <!-- Main Menu  -->
                <?= $this->include('pages/main_section'); ?>

                <!-- Secondary Menu  -->
                <?= $this->include('pages/secondary_section'); ?>

                <!-- Chatbot Section -->
                <?= $this->include('pages/chatbot_section'); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
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
            let list_clinic = $("#clinic_list")

            data.forEach(item => {
                let dist = item.distance > 1000 ? (item.distance / 1000).toFixed(1) + " km" : item.distance + " m"
                list_clinic.append(`
                    <li class="w-full mt-3 p-5 rounded-lg cursor-pointer bg-blue-100 text-blue-500 clinic-item" onclick="show_location_detail(this,'${item.id}')">
                        <h2>${item.title}</h2>
                        <p>${dist}</p>
                        <p>${item.address.street}, ${item.address.city}</p>
                    </li>
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
        $(".clinic-item").removeClass('text-blue-100 bg-blue-500')
        $(".clinic-item").addClass('bg-blue-100 text-blue-500')
        $(e).removeClass('bg-blue-100 text-blue-500')
        $(e).addClass('text-blue-100 bg-blue-500')

        let data = window.clinic_data.filter((item) => {
            return item.id == id
        })
        data = data[0]
        renderMap(data.position.lat, data.position.lng)


    }
</script>
<script>
    function show_disease_detail(e, id) {
        let data = window.disease_data[id]

        $(".disease-item").removeClass('text-blue-100 bg-blue-500')
        $(".disease-item").addClass('bg-blue-100 text-blue-500')
        $(e).removeClass('bg-blue-100 text-blue-500')
        $(e).addClass('text-blue-100 bg-blue-500')

        let disease_definition = $("#disease_definition")
        let disease_symptoms = $("#disease_symptoms")
        let disease_treatments = $("#disease_treatments")

        disease_definition.empty()
        disease_symptoms.empty()
        disease_treatments.empty()

        disease_definition.text(data[0].definition)
        disease_treatments.text(data[0].treatment_name)
        data.forEach((item) => {
            disease_symptoms.append(`<li>${item.symptom_name}</li>`)
        })
    }

    function search_disease(e) {
        let keyword = $(e).val()
        let disease_list = $("#disease_list")
        $("#total_diseases").remove()

        disease_list.empty()
        $('#disease_loading').removeClass('hidden')

        function create_list_disease(data) {
            for (index in data) {
                disease_list.append(`
                        <li class="mt-3 p-5 w-full rounded-lg cursor-pointer bg-blue-100 text-blue-500 disease-item" onclick="show_disease_detail(this,${index})">
                            <h3>${data[index][0].name}</h3>
                        </li>
                    `)
            }

        }

        if (keyword != "") {
            $.ajax({
                type: "POST",
                url: "<?= base_url(); ?>/dashboard/disease",
                data: {
                    keyword: keyword
                },
                success: function(data) {
                    data = JSON.parse(data)
                    window.disease_data = data
                    create_list_disease(data)
                    disease_list.parent().prepend(`<p id="total_diseases"><span class="font-bold">${Object.keys(data).length} Results</span> of "${keyword}"</p>`)
                }
            })
        }

        $('#disease_loading').addClass('hidden')
    }

    function start_consultation() {
        $.ajax({
            type: "GET",
            url: "<?= base_url(); ?>/dashboard/start_consultation",
            success: function(data) {
                $('#chatbot_content').empty()
                $('#chatbot_content').html(data)
            }
        })
    }

    function update_scroll() {
        let element = document.getElementById("chat_section");
        element.scrollTop = element.scrollHeight;
    }

    function send(message) {

        $("#my_message").val("")
        $.ajax({
            type: "POST",
            url: "<?= base_url(); ?>/dashboard/send_message",
            data: {
                message: message
            },
            success: function(data) {
                $("#chatbot_messages").append(`
                    <li class="w-full max-w-full flex justify-start mb-5">
                        <div class="max-w-sm bg-gray-100 py-3 px-5 rounded-3xl">
                            <p>${data}</p>
                        </div>
                    </li>
                `)

                update_scroll()
            }
        })
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
                </div>
            </li>
        `)
            // .hide()
            $("#chatbot_messages").append(new_element)
            // new_element.slideDown()
            update_scroll()
            send(message)
        }
    }

    function renderChatbotSection() {
        $.ajax({
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

            $(".menu").removeClass('bg-white text-blue-500')
            $(".menu").addClass('text-white')
            $(e).removeClass('bg-blue-500 text-white')
            $(e).addClass('bg-white text-blue-500')

            $.ajax({
                type: "POST",
                url: "<?= base_url(); ?>/dashboard/main",
                data: {
                    page: page
                },
                success: function(data) {
                    data = JSON.parse(data)
                    $('#main_content').empty()
                    $('#main_content').html(data.main)

                    $('#secondary_content').empty()
                    $('#secondary_content').html(data.secondary)
                }
            })

            if (page == 'clinic') {
                getLocation()
            }
        }
    }

    $(() => {
        switch_page($("#search"), 'search')
        renderChatbotSection()
    })
</script>
<?= $this->endSection(); ?>