<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <?php echo "<title>" . $varTemp[0] . "</title>\n"; ?>
    <script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyDEfKcuQhHdhId3AZQ5EcczNoB3GR-5dm8"
      type="text/javascript"></script>
    <script type="text/javascript" src="timemap/lib/jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="timemap/lib/mxn/mxn.js?(google)"></script>
    <script type="text/javascript" src="timemap/lib/timeline-1.2.js"></script>
    <script src="timemap/src/timemap.js" type="text/javascript"></script>
    <script src="timemap/src/param.js" type="text/javascript"></script>
    <script src="timemap/src/loaders/json.js" type="text/javascript"></script>
    <script src="timemap/src/loaders/google_spreadsheet.js" type="text/javascript"></script>

<script type="text/javascript">
var tm;
$(function() {
    
    tm = TimeMap.init({
        mapId: "map",               // Id of map div element (required)
        timelineId: "timeline",     // Id of timeline div element (required) 
        options: {
            eventIconPath: "timemap/images/"
        },
        datasets: [
            {
                title: "Events",
                id: "events",
                <?php echo "theme: \"" . $varTemp[1] . "\",\n"; ?>
                type: "gss",
                options: {
                    // note that your spreadsheet must be published for this to work
                    <?php echo "key: \"" . $varTemp[2] . "\",\n"; ?>
                    // map spreadsheet column names to expected ids
                    paramMap: {
                        start: "start"
                    }
                }
            }
        ],
        bandIntervals: [
            <?php echo "Timeline.DateTime." . $varTemp[3] . ",\n"; ?>
            <?php echo "Timeline.DateTime." . $varTemp[4] . "\n"; ?> 
        ]
    });
});
</script>