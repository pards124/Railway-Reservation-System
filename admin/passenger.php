<?php require('./header.php');?>
<?php require('./top-nav.php');?>
<?php require('./side-nav.php');?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Passengers</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Passenger details
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all"/></th>
                                <th>Sl no</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Ticket no</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php $passenger->get_all_passenger();?>
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
