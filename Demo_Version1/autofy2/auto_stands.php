<?php
include_once './core/db.php';
include_once './public_header.php';
?>


<?php
$standlist = $_POST['data'];

if ((isset($_POST['data']) == FALSE)) {


    echo 'no results found';
    die;
} else {
    if ($_POST['data'] != "-1") {


        $sql = "SELECT * FROM `autostand` where `place_id`='" . $standlist . "' AND `status` =1";
        $qry = mysqli_query($dbcon, $sql);
        ?>


        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta charset="UTF-8">   
            <style>
                .clickable
                {
                    cursor: pointer;
                }

                .clickable .glyphicon
                {
                    background: rgba(0, 0, 0, 0.15);
                    display: inline-block;
                    padding: 6px 12px;
                    border-radius: 4px
                }

                .panel-heading span
                {
                    margin-top: -23px;
                    font-size: 15px;
                    margin-right: -9px;
                }
                a.clickable { color: inherit; }
                a.clickable:hover { text-decoration:none; }
            </style>
        </head>

        <h4>
            Nearby Autostands are
        </h4>

        
        <?php
        while ($result = mysqli_fetch_array($qry)) {
            $a = $result['autostand_id'];
            $b = $result['autostand_name'];
            ?>

            <div class="panel panel-info"> 
                <div class="panel-heading clickable">
                    <h3 class="panel-title">
                        <?php echo $b; ?></h3>

                    <span class="pull-right "><i class="glyphicon glyphicon-minus"></i></span>
                </div>
                <div class="panel-body">

                    <?php
                    $autos = mysqli_query($dbcon, "SELECT * FROM `auto` WHERE `autostand_id`='" . $a . "' AND `status` =1");
                    while ($result2 = mysqli_fetch_array($autos)) {
                        $c = $result2['driver_mob'];
                        $d = $result2['driver_name'];
                       
                        echo '<div class="row" >';
                        echo '<div class="col-md-3"><a href="tel:'.$c.'">'. $c .'</a></div>';
                        echo '<div class="col-md-3">'. $d .'</div>';
                        echo '<div class="col-md-3"><input type="button" value="Send Location" class="sendlocid" data-phone="'.$c.'"></div>';
                        echo '</div>';
                      
                    }
                    
                    ?>
                </div>
            </div><?php
        }
    }
}
?>




<script>
    $(document).on('click', '.panel-heading span.clickable', function (e) {
        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }
    });
    $(document).on('click', '.panel div.clickable', function (e) {
        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }
    });
    $(document).ready(function () {
        $('.panel-heading span.clickable').click();
        $('.panel div.clickable').click();
    });

</script>



