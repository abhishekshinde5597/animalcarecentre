/// animal care center//
jQuery(document).ready(function ($) {
    var timeout;
    var searchInput = jQuery("#search-input"); // Corrected selector

    searchInput.on("input", function () {
        clearTimeout(timeout);
        var searchQuery = jQuery(this).val();
        if (searchQuery.length >= 2) {
            timeout = setTimeout(function () {
                jQuery.ajax({
                    url: ajax_object.ajax_url,
                    type: "POST",
                    data: {
                        action: "search_suggestions",
                        search_query: searchQuery,
                    },
                    success: function (response) {
                        jQuery("#suggestions").html(response);
                    },
                });
            }, 300);
        } else {
            jQuery("#suggestions").html("");
        }
    });

    jQuery(".img-icon-search").click(function () {
        jQuery(".search-field").toggleClass("active");
        jQuery(".search-field").parents("form").toggleClass("active_search");
        jQuery(".elementor-location-header input[type='text']").focus();
    });

    jQuery(".humburger-container").click(function () {
        if (jQuery(".humburger-container").hasClass("change")) {
            jQuery(".humburger-menu-main").removeClass("change").show();
        } else {
            jQuery(".humburger-menu-main").addClass("change").hide();
        }
    });


        // Attach a click event to the entire document
        jQuery(document).on("click", function(e) {
          var target = jQuery(e.target); // Get the clicked element
      
          // Check if the clicked element is not a descendant of .ny-bottom-header
          if (!target.closest(".ny-bottom-header").length) {
            // Hide .humburger-menu-main and remove the "change" class
            jQuery(".ny-bottom-header .humburger-menu-main").hide();
            jQuery(".ny-bottom-header #harmburger_header").removeClass("change");
          }
        });
      
        // Hover event on menu items
        jQuery("#menu-primary-header-menu > li").hover(function() {
            jQuery(this).parents(".ny-bottom-header").find(".humburger-menu-main").hide();
            jQuery(this).parents(".ny-bottom-header").find("#harmburger_header").removeClass("change");
        });
      



    var currentPage = 1;
    jQuery("#press-category-filter").on("change", function () {
        jQuery("#press-category-filter option.selected").removeClass("selected");
        jQuery(this).find("option:selected").addClass("selected");
        var categorySlug = jQuery("#press-category-filter option.selected").val();
        currentPage = 1;
        press_loadPosts(categorySlug, currentPage);
        
    });

    jQuery(document).on("click", ".page-numbers", function (e) {
        e.preventDefault();
        var categorySlug = jQuery("#press-category-filter option.selected").val();
        if (jQuery(this).hasClass("next")) {
            currentPage++;
        } else if (jQuery(this).hasClass("prev")) {
            currentPage--;
        } else {
            currentPage = parseInt(jQuery(this).text());
        }
        jQuery(".page-numbers.current").removeClass("current");
        jQuery(this).addClass("current");
        press_loadPosts(categorySlug, currentPage);
        event_loadPosts(currentPage);
        news_loadPosts(currentPage);
        comunity_loadPosts(currentPage);
    });

    function press_loadPosts(categorySlug, currentPage) {
        var data = {
            action: "press_category_filter",
            categorySlug: categorySlug,
            currentPage: currentPage,
        };

        jQuery.ajax({
            url: ajax_object.ajax_url,
            type: "POST",
            data: data,
            dataType: "html",
            success: function (response) {
                jQuery("#post-container").html(response);
                if (window.matchMedia('(max-width: 767px)').matches) {		
                    jQuery(' .press-post-type' ).addClass('owl-carousel');
                    jQuery('.press-post-type').owlCarousel({
                        loop:true,  
                        margin:10,  
                        nav:false,  
                        dots:true,  
                        autoplay:true,  
                        responsiveClass:true,
                        items:1
                    });
                } 
            },
            error: function (error) {
                console.log(error);
            },
        });
    }

    function event_loadPosts(currentPage) {
        var data = {
            action: "events_posts",
            currentPage: currentPage,
        };

        jQuery.ajax({
            url: ajax_object.ajax_url,
            type: "POST",
            data: data,
            dataType: "html",
            success: function (response) {
                jQuery("#events").html(response);
                jQuery(".page-numbers.current").removeClass("current");
            },
            error: function (error) {
                console.log(error);
            },
        });
    }

    function news_loadPosts(currentPage) {
        var data = {
            action: "news_posts",
            currentPage: currentPage,
        };

        jQuery.ajax({
            url: ajax_object.ajax_url,
            type: "POST",
            data: data,
            dataType: "html",
            success: function (response) {
                jQuery("#news").html(response);
                jQuery(".page-numbers.current").removeClass("current");
            },
            error: function (error) {
                console.log(error);
            },
        });
    }

    function comunity_loadPosts(currentPage) {
        var data = {
            action: "comunity_posts",
            currentPage: currentPage,
        };

        jQuery.ajax({
            url: ajax_object.ajax_url,
            type: "POST",
            data: data,
            dataType: "html",
            success: function (response) {
                jQuery("#comunity").html(response);
                jQuery(".page-numbers.current").removeClass("current");
            },
            error: function (error) {
                console.log(error);
            },
        });
    }
    // ajax serch suggestion

    //var timeout;
    //var searchInput = jQuery('#newInput');
    //alert(searchInput);
});