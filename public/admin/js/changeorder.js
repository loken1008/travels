
        // categoryteam table
        $(function () {
          $( "#tablecontents" ).sortable({
            items: "tr",
            cursor: 'move',
            opacity: 0.6,
            update: function(e) {
                updatePostOrder();
            }
          });
  
          function updatePostOrder() {
            var order = [];
            var token = $('meta[name="csrf-token"]').attr('content');
            $('tr.row1').each(function(index, element) {
              order.push({
                id: $(this).attr('data-id'),
                order: index
              });
            });
  
            $.ajax({
              type: "POST",
              dataType: "json",
              url: '/mgiadmin/category/reorder-category',
              data: {
                order: order,
                _token: token
              },
              success: function(response) {
                  if (response.status == "success") {
                    console.log(response);
                  } else {
                    console.log(response);
                  }
              }
            });
          }
        });
  
          // subcategory table
          $(function () {
            $( "#subtablecontents" ).sortable({
              items: "tr",
              cursor: 'move',
              opacity: 0.6,
              update: function(e) {
                  updatePostOrder();
              }
            });
    
            function updatePostOrder() {
              var order = [];
              var token = $('meta[name="csrf-token"]').attr('content');
              $('tr.row1').each(function(index, element) {
                order.push({
                  id: $(this).attr('data-id'),
                  order: index
                });
              });
    
              $.ajax({
                type: "POST",
                dataType: "json",
                url: '/mgiadmin/subcategory/reorder-subcategory',
                data: {
                  order: order,
                  _token: token
                },
                success: function(response) {
                    if (response.status == "success") {
                      console.log(response);
                    } else {
                      console.log(response);
                    }
                }
              });
            }
          });

            // team table
            $(function () {
              $( "#teamcontents" ).sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function(e) {
                    updatePostOrder();
                }
              });
      
              function updatePostOrder() {
                var order = [];
                var token = $('meta[name="csrf-token"]').attr('content');
                $('tr.row1').each(function(index, element) {
                  order.push({
                    id: $(this).attr('data-id'),
                    order: index
                  });
                });
      
                $.ajax({
                  type: "POST",
                  dataType: "json",
                  url: '/mgiadmin/aboutus/reorder-team',
                  data: {
                    order: order,
                    _token: token
                  },
                  success: function(response) {
                      if (response.status == "success") {
                        console.log(response);
                      } else {
                        console.log(response);
                      }
                  }
                });
              }
            });