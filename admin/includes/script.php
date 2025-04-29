    <!-- [Page Specific JS] start -->
    <script src="<?= urlOf('assets/js/plugins/apexcharts.min.js') ?>"></script>
    <script src="<?= urlOf('assets/js/plugins/jsvectormap.min.js') ?>"></script>
    <script src="<?= urlOf('assets/js/plugins/world.js') ?>"></script>
    <script src="<?= urlOf('assets/js/plugins/world-merc.js') ?>"></script>
    <script src="<?= urlOf('assets/js/pages/dashboard-default.js') ?>"></script>
    <!-- [Page Specific JS] end -->
    <!-- Required Js -->
    <script src="<?= urlOf('assets/js/plugins/popper.min.js') ?>"></script>
    <script src="<?= urlOf('assets/js/plugins/simplebar.min.js') ?>"></script>
    <script src="<?= urlOf('assets/js/plugins/bootstrap.min.js') ?>"></script>
    <script src="<?= urlOf('assets/js/fonts/custom-font.js') ?>"></script>
    <script src="<?= urlOf('assets/js/pcoded.js') ?>"></script>
    <script src="<?= urlOf('assets/js/plugins/feather.min.js') ?>"></script>

    <!-- jquery checkdnsrr -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
       
    <script>
      layout_change('light');
    </script>
       
    <script>
      layout_sidebar_change('light');
    </script>
      
    <script>
      change_box_container('false');
    </script>
     
    <script>
      layout_caption_change('true');
    </script>
       
    <script>
      layout_rtl_change('false');
    </script>
     
    <script>
      preset_change('preset-1');
    </script>

    <!-- select rooms  from selected roomtype -->

    <!-- <script>
    document.getElementById('itemSelect').addEventListener('change', function() {
        var selectedValue = this.value;
        document.getElementById('selectedValue').value = selectedValue;

        // Send the selected value to the server using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('item_id=' + encodeURIComponent(selectedValue));

        // Optional: handle response from the server
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                console.log('Server response:', xhr.responseText);
            }
        };
    });
</script> -->