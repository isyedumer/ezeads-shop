<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        var currentPath = window.location.pathname;
        if (localStorage.getItem("mode") == "light") {
            $('.themeModeButton').removeClass('btn-light');
            $('.themeModeButton').addClass('btn-dark');
            $('.themeModeButton').html('<i class="fa fa-sun"></i> Dark Mode');
            $('body').addClass('light');
            $('body').removeClass('dark');
        } else {
            $('.themeModeButton').removeClass('btn-dark');
            $('.themeModeButton').addClass('btn-light');
            $('.themeModeButton').html('<i class="fa fa-moon"></i> Light Mode');
            $('body').addClass('dark');
            $('body').removeClass('light');
        }
        $("#themeMode").click(function() {
            let currentMode = localStorage.getItem("mode");
            if (currentMode == 'light') {
                localStorage.setItem("mode", "dark");
            } else {
                localStorage.setItem("mode", "light");
            }
            window.location.reload();
        });

        $.ajax({
            type: 'GET',
            url: '/get-post-ezead',
            success: function(response) {
                if (response.ezead_post_html && response.ezead_post_html != '' && response
                    .ezead_post_html != null) {
                    $('.custom-box-ezead-post').append(response.ezead_post_html);
                } else {
                    $('.ezeadPosts').addClass('d-none');
                }
            }
        });

        $.ajax({
            type: 'get',
            url: '/get-search-location',
            success: function(response) {
                if (response.countries && response.countries != null && response
                    .countries != "") {
                    $('.country').append(
                        '<option selected disabled>Select Country</option>',
                        response.countries);
                }
            },
        });

        $('.country').change(function(e) {
            $.ajax({
                type: 'get',
                url: '/get-search-location',
                data: {
                    countryCode: $(this).val(),
                },
                success: function(response) {
                    if (response.provinces && response.provinces != null && response
                        .provinces != "") {
                        $(".province option").remove();
                        $(".col_province").removeClass("d-none");
                        $(".col_region").addClass("d-none");
                        $(".col_city").addClass("d-none");
                        $(".col_neighbour").addClass("d-none");
                        $('.province').append(
                            '<option selected disabled>Select Provinces / State</option>',
                            response.provinces);
                    } else {
                        $(".col_provinces").addClass("d-none");
                    }
                },
            });
        });

        $('.province').change(function(e) {
            $.ajax({
                type: 'get',
                url: '/get-search-location',
                data: {
                    provinceID: $(this).val(),
                },
                success: function(response) {
                    if (response.regions && response.regions != null && response.regions !=
                        "") {
                        $(".region option").remove();
                        $(".col_region").removeClass("d-none");
                        $(".col_city").addClass("d-none");
                        $(".col_neighbour").addClass("d-none");
                        $('.region').append(
                            '<option selected disabled>Select Region</option>', response
                            .regions);
                    } else {
                        $(".col_region").addClass("d-none");
                    }
                },
            });
        });

        $('.region').change(function(e) {
            $.ajax({
                type: 'get',
                url: '/get-search-location',
                data: {
                    regionID: $(this).val(),
                },
                success: function(response) {
                    if (response.cities && response.cities != null && response.cities !=
                        "") {
                        $(".city option").remove();
                        $(".col_city").removeClass("d-none");
                        $(".col_neighbour").addClass("d-none");
                        $('.city').append(
                            '<option selected disabled>Select City</option>', response
                            .cities);
                    } else {
                        $(".col_city").addClass("d-none");
                    }
                },
            });
        });

        $('.city').change(function(e) {
            $.ajax({
                type: 'get',
                url: '/get-search-location',
                data: {
                    cityID: $(this).val(),
                },
                success: function(response) {
                    if (response.neighbours && response.neighbours != null && response
                        .neighbours != "") {
                        $(".neighbour option").remove();
                        $(".col_neighbour").removeClass("d-none");
                        $('.neighbour').append(
                            '<option selected disabled>Select Neighbour</option>',
                            response.neighbours);
                    } else {
                        $(".col_neighbour").addClass("d-none");
                    }
                },
            });
        });

        $('#searchLocation').click(function() {
            location.reload();
        });

    });
</script>
