<?php require('./header.php');?>
<?php require('./top-nav.php');?>
<?php require('./side-nav.php');?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tickets</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ticket Details
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all"/></th>
                                <th>Sl no</th>
                                <th>Source</th>
                                <th>Destination</th>
                                <th>Deparature time</th>
                                <th>Arrival time</th>
                                <th>No of passenger</th>
                                <th>Username</th>
                                <th>PNR</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php $ticket->get_all_ticket();?>
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>




<?php require('./footer.php');?>
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>
