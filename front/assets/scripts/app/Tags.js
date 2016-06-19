var Tags = {
    get: function(params) {
        var filter = General.packForm("frmFilter");

        if (params.page) {
            $("#hddnPage").val(params.page);
            $(".pagination li").removeClass("active");
            $("[data-page='" + params.page + "']").addClass("active");
            filter += "&page=" + params.page;
        } else {
            filter += "&page=" + $("#hddnPage").val();
        }

        $.getJSON(mainUrl + "admin/" + "includes/receiver.php?req=get" + filter, function(response) {
            var tblSrc = "",
                ulSrc = "",
                i;

            for (i = 0; i < response.creative.length; i++) {
                tblSrc += "<tr>";

                tblSrc += "<td><div class='fix-height'>" + (response.creative[i].field_id || "") + "</div></td>"
                tblSrc += "<td><div class='fix-height'>" + (response.creative[i].field_products_name || "") + "</div></td>"
                tblSrc += "<td><div class='fix-height'><a href='" + response.creative[i].field_products_link_author + "' target='_blank'>" + (response.creative[i].field_products_author || "") + "</div></td>"
                tblSrc += "<td><div class='fix-height'><a href='" + response.creative[i].field_products_link_cat + "' target='_blank'>" + (response.creative[i].field_products_cat || "") + "</div></td>"
                tblSrc += "<td><div class='fix-height'><a href='" + response.creative[i].field_products_link_sub_cat + "' target='_blank'>" + (response.creative[i].field_products_sub_cat || "") + "</div></td>"
                tblSrc += "<td><div class='fix-height'><textarea rows='5' cols='20'>" + (response.creative[i].field_products_desc || "") + "</textarea></div></td>"
                tblSrc += "<td><div class='fix-height'><textarea rows='5' cols='20'>" + (response.creative[i].field_images || "") + "</textarea></div></td>"
                tblSrc += "<td><div class='fix-height'>" + (response.creative[i].field_created || "") + "</div></td>"
                tblSrc += "<td> \
                        <a href=\"edit/" + response.creative[i].field_id + "\"><span class=\"glyphicon glyphicon-pencil\"></span></a> \
                        <a href=\"javascript:Creatives.remove(" + response.creative[i].field_id + ");\" style=\"margin-left:10px;\"><span class=\"glyphicon glyphicon-remove\"></span></a> \
                        </td>";
                tblSrc += "</tr>";
            }

            $("#tblCreative tbody").html(tblSrc);

            for (i = Math.max(1, $("#hddnPage").val() - 2); i <= Math.max(5, Math.min(response.pages, parseInt($("#hddnPage").val()) + 2)); i++) {
                ulSrc += "<li class=\"" + (i == $("#hddnPage").val() ? "active" : "") + "\"><a href=\"javascript:Creatives.get({page:" + i + "})\">" + i + "</a></li>";
            }

            $(".pagination").html(ulSrc);
        });

    },
    show_item_by_tags: function(field_product_tags, params) {
        console.log(field_product_tags);
        var filter = General.packForm("frmFilter");

        if (params.page) {
            $("#hddnPage").val(params.page);
            $(".pagination li").removeClass("active");
            $("[data-page='" + params.page + "']").addClass("active");
            filter += "&page=" + params.page;
        } else {
            filter += "&page=" + $("#hddnPage").val();
        }

        $.getJSON(mainUrl + "front/" + "includes/receiver.php?req=get_products_by_tags&field_product_tags=" + field_product_tags + filter, function(response) {
            var ulSrc = "",
                pgSrc = "",
                i;
            console.log(response);
            for (i = 0; i < response.tages.length; i++) {
                var x = Math.floor((Math.random() * 4) + 1);

                switch (x) {
                    case 1:
                        x = "font";
                        break;
                    case 2:
                        x = "template";
                        break;
                    case 3:
                        x = "product1";
                        break;
                    case 4:
                        x = "product2";
                        break;
                    default:
                        x = "all";
                        break;

                }
                var product_name = response.tages[i].field_item_slug;
                ulSrc += "<li class='item thumb isotope-item" + " " + x + " '>";

                ulSrc += "<a href='/product/" + product_name + " '>";
                ulSrc += "<figure class='fix-height'>";
                ulSrc += "<figcaption class='text-overlay'>";
                ulSrc += "<div class='info'>";
                ulSrc += "<h4>" + response.tages[i].field_item_name + "</h4>";
                ulSrc += "<p>" + " * " + response.tages[i].field_item_category + " * " + "</p>";
                ulSrc += "<p class='icon-heart'>" + response.tages[i].field_item_likes + "</p>";
                ulSrc += "</div>";
                ulSrc += "</figcaption>";
                ulSrc += "<img src =" + response.tages[i].field_item_image + " alt=''/>";
                ulSrc += "</figure>";
                ulSrc += "</a>";
                
                ulSrc += "</li>";
            }

            $("#ulSrc ul#item_by_tags").html(ulSrc);

            for (i = Math.max(1, $("#hddnPage").val() - 2); i <= Math.max(5, Math.min(response.pages, parseInt($("#hddnPage").val()) + 2)); i++) {
                pgSrc += "<li class=\"" + "animated " + (i == $("#hddnPage").val() ? "active" : "") + "\"><a href=\"javascript:Tags.show_item_by_tags({page:" + i + "})\">" + i + "</a></li>";
            }

            $(".pagination").html(pgSrc);
        });

    },

    getOne: function(field_products_slug) { 
        $.getJSON(mainUrl + "front/" + "includes/receiver.php?req=get_one&field_products_slug=" + field_products_slug, function(response) {
            console.log(response);
            var text = response.field_product_tags;
            var proba = text.split(' ');

            for (var i = 0; i < proba.length; i++) {
                if (proba[i] != "") {
                    proba[i] = '<a style="display: inline-block; "href="' + mainUrl + 'tag/' + proba[i].substr(0, proba[i].length - 1) + '">' + proba[i] + "&nbsp" + '</a>';
                    console.log(proba);
                }
            };

            $("#field_id").val(response.field_id);
            $(".field_products_name").text(response.field_products_name);
            $(".field_products_author").attr('href', response.field_products_link_author).text(response.field_products_author);
            $(".field_products_link_author").val(response.field_products_link_author);
            $(".field_products_cat").attr('href', response.field_products_link_cat).text(response.field_products_cat);
            $(".field_products_link_cat").val(response.field_products_link_cat);
            $(".field_products_sub_cat").attr('href', response.field_products_link_sub_cat).text(response.field_products_sub_cat);
            $(".field_products_link_sub_cat").val(response.field_products_link_sub_cat);
            $("#field_products_desc").html(response.field_products_desc);
            $(".field_images").attr('src', response.field_images);
            $(".field_products_date").text(response.field_products_date);
            $(".field_product_tags").html(proba);
            $(".field_products_price").text(response.field_products_price);
            $(".field_products_likes").text(response.field_products_likes);

            var arr = [response.field_products_sub_cat, response.field_products_vector, response.field_products_web_font,
                response.field_products_requirements, response.field_products_dimensions, response.field_products_dpi, response.field_products_layered
            ];
            
            if (arr[0] == '') {
                $("div1 li .field_products_sub_cat").parent().addClass('hide');
            };
            if (arr[1] == 'no') {
                $("li .field_products_vector").parent().addClass('hide');
            };

            if (arr[2] == 'no') {
                $("li .field_products_web_font").parent().addClass('hide');
            };

            if (arr[3] == null) {
                $("li .field_products_requirements").parent().addClass('hide');
            };

            if (arr[4] == null) {
                $("li .field_products_dimensions").parent().addClass('hide');
            };

            if (arr[5] == null) {
                $("li .field_products_dpi").parent().addClass('hide');
            };
            if (arr[6] == null) {
                $("li .field_products_layered").parent().addClass('hide');
            };

            $(".field_products_license").html(response.field_products_license);
            $(".field_products_type").text(response.field_products_type);
            $(".field_products_size").text(response.field_products_size);
            $(".field_products_vector").text(response.field_products_vector);
            $(".field_products_web_font").text(response.field_products_web_font);

            $(".field_products_requirements").text(response.field_products_requirements);
            $(".field_products_layered").text(response.field_products_layered);
            $(".field_products_dpi").text(response.field_products_dpi);
            $(".field_products_dimensions").text(response.field_products_dimensions);

        });
    },
    show_authors_products: function(field_author_name) { //console.log(field_author_name);
        $.getJSON(mainUrl + "front/" + "includes/receiver.php?req=get_author_products&field_author_name=" + field_author_name, function(response) {
            //console.log(response[0].field_item_name);

            var ulSrc = "",
                i;
            if (response.length > 0) {
                for (i = 0; i < response.length; i++) {
                    ulSrc += "<li class='col-md-3' style='opacity:1;padding:20px;'>";
                    ulSrc += "<a style='display:inline-block' href=" + response[i].field_item_slug + " title=" + response[i].field_item_name + ">";
                    ulSrc += "<img src =" + response[i].field_item_image + " width='100' height='100' alt=''/>";
                    ulSrc += "</a>";
                    ulSrc += "</li>";
                }
            } else {
                for (i = 0; i = response.length; i++) {
                    ulSrc += "<li class='col-md-3' style='opacity:1;padding:20px;'>";
                    ulSrc += "<a style='display:inline-block' href=" + response[i].field_item_slug + " title=" + response[i].field_item_name + ">";
                    ulSrc += "<img src =" + response[i].field_item_image + " width='100' height='100' alt=''/>";
                    ulSrc += "</a>";
                    ulSrc += "</li>";
                }
            }
            $("#author_items").html(ulSrc);

        });
    }
    
}