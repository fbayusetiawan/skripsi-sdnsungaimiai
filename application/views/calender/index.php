<!-- Display event calendar -->
<div id="calendar_div">
    <?php echo $eventCalendar; ?>
</div>

<!-- jQuery library -->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

<script>
    function getCalendar(target_div, year, month) {
        $.get('<?php echo base_url('calendar/eventCalendar/'); ?>' + year + '/' + month, function(html) {
            $('#' + target_div).html(html);
        });
    }

    function getEvents(date) {
        $.get('<?php echo base_url('calendar/getEvents/'); ?>' + date, function(html) {
            $('#event_list').html(html);
        });
    }
</script>

<script>
    $(document).on("change", ".month-dropdown", function() {
        getCalendar('calendar_div', $('.year-dropdown').val(), $('.month-dropdown').val());
    });
    $(document).on("change", ".year-dropdown", function() {
        getCalendar('calendar_div', $('.year-dropdown').val(), $('.month-dropdown').val());
    });
</script>