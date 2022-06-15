$(document).ready(function() {
    $('select[name="category_id"]').on('change', function() {
        var category_id = $(this).val();
        if (category_id) {
            $.ajax({
                url: "/subcategory/ajax/" + category_id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var d = $('select[name="subcategory_id"]').empty();
                    $('select[name="subcategory_id"]').append(
                        '<option value="">Select Sub Category</option>');
                    $.each(data, function(key, value) {
                        $('select[name="subcategory_id"]').append(

                            '<option value="' + value.id + '">' + value
                            .sub_category_name + '</option>');
                    });
                }
            });
        } else {
            alert('danger');
        }
    });
});

// country
$(document).ready(function() {
    $('select[name="country_id"]').on('change', function() {
        var country_id = $(this).val();
        if (country_id) {
            $.ajax({
                url: "/place/ajax/" + country_id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var d = $('select[name="place_id"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="place_id"]').append(

                            '<option value="' + value.id + '">' + value
                            .place_name + '</option>');
                    });
                }
            });
        } else {
            alert('danger');
        }
    });
});