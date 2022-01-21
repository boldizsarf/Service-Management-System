<div class="tab-pane fade" id="calendar" role="tabpanel" aria-labelledby="status-casetabs">
    <div class="row centered">
        <script type="text/javascript">
            $(document).ready( function () {
                $("#EventCalendar").fullCalendar({
                    height: 'auto',
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay,listWeek'
                    },
                    editable: false,
                    firstDay: 1,
                    events: [
                        <?php
                            foreach ($case["Dates"] as $day) {
                                echo '{';
                                echo "title: 'K: " . $day["PlannedAction"]["TextHU"] . "',";
                                echo "start: '" . $day["Date"] . "',";
                                echo "end: '" . $day["Date"] . "',";
                                echo "backgroundColor: '" . $day["PlannedAction"]["BgColor"] . "',";
                                echo "borderColor: '" . $day["PlannedAction"]["BorderColor"] . "',";
                                echo "textColor: '" . $day["PlannedAction"]["TextColor"] . "'";
                                echo '},';
                            }

                            foreach ($case["Dates"] as $day) {
                                echo '{';
                                echo "title: 'V: " . $day["RealAction"]["TextHU"] . "',";
                                echo "start: '" . $day["Date"] . "',";
                                echo "end: '" . $day["Date"] . "',";
                                echo "backgroundColor: '" . $day["RealAction"]["BgColor"] . "',";
                                echo "borderColor: '" . $day["RealAction"]["BorderColor"] . "',";
                                echo "textColor: '" . $day["RealAction"]["TextColor"] . "',";
                                echo '},';
                            }
                        ?>
                    ]

                });
            } );
        </script>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Naptár</h4>
                </div>
                <div class="card-body">
                    <div class="fc-overflow">
                        <div id="EventCalendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>